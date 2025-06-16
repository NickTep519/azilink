<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Commande;

class DashboardController extends Controller
{
    public function trajets() {
        
        /** @var Annonce $trajets */
        
       $trajets = Annonce::query()->where('creator_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(30)  ; 
       
       $trajets_en_cours = Annonce::query()->where('creator_id', auth()->user()->id)
                                            ->enAttente()->get() ;
                                            
        $trajets_termine = Annonce::query()->where('creator_id', auth()->user()->id)
                                            ->termine()->get() ; 
                                            
        $gain_en_cours = Commande::query()->where('creator_id', auth()->user()->id)
                                            ->where('status', 'accepte')
                                            ->get() ; 
                                            
        $gain_termine = Commande::query()->where('creator_id', auth()->user()->id)
                                            ->where('status', 'termine')
                                            ->get() ; 

        return view('annonces.trajets', [
            'trajets' => $trajets,
            'trajets_en_cours' => $trajets_en_cours,
            'trajets_termine' => $trajets_termine,
            'gain_en_cours' => $gain_en_cours,
            'gain_termine' => $gain_termine,
        ]) ;
    }
}
