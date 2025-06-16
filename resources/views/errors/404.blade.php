@extends('base')

@section('title', config('app.name'). ' | 404')
    
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
            <li> <span class="text-breadcrumb">404</span></li>
          </ul>
        </div>
      </section>
      
      <section class="section-box box-become-video background-body">
        <div class="container"> 
          <div class="row"> 
            <div class="col-lg-6 col-md-12 mx-auto">
              <div class="text-center neutral-1000"><img class="mr-10" src="assets/imgs/page/pages/confirmation.svg" alt="AziLink">
                <h5 class="mt-15 mb-15 neutral-1000 wow fadeInUp" style="visibility: visible;"> Erreur 404 : Page introuvable.</h5>
                <p class="mb-50"> La page que vous cherchez n'existe pas.</p>
                 <div class="mt-4 flex items-center justify-between">
                    <a href="{{route('home')}}" class="btn btn-black">
                        {{ __('Page d\'Accueil') }}
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</main>
    
@endsection
