<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    public function userDetails(User $user)
    {

        // dd($user->receverCommandes()->where('status', 'terminee')->count()) ; 

        // dd($user->moyenne()) ; 
     
        return view('users.details', ['user' => $user,] );
    }
    
}
