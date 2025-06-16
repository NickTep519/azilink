<?php

namespace App\Listeners;

use App\Events\AnnonceEvent;
use App\Http\Controllers\CityImageController;
use App\Models\Annonce;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AnnonceListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AnnonceEvent $event): void
    {
        if ($event->annonce->exists) {

            $event->annonce->update($event->data) ; 

            if ($event->data['type']) {

                $event->annonce->travelerUser()->associate(auth()->user()) ;
                // $event->annonce->senderUser()->associate(NULL)  ; 

            } else {

                $event->annonce->senderUser()->associate(auth()->user())  ; 
                // $event->annonce->travelerUser()->associate(NULL) ;

            }

            $event->annonce->save() ; 

        } else {
            
            /** @var Annonce $annonce */

            $annonce = Annonce::create($event->data) ;

            $cityImage = app(CityImageController::class)->fetchCityImage($event->data['ends_city']) ;

            if (empty($cityImage)) {
                $cityImage = [
                    'image_url' => 'assets/imgs/page/homepage7/img-hotel2.png'
                ] ; 
            }

            $annonce->image_city_destination = $cityImage['image_url'] ;
            $annonce->kg_restant = $annonce->kg ; 

            $annonce->creatorUser()->associate(auth()->user()) ;
          
            if ($event->data['type']) {

                $annonce->travelerUser()->associate(auth()->user()) ;

            } else {

                $annonce->senderUser()->associate(auth()->user())  ; 

            }

            $annonce->save() ; 
        }
        
    }
}
