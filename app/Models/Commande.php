<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes ; 

    protected $table = 'commandes' ; 

    protected $guarded = [] ; 

    public function conversation() {

        return $this->belongsTo(Conversation::class) ; 
    }

    public function rates() : HasMany { 

        return $this->hasMany(Rate::class); 
    }

    public function annonce() {

        return $this->belongsTo(Annonce::class)  ; 
    }

    public function creatorUser() {

        return $this->belongsTo(User::class, 'creator_id') ; 
    }

    public function receverUser() {

        return $this->belongsTo(User::class, 'recever_id') ; 
    }
    
}
