@extends('base')

@section('title', config('app.name'). ' | Inscription')
    
@section('content')

<main class="main">
      <section class="box-section box-breadcrumb background-body">
        <div class="container"> 
          <ul class="breadcrumbs"> 
            <li> <a href="/">Acceuil</a><span class="arrow-right"> 
                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></span>
            </li>
            <li> <span class="text-breadcrumb">S'INSCRIRE</span></li>
          </ul>
        </div>
      </section>
      
      <section class="box-section box-location-shop background-body pb-50">
        <div class="container"> 
          <div class="row align-items-end"> 
            <div class="col-lg-7 wow fadeInUp" style="visibility: visible;"> 
              <h1 class="neutral-1000 mt-15 mb-15"><span>Formulaire d'Inscription</span></h1>
              <p class="text-xl-medium neutral-500">Merci de bien vouloir remplir le formulaire avec attention.</p>
            </div>
          </div>
          <div class="row mt-60"> 
            <div class="form-login"> 
              <form action="{{route('register')}}" method="POST">
                @csrf
    
                <div class="form-group"> 
                  <label for="pseudo" :value="__('Name')"  class="text-sm-medium">Pseudo*</label>
                  <input type="text" id="pseudo" name="pseudo" value="{{old('pseudo')}}" required autofocus autocomplete="name" class="form-control username">
                  <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
                </div>

                <!-- Name -->
    
                <div class="form-group"> 
                  <label for="name" :value="__('Name')"  class="text-sm-medium">Nom*</label>
                  <input type="text" id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name" class="form-control username">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                 <!-- first_name -->
    
                <div class="form-group"> 
                    <label for="first_name" :value="__('first_name')"  class="text-sm-medium">Prenom*</label>
                    <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" required autofocus autocomplete="name" class="form-control username">
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                 <div class="form-group"> 
                    <label for="phone" :value="__('phone')"  class="text-sm-medium">Tel * :</label>
                    <input type="text" id="phone" name="phone" value="{{old('phone')}}" required autofocus autocomplete="name" class="">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
    
                 <!-- Email Address -->
    
                <div class="form-group"> 
                  <label for="email" :value="__('Email')" class="text-sm-medium">Votre email *</label>
                  <input type="email" id="email" name="email" value="{{old('email')}}" required autocomplete="username" class="form-control email">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                 <!-- Password -->
    
                <div class="row"> 
                  <div class="col-6">
                    <div class="form-group"> 
                      <label for="password" :value="__('Password')" class="text-sm-medium">Mot de passe *</label>
                      <input type="password" id="password"  name="password" required autocomplete="new-password" class="form-control password" placeholder="***********">
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                  </div>
    
                   <!-- Confirm Password -->
    
                  <div class="col-6">
                    <div class="form-group"> 
                      <label for="password_confirmation" :value="__('Confirm Password')" class="text-sm-medium">Confirmez le mot de passe *</label>
                      <input type="password" id="password_confirmation"  name="password_confirmation" required autocomplete="new-password" class="form-control password" placeholder="***********">
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                  </div>
                </div>
    
                <ul id="passwordCriteria" style="list-style: none; padding: 0; display: flex; gap: 20px;">
                  <li id="length" class="invalid">Minimum 8 caractères</li>
                  <li id="uppercase" class="invalid">Au moins une majuscule</li>
                  <li id="lowercase" class="invalid">Au moins une minuscule</li>
                  <li id="number" class="invalid">Au moins un chiffre</li>
                  <li id="special" class="invalid">Au moins un caractère spécial (@, #, $, etc.)</li>
                </ul>
    
                <div class="form-group mt-45 mb-30"> <a class="btn btn-black-lg"> <button style="all: unset" > S'inscrire </button> 
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></a>
                </div>
                <p class="text-sm-medium neutral-500"> Vous avez déjà un compte ?  <a class="neutral-1000 btn-signin" href="#">Connectez-vous ici !</a></p>
              </form>
            </div>
          </div>
        </div>
      </section>
</main>


<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#phone");
        // window.intlTelInput(input, {
        //     loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
        // });

        const userCountry = "{{ auth()->user()->country_code ?? 'bj' }}";

        intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: (success, failure) => {
                fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => success(data.country_code))
                    .catch(() => failure());
            },
            initialCountry: userCountry.toLowerCase(),
            hiddenInput: (telInputName) => ({
                phone: "phone_full",
                country: "country_code"
            }),
            separateDialCode: true
        });
    </script>



    
@endsection
