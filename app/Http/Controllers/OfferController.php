<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SearchAnnonceRequest;


class OfferController extends Controller
{
    public function index(Request $request) {


        // dd($request->all()) ; 
        
        $query = Annonce::query()->offers()->enAttente() ;

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
        
        
        
        /** @var Annonce $offers */
        

        $offers = $query->paginate(12)  ;

        return view('annonces.offers.index', [
            'offers' => $offers,
            'toutes_les_offres' => Annonce::query()->offers()->get()->count(),
        ]) ; 
    }

    public function show(string $slug, Annonce $annonce) {

        
        $sessionKey = 'annonce_viewed_'.$annonce->id;
        if (!session()->has($sessionKey)) {
            $annonce->increment('views');
            session()->put($sessionKey, true);
        }

       
        return view('annonces.offers.show', [
            'offer' => $annonce
        ]) ; 

    }

  

    public function edit(Annonce $annonce) {
        $transports = [
            'Avion',
            'Batteau',
            'Train'
        ]; 

        return view('annonces.offers.form', [
            'offer' => $annonce,
            'transports' => $transports
        ]); 
    }
}
