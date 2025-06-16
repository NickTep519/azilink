<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use SoftDeletes ; 

    protected $table = 'annonces'; 

    protected $guarded = [] ; 

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public function slug() {

        return Str::slug($this->title) ; 
    }
   
    /**************************** Les relations ***********************/

            /*********** User ********/

    public function travelerUser() : BelongsTo {

        return $this->belongsTo(User::class, 'traveler_id') ; 
    }

    public function senderUser() : BelongsTo {

        return $this->belongsTo(User::class, 'sender_id') ; 
    }

    public function creatorUser() : BelongsTo {

        return $this->belongsTo(User::class, 'creator_id') ; 
    }

            /*********** Commande ********/

    public function commandes() {

        return $this->hasMany(Commande::class) ; 
    }

    /**************************** Les Scope ***********************/

    public function scopeOffers(Builder $builder) : Builder {

        return $builder->where('type', true) ; 
    }

    public function scopeRequests(Builder $builder) : Builder {

        return $builder->where('type', false) ; 
    }

    public function scopeEnAttente(Builder $builder) : Builder {

        return $builder->where('status', 'en_attente') ;  
    }
    
    public function scopeTermine(Builder $builder) : Builder {

        return $builder->where('status', 'termine') ;  
    }
    
    public function scopeArchive(Builder $builder) : Builder {

        return $builder->where('status', 'archive') ;  
    }
    
            /**  Conversation */

    public function conversations() {

        return $this->hasMany(Conversation::class) ; 
    }
    
    
}
