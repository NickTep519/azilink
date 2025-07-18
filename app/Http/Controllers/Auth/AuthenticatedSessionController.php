<?php

namespace App\Http\Controllers\Auth;

use App\Events\LoginEvent;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login') ;
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {    

        $request->authenticate();

        $request->session()->regenerate() ;

        event(new LoginEvent($request->validated()) ) ;

        return redirect()->intended(route('home')) ;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout() ;

        $request->session()->invalidate() ;

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
