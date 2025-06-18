<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\TwilioVerifyService;
use Illuminate\Support\Facades\Http;
use Propaganistas\LaravelPhone\PhoneNumber;

class ProfileController extends Controller
{

    public function __construct(protected TwilioVerifyService $twilio)
    {
        
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            
            'user' => $request->user(),
        ]);
    }

    public function profile(Request $request) {

        return view('profile.profile', [
            'user' => $request->user()
        ]) ; 
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $datas = $request->validated() ; 

        // dd($datas) ; 

        if (array_key_exists('accord', $datas)) {
            $request->user()->fill($datas);
        }else {
            $request->user()->fill(array_merge($datas, ['accord' => 0])) ; 
        }

       

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null ;
        }

        if (array_key_exists('phone', $request->user()->getDirty())) {
            $user = $request->user();
        
            // Réinitialiser la vérification
            $user->phone_verified_at = null;
            $user->save();
        
            $phone = new PhoneNumber($user->phone, $user->country_code);
            $this->twilio->sendVerificationCode(str_replace(' ', '', $phone->formatInternational()));

            return redirect()->route('phone.verify')->with('success', 'Code envoyé avec succès.');
        }
        

        $request->user()->save();

        return Redirect::back()->with('success', 'Vos informations sont mises à jour') ;
    }

    public function uploadImage(Request $request ) {


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:8028',
        ]);

        // dd($request->file('image')) ; 

        $user = Auth::user() ; 

        if (Storage::disk('public')->exists($user->image)) {

            Storage::disk('public')->delete($user->image) ;
        }

        $path = $request->file('image')->store('images', 'public') ;

        $user->image = $path ; 
        $user->save() ;  

        return back()->with('success', 'Image uploadée avec succès !')->with('path', $path) ; 
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
