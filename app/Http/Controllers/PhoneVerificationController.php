<?php 
// app/Http/Controllers/PhoneVerificationController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PhoneVerification;
use libphonenumber\PhoneNumberUtil;
use App\Services\TwilioVerifyService;
use App\Services\AfricaTalkingService;
use Propaganistas\LaravelPhone\PhoneNumber;


class PhoneVerificationController extends Controller
{

    protected $twilio;

    public function __construct(TwilioVerifyService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function phoneVerify() {

        return view('phone.verify') ; 
    }


    public function send(Request $request, AfricaTalkingService $sms)
    {
        // $request->validate([
        //     'phone' => 'required|string',
        // ]);

        // // $code = rand(100000, 999999);

        // // PhoneVerification::updateOrCreate(
        // //     ['phone' => $request->phone],
        // //     ['code' => $code, 'expires_at' => now()->addMinutes(5)]
        // // );

        // // $response = $sms->sendSms($request->phone, "Votre code de vérification est : $code");

        // // dd($response) ; 

        // return redirect()->route('phone.verify')->with('success', 'Code envoyé avec succès.');

        $request->validate(['phone' => 'required|string']);
        $this->twilio->sendVerificationCode($request->phone);
        return redirect()->route('phone.verify')->with('success', 'Code envoyé avec succès.');
        // return response()->json(['message' => 'Code envoyé !']);
    }

    public function verify(Request $request)
    {

        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'country_code' => 'required|string', 
        ]);

        $isValid = $this->twilio->checkVerificationCode($request->phone, $request->code);

        $phone = new PhoneNumber($request->phone, $request->country_code) ; 

        // dd($phone->formatNational()) ; 

        if ($isValid) {
            $user = User::where('phone', str_replace(' ', '', $phone->formatNational()) )->first();

            if ($user && !$user->phone_verified_at) {
                $user->phone_verified_at = now();
                $user->save();
            }
            return redirect()->route('profile.edit')->with('success', 'Numéro vérifié ✅') ;
        }

        return redirect()->back()->with('warning', 'Code incorrect ❌') ;

        // $request->validate([
        //     'phone' => 'required|string',
        //     'code' => 'required|string|size:6',
        // ]);

        // // dd($request->all()) ; 

        // $record = PhoneVerification::where('phone', $request->phone)
        //     ->where('code', $request->code)
        //     ->where('expires_at', '>', now())
        //     ->first();

        // if (!$record) {
        //     return  redirect()->back()->with('error', 'Code invalide ou expiré.') ;
        // }

        // $user = User::where('phone', $request->phone)->first();

        // if ($user && !$user->phone_verified_at) {
        //     $user->phone_verified_at = now();
        //     $user->save();
        // }

        // return redirect()->route('annonces.liste')->with('success', 'Numéro vérifié avec succès. ✅') ; 


    }
}
