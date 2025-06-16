<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {

            return redirect()->route('login') ;
        }
        
        $user = Auth::user() ; 

        if ( is_null($user->phone) || is_null($user->date_of_birth) || is_null($user->sex) ) {
            
            return redirect(RouteServiceProvider::PROFILE)->with('warning', 'Veuillez compléter vos informations puis sauvegardez ') ; 
        }

        return $next($request);
    }
}
