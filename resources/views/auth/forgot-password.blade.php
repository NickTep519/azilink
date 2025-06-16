@extends('base')

@section('title', config('app.name'). ' | Mot de passe oublié')
    
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
            <li> <span class="text-breadcrumb">Mot de passe oublié</span></li>
          </ul>
        </div>
      </section>
      
      <section class="box-section box-location-shop background-body pb-50">
        <div class="container"> 
          <div class="row align-items-end"> 
            <div class="col-lg-7 wow fadeInUp" style="visibility: visible;"> 
              <h1 class="neutral-1000 mt-15 mb-15"><span>Réinitialisation de chargement de mot de passe</span></h1>
              <p class="text-xl-medium neutral-500">Vous avez oublié votre mot de passe ? Pas de problème. Indiquez simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra de choisir un nouveau mot de passe.</p>
            </div>
          </div>
          <div class="row mt-60"> 
            <div class="form-login"> 
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 " :status="session('status')" />
            
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4 btn btn-black"> 
                        <button style="all: unset" type="submit"> {{ __('Lien de réinitialisation du mot de passe par e-mail') }}  </button> 
                    </div>
                </form>
            </div>
          </div>
        </div>
      </section>
</main>
    
@endsection
