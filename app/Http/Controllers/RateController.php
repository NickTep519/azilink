<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Redirect;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'commande_id' => 'required|exists:commandes,id',
            'rate' => 'required|numeric|min:1',
            'comment' => 'required|string',
        ]);

        $rate = new Rate() ; 

        $rate->rate = $validated['rate'] ; 
        $rate->comment = $validated['comment'] ; 
        $rate->commande_id = $validated['commande_id'] ;
        $rate->save() ; 

        $rate->user_id = $rate->commande->creatorUser->id ; 
        $rate->save() ; 

        $rate->commande->status = 'terminee' ; 
        $rate->commande->save() ; 

        return Redirect::route('commandes.index')->with('success', 'Merci ! ') ; 
    }

    /**
     * Display the specified resource.
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
