<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function faq() {

        return view('faq') ; 
    }

    public function submit(ContactFormRequest $request) {

      

        Contact::create($request->validated()) ; 

        return redirect()->back()->with('success', 'Nous avons bien recu votre message. Un membre de notre equipe vous repondra') ; 
    }
}
