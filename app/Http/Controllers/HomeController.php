<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Notifications\NewNotif;
use App\Mail\CommandeAlerteMail;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index() {


        // $user = User::find(18); 
        // Notification::send($user, new NewNotif("Hello ", "/dashboard"));

        $offers = Annonce::enAttente()->offers()->orderBy('created_at', 'desc')->limit(6)->get() ; 
        $requests = Annonce::enAttente()->requests()->orderBy('created_at', 'desc')->limit(8)->get() ; 
        
        
        $popularCitiesAnnonces = Annonce::selectRaw('ends_city, image_city_destination, COUNT(ends_city) as ads_count') // Sélectionne la ville et le nombre d'annonces
                                    ->having('ads_count', '>', 1)                                      // prendre ceux dont le nombre est supérieur à 
                                    ->groupBy('ends_city', 'image_city_destination')                 // Regroupe par ville
                                    ->orderBy('ads_count', 'desc')                                  // Trie par nombre d'annonces
                                    ->take(10)                                                     // Limite aux 10 premières villes (optionnel)
                                    ->get();
    // dd($popularCitiesAnnonces) ; 

    // Mail::to(Auth::user())->send(new CommandeAlerteMail('babababab', 'gegegegeg', Commande::find(19))) ;

    

    // Auth::user()->notify(new NewNotification('titre', 'message', 'lient')) ; 
    // $notif = Auth::user()->notifications()->latest()->first() ; 

    // dd($notif->data['time']->diffForHumans()) ; 
    // Auth::user()->notify(new NewNotification('Nick vous a envoyé un message', route('home'))) ; 


        return view('home', [
            'offers' => $offers,
            'requests' => $requests,
            'popularCitiesAnnonces' => $popularCitiesAnnonces,
        ]) ; 
    }
    
    
    public function contact() {
        return view('contact') ; 
    }
    
    public function trajets() {
        return view('annonces.trajets') ; 
    }


    
}
