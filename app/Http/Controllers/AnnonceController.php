<?php

namespace App\Http\Controllers;

use App\Events\AnnonceEvent;
use App\Http\Requests\StoreAnnonceRequest;
use App\Http\Requests\UpdateAnnonceRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{

    public function create(Request $request) {

        $trajet = new Annonce() ; 

        $trajet->fill([
            'title' => '',
            'description' => '',
            'kg' => $request->kg,
            'price' => $request->price,
            'starts_city' => $request->starts_city,
            'ends_city' => $request->ends_city,
            'company' => '',
            'starts_at' => now()->day(12),
            'ends_at' => now()->month(11),
            'type' => $request->type
        ]) ; 

        $transports = [
            'Avion',
            'Batteau',
            'Train'
        ] ; 

        // dd($trajet) ; 

        return view('annonces.form', [
            'trajet' => $trajet,
            'transports' => $transports
        ]) ; 
    }

    public function store(StoreAnnonceRequest $request) {

        event(new AnnonceEvent(new Annonce(), $request->validated())) ; 
        
        return redirect()->route('annonces.liste')->with('success', 'Trajet créé avec succès !') ; 
    }


    public function edit(Annonce $annonce) {
        
        $transports = [
            'Avion',
            'Batteau',
            'Train'
        ] ; 


        return view('annonces.form', [
            'trajet' => $annonce,
            'transports' => $transports
        ]) ; 
    }

    public function update(Annonce $annonce, UpdateAnnonceRequest $request)  {

        event(new AnnonceEvent($annonce, $request->validated())) ; 

        return redirect()->route('annonces.liste')->with('success', 'Trajet modifié avec succès !') ; 
    }
    
    public function destroy(Annonce $annonce) {

        $annonce->delete() ; 

        return redirect()->back()->with('success', 'Le trajet est bien supprimé') ; 

    }
    
    
    public function archive(Annonce $annonce) {

        // if ($annonce->status == 'en_attente' ) {
            
        //     return redirect()->back()->with('warning', 'Vous ne pouvez pas achiver, le trajet est toujours en attente d\'acceptation') ; 
        // } 
        
        $annonce->status = 'archive'  ; 
        $annonce->save() ; 

        return redirect()->back()->with('success', 'Le trajet est bien archivé') ; 

    }
    
}
