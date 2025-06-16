<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriberRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscriber(NewsletterSubscriberRequest $request) {

        NewsletterSubscriber::create($request->validated()) ; 

        return redirect()->back()->with('success', 'Merci de vous êtes aboné.e à notre Newsletter') ; 
    }
}
