@extends('base')

@section('title', config('app.name'). ' | Connexion')
    
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
            <li> <span class="text-breadcrumb">Se connecter</span></li>
          </ul>
        </div>
      </section>
      
      <section class="box-section background-body">
        <div class="container"> 
          <div class="row align-items-end"> 
            <div class="col-lg-7 wow fadeInUp" style="visibility: visible;"> 
              <h1 class="neutral-1000 mt-15 mb-15"><span>Formulaire de connexion</span></h1>
              
            </div>
          </div>
          <div class="row mt-60"> 
            <div class="form-login"> 
              <form action="{{route('login')}}" method="POST">
                  @csrf
    
                   <!-- Email Address -->
    
                  <div class="form-group"> 
                    <label for="email" :value="__('Email')" class="text-sm-medium">Email</label>
                    <input type="email" id="email" name="email"  :value="old('email')" required autofocus autocomplete="username" class="form-control email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
    
    
                  <!-- Password -->
    
                  <div class="form-group"> 
                    <label for="password" :value="__('Password')" class="text-sm-medium">Mot de passe</label>
                    <input type="password" id="password" name="password"  required autocomplete="current-password" class="form-control password" placeholder="">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
    
                   <!-- Remember Me -->
                  <div class="form-group"> 
                    <div class="box-remember-forgot">   
                      <div class="remeber-me">
                        <label  for="remember_me" class="text-xs-medium neutral-500"> 
                          <input type="checkbox" id="remember_me" name="remember" class="cb-remember">Se souvenir de moi
                        </label>
                      </div>
    
                      <div class="forgotpass">
                        @if (Route::has('password.request'))
                          <a class="text-xs-medium neutral-500" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        @endif
                      </div>
    
                    </div>
                  </div>
    
                  <div class="form-group mt-45 mb-30"> <a class="btn btn-black-lg" href=""> <button style="all: unset" >Se Connecter </button> 
                      <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></a></div>
                  <p class="text-sm-medium neutral-500">Vous n'avez pas de compte ? <a class="neutral-1000" href="{{route('register')}}">Inscrivez-vous ici !</a></p>
                </form>
            </div>
          </div>
        </div>
      </section>
</main>
    
@endsection