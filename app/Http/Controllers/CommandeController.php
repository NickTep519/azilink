<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Events\CommandeEvent;


class CommandeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::where('creator_id', auth()->id())
                                    ->orWhere('recever_id', auth()->id())
                                    ->orderBy('updated_at', 'desc')
                                    ->with(['annonce.creatorUser', 'receverUser', 'creatorUser'])
                                    ->paginate(15) ;
                                    
        // $annonces = Annonce::all() ; 
                                    
                                    
        // foreach ($annonces as $annonce) {

        //     $commandess = $annonce->commandes ;
        //     $nKg = 0 ;  
        //     foreach ($commandess as $commande) {
                
        //         $nKg += $commande->kg_commande ; 
        //     }

        //     $annonce->kg_restant = ($annonce->kg - $nKg) ; 

        //     $annonce->save() ; 

        // }

        
        return view('commandes.index', [
                'commandes' => $commandes                        
            ]) ; 

        // return response()->json([
        //     'data' => $commandes
        // ]) ; 

  


                                    
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'annonce_id' => 'required|exists:annonces,id',
            'recever_id' => 'required|exists:users,id',
            'kg_commande' => 'required|integer|min:1',
            'price' => 'required|min:1',
            'conversation_id' => 'required|numeric|min:1',
        ]);

        // dd($validated) ; 

        
        $annonce = Annonce::findOrFail($validated['annonce_id']) ; 
        
        // if($annonce->creatorUser->id != auth()->user()->id) {
            
        //     return back()->with('warning', 'Vous n\'etes pas autorisé à faire cette action') ; 
            
        // }
        
        $nbr_kilo_annonce = 0 ; 
        
        $commandes = $annonce->commandes ; 
        
        foreach ($commandes as $commande) {
            
            $nbr_kilo_annonce += $commande->kg_commande ; 
            
        }
       
       
        if ($validated['kg_commande'] > ($annonce->kg - $nbr_kilo_annonce)) {
            
            return back()->with('warning', 'Plus d\'assez kilo disponible pour ce trajet, créer un nouveau') ; 
            
        } else {
            
            event(new CommandeEvent( new Commande() , $validated) ) ;
        }
        
        
        return redirect()->route('commandes.index')->with('success', 'Votre commande a bien été créée') ; 
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $validated = $request->validate([
            
            'status' => 'required|in:creee,conflit,expediee,accepte,refuse,termine,annule,livree,recue'
        ]);
        
        event(new CommandeEvent($commande, $validated) ) ;
        
        return redirect()->back()->with('success', 'Le status de votre commande a bien été mis à jour') ; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
