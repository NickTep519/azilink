<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Validation\UncompromisedVerifier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Redirect;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'], 
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
                                                                    ->mixedCase() // Majuscules et minuscules requises
                                                                    ->letters() // Lettres requises
                                                                    ->numbers() //  Chiffres requis
                                                                    ->symbols() // Caractères spéciaux requis
                                                                    ->uncompromised() // Vérifie que le mot de passe n'a pas été compromis
            ],
        ]);

        $user = User::create([
            'pseudo' => $request->pseudo, 
            'name' => $request->name,
            'first_name' => $request->first_name,
            'phone' => $request->phone, 
            'email' => $request->email,
            'image' => 'images/avatar.png', 
            'country_code' => $request->country_code, 
            'password' => Hash::make($request->password),
        ]);

        $user->save() ; 

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::PROFILE)->with('warning', 'Veuillez compléter vos informations puis sauvegardez ') ; 
        // return redirect()->route('emailverified');
    }
}
