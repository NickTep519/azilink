<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Requests\SearchAnnonceRequest;

class RequestController extends Controller
{
    public function index(Request $request) {
        
        
        $query = Annonce::query()->requests()->enAttente() ;
        

        if ($request->filled('price')) {
            
            $price = $request->price ; 
            
            if($price==0){
                $price = 1000 ; 
            }
            
            $query->where('price', '<=', $price) ; 
        }
        if ($request->filled('kg')) {
            $query->where('kg', $request->kg) ; 
        }
        if ($request->filled('starts_city')) {
            $query->where('starts_city', 'like', "%{$request->starts_city}%") ; 
        }
        if ($request->filled('ends_city')) {
            $query->where('ends_city', 'like', "%{$request->ends_city}%") ; 
        }

        /** @var Annonce $requests */

        $requests = $query->paginate(12)  ;

        return view('annonces.requests.index', [
            'requests' => $requests,
            'toutes_les_demandes' => Annonce::query()->requests()->get()->count(),
        ]) ; 
    }


    public function show(string $slug, Annonce $annonce) {

        
        $sessionKey = 'annonce_viewed_'.$annonce->id;
        if (!session()->has($sessionKey)) {
            $annonce->increment('views');
            session()->put($sessionKey, true);
        }


        return view('annonces.requests.show', [
            'request' => $annonce
        ]) ; 
    }

    public function create() {

        
        $offer = new Annonce() ; 

        $offer->fill([
            'ends_city' => 'Cotonou',
            'starts_at' => now()->toDateString()
        ]) ; 

        $transports = [
            'Avion',
            'Batteau',
            'Train'
        ] ; 

        return view('annonces.requests.form', [
            'request' => $offer,
            'transports' => $transports
        ]) ; 


    }

    public function edit(Annonce $annonce) {
         
        $transports = [
            'Avion',
            'Batteau',
            'Train'
        ] ; 


        return view('annonces.requests.form', [
            'offer' => $annonce,
            'transports' => $transports
        ]) ; 
    }
}
