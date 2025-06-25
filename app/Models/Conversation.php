<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    protected $appends = ['recipient', 'session'];

    const STATUS_DRAFT = 'draft';
    const STATUS_ACTIVE = 'active';

    public function getRecipientAttribute()
    {
        $otherUser = $this->users->firstWhere('id', '!=', auth()->id());
        $isCreator = $this->annonce->creatorUser->id === auth()->id();
        $isAnnonceTypeX = $this->annonce->type;

        return $isAnnonceTypeX
            ? ($isCreator ? $otherUser : auth()->user())
            : ($isCreator ? auth()->user() : $otherUser);
    }

    public function getSessionAttribute(){

        return ! $this->messages()->exists() ? session()->get('message', '') : ' ' ; 
    }


    public function commandes()
    {

        return $this->hasMany(Commande::class);
    }


    public function annonce()
    {

        return $this->belongsTo(Annonce::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function users()
    {

        return $this->belongsToMany(User::class);
    }

    public function messages()
    {

        return $this->hasMany(Message::class);
    }


    public static function existsBetweenUsers(array $userIds)
    {
        return self::whereHas('users', function ($query) use ($userIds) {
            $query->whereIn('user_id', $userIds);
        }, '=', count($userIds))
            ->has('users', '=', count($userIds)) // S'assure que le nombre correspond
            ->exists();
    }


    public function lastMessage()
    {

        return $this->hasOne(Message::class)->latestOfMany();
    }




    public function unreadMessages()
    {

        return $this->hasMany(Message::class)
            ->where('is_read', false)
            ->where('user_id', auth()->id())
            ->where('conversation_id', $this->id);
    }
}
