<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Notifications\VerifyEmailCustom;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomPasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $appends = ['link'] ;

    public function getLinkAttribute() {

        return route('users.details', ['user' => $this->slug]);
    }

    public function readMessages()
    {
        return $this->belongsToMany(Message::class)->withPivot('read_at');
    }

    // Marquer un message comme lu

    public function markAsRead(Message $message)
    {
        $this->readMessages()->syncWithoutDetaching([
            $message->id => ['read_at' => now()]
        ]);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'datetime'
    ];

  public function moyenne()
{
    $totalRates = $this->rates()->count();

    if ($totalRates === 0) {
        return null;
    }

    return $this->rates()->sum('rate') / $totalRates;
}

    public function verificationLevel(): int
    {
        $levels = 0;

        if ($this->email_verified_at) $levels++;
        if ($this->phone_verified_at) $levels++;
        if ($this->identity_verified_at) $levels++;
        if ($this->address_verified_at) $levels++;

        return $levels;
    }

    public function profileBadge(): string
    {
        $level = $this->verificationLevel();

        return match ($level) {
            4 => ' ✨',   // Tous vérifiés
            3 => ' ✔️',
            2 => ' ✅',
            1 => ' ⚠️',
            default => ' ❓',
        };
    }

    public function profileLevel() {

        $level = $this->verificationLevel() ;

        return match( $level) {
            4 => 'Niveau de Vérification Certifié ✨',
            3 => 'Niveau de Vérification Avancé ✔️',
            2 => 'Niveau de Vérification Intermédiaire ✅',
            1 => 'Niveau de Vérification Basique ⚠️',
            default => 'Utilisateur Non vérifié (Invité).❓',
        } ;
    }


    public function progress() {

        $level = $this->verificationLevel() ;

        return match($level) {
            4 => 100,
            3 => 75,
            2 => 50,
            1 => 25,
            default => 0
        } ;
    }


    public function hasVerifiedPhone(): bool
    {
        return !is_null($this->phone_verified_at);
    }

    public function hasVerifiedIdentity(): bool
    {
        return !is_null($this->identity_verified_at);
    }

    public function hasVerifiedAdress() : bool {

        return !is_null($this->address_verified_at) ;
    }



    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($this->pseudo);

        $this->attributes['slug'] = $this->generateUniqueSlug($slug);
    }

    protected function generateUniqueSlug($slug)
    {
        $count = User::where('slug', 'like', $slug . '%')->count();

        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailCustom());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordReset($token));
    }

    /**************************** Les relations ************************************/

            /***************** Message *********/

    public function messagesTo() {

        return $this->hasMany(Message::class, 'to_id') ;
    }

    public function messagesFrom() {

        return $this->hasMany(Message::class, 'from_id') ;
    }

    public function unreadCount() {

        return $this->messagesFrom()->where('read_at', NULL)->count()  ;
    }


    public function lastMessage() {

        return Message::where(function($query) {

            $query->where('from_id', Auth::user()->id)->where('to_id', $this->id)  ;

        })->orWhere(function($query) {

            $query->where('from_id', $this->id)->where('to_id', Auth::user()->id) ;

        })->orderBy('created_at', 'desc')->latest()->first() ;
    }

            /***************** Annonce *********/

    public function travelerAnnonces() : HasMany {

        return $this->hasMany(Annonce::class, 'traveler_id') ;
    }

    public function senderAnnonces() : HasMany {

        return $this->hasMany(Annonce::class, 'sender_id') ;
    }

    public function creatorAnnonces() : HasMany {

        return $this->hasMany(Annonce::class, 'creator_id') ;
    }

            /***************** Commande *********/

    public function creatorCommandes() {

        return $this->hasMany(Commande::class, 'creator_id') ;
    }

    public function receverCommandes() {

        return $this->hasMany(Commande::class, 'recever_id') ;
    }

    public function rates() {

        return $this->hasMany(Rate::class) ;
    }

    /***************** conversation *********/

   public function conversations() : BelongsToMany {

        return $this->belongsToMany(Conversation::class) ;
   }

   public function messages() {

        return $this->hasMany(Message::class) ;
   }

   public function lastAnnonce() {

        return $this->creatorAnnonces()->latest()->first()  ;
   }
}
