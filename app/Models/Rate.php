<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;

    protected $guarded = [] ; 

    public function commande() : BelongsTo {

        return $this->belongsTo(Commande::class) ; 
    }

    public function user() {

        return $this->belongsTo(User::class) ; 
    }
}
