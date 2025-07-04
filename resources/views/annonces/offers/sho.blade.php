@extends('base')

@section('meta')

  <meta property="og:title" content="{{ $offer->title }}" />
  <meta property="og:description" content="{{ $offer->description }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ $offer->image_city_destination }}" />
  <meta property="og:type" content="{{ 'website' }}" />
  <meta property="og:site_name" content="{{config('app.name')}}" />
  
  
  
    <meta name="twitter:card" content="{{$offer->image_city_destination }}">
    <meta name="twitter:title" content="{{ $offer->title }}">
    <meta name="twitter:description" content="{{$offer->description}}">
    <meta name="twitter:image" content="{{$offer->image_city_destination }}">
    <meta name="twitter:url" content="{{route('home')}}">
    <meta name="twitter:site" content="{{config('app.name')}}">


@endsection


@section('title', config('app.name') . ' | offers | ' . $offer->title)

@section('content')
<main class="main">
    <section class="box-section box-breadcrumb background-body">
      <div class="container text-center"> 
        <ul class="breadcrumbs"> 
          <li> <a href="{{route('home')}}">Accueille</a><span class="arrow-right"> 
              <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg></span></li>
          <li> <a href="{{route('offers.index')}}">Offres</a><span class="arrow-right"> 
              <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg></span></li>
          <li> <span class="text-breadcrumb"> {{$offer->title}} </span></li>
        </ul>
      </div>
    </section>
    
    <section class="box-section box-content-tour-detail background-body"> 
      <div class="container"> 
        <div class="tour-header"> 
          <div class="tour-rate"> 
            <div class="rate-element"><span class="rating">4.96 <span class="text-sm-medium neutral-500">(672 reviews)</span></span></div>
          </div>
          <div class="row">   
            <div class="col-lg-8"> 
              <div class="tour-title-main"> 
                <h4 class="neutral-1000">{{$offer->title}}</h4> 
              </div>
            </div>
          </div>
          <div class="tour-metas"> 

            <div class="tour-meta-left"> 
                <p class="text-md-medium neutral-500 mr-20 tour-location"> 
                  <svg width="12" height="16" viewbox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z" fill=""></path>
                  </svg> {{$offer->starts_city}}
                </p>

                <p class="text-md-medium neutral-500 mr-20 tour-location"> 
                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z" fill=""></path>
                    </svg>  {{$offer->ends_city}}
                </p>

                <p class="text-md-medium neutral-500 tour-code mr-15"> 
                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2729 0.273646C13.4097 0.238432 13.5538 0.24262 13.6884 0.28573L18.5284 1.83572L18.5474 1.84209C18.8967 1.96436 19.1936 2.19167 19.4024 2.4875C19.5891 2.75202 19.7309 3.08694 19.7489 3.46434C19.7494 3.47622 19.7497 3.4881 19.7497 3.49998V15.5999C19.7625 15.8723 19.7102 16.1395 19.609 16.3754C19.6059 16.3827 19.6026 16.39 19.5993 16.3972C19.476 16.6613 19.3017 16.8663 19.1098 17.0262C19.1023 17.0324 19.0947 17.0385 19.087 17.0445C18.8513 17.2258 18.5774 17.3363 18.2988 17.3734L18.2927 17.3743C18.0363 17.4063 17.7882 17.3792 17.5622 17.3133C17.5379 17.3081 17.5138 17.3016 17.4901 17.294L13.4665 16.0004L6.75651 17.7263C6.62007 17.7614 6.47649 17.7574 6.34221 17.7147L1.47223 16.1647C1.46543 16.1625 1.45866 16.1603 1.45193 16.1579C1.0871 16.0302 0.813939 15.7971 0.613929 15.5356C0.608133 15.528 0.602481 15.5203 0.596973 15.5125C0.395967 15.2278 0.277432 14.8905 0.260536 14.5357C0.259972 14.5238 0.259689 14.5119 0.259689 14.5V2.39007C0.246699 2.11286 0.301239 1.83735 0.420015 1.58283C0.544641 1.31578 0.724533 1.10313 0.942417 0.93553C1.17424 0.757204 1.45649 0.6376 1.7691 0.61312C2.03626 0.583264 2.30621 0.616234 2.56047 0.712834L6.56277 1.99963L13.2729 0.273646ZM13.437 1.78025L6.72651 3.50634C6.58929 3.54162 6.44493 3.53736 6.31011 3.49398L2.08011 2.13402C2.06359 2.1287 2.04725 2.12282 2.03113 2.11637C2.00054 2.10413 1.96854 2.09972 1.93273 2.10419C1.91736 2.10611 1.90194 2.10756 1.88649 2.10852C1.88649 2.10852 1.88436 2.10866 1.88088 2.11001C1.8771 2.11149 1.86887 2.11532 1.85699 2.12447C1.81487 2.15686 1.79467 2.18421 1.77929 2.21715C1.76189 2.25446 1.75611 2.28942 1.75823 2.32321C1.7592 2.33879 1.75969 2.35439 1.75969 2.36999V14.4772C1.76448 14.5336 1.78316 14.5879 1.81511 14.6367C1.86704 14.7014 1.90866 14.7272 1.94108 14.7398L6.59169 16.2199L13.3028 14.4937C13.44 14.4584 13.5844 14.4626 13.7192 14.506L17.8938 15.8482C17.9184 15.8537 17.9428 15.8605 17.9669 15.8685C18.0209 15.8865 18.0669 15.8902 18.1034 15.8862C18.1214 15.8833 18.1425 15.8759 18.1629 15.8623C18.1981 15.8309 18.2196 15.8024 18.2346 15.7738C18.2473 15.7399 18.2533 15.7014 18.2511 15.6668C18.2502 15.6512 18.2497 15.6356 18.2497 15.62V3.52464C18.2453 3.48222 18.2258 3.42174 18.1769 3.3525C18.147 3.3102 18.1062 3.2784 18.0582 3.26022L13.437 1.78025Z" fill=""></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.55957 2.02002C6.97375 2.02002 7.30957 2.3558 7.30957 2.77002V16.92C7.30957 17.3343 6.97375 17.67 6.55957 17.67C6.14533 17.67 5.80957 17.3343 5.80957 16.92V2.77002C5.80957 2.3558 6.14533 2.02002 6.55957 2.02002Z" fill=""></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4893 0.330078C13.9035 0.330078 14.2393 0.665862 14.2393 1.08008V15.2301C14.2393 15.6443 13.9035 15.9801 13.4893 15.9801C13.0751 15.9801 12.7393 15.6443 12.7393 15.2301V1.08008C12.7393 0.665862 13.0751 0.330078 13.4893 0.330078Z" fill=""></path>
                    </svg> {{$offer->starts_at->translatedFormat('d M Y')}} 
                </p>
                <p class="text-md-medium neutral-500 tour-code mr-15"> 
                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2729 0.273646C13.4097 0.238432 13.5538 0.24262 13.6884 0.28573L18.5284 1.83572L18.5474 1.84209C18.8967 1.96436 19.1936 2.19167 19.4024 2.4875C19.5891 2.75202 19.7309 3.08694 19.7489 3.46434C19.7494 3.47622 19.7497 3.4881 19.7497 3.49998V15.5999C19.7625 15.8723 19.7102 16.1395 19.609 16.3754C19.6059 16.3827 19.6026 16.39 19.5993 16.3972C19.476 16.6613 19.3017 16.8663 19.1098 17.0262C19.1023 17.0324 19.0947 17.0385 19.087 17.0445C18.8513 17.2258 18.5774 17.3363 18.2988 17.3734L18.2927 17.3743C18.0363 17.4063 17.7882 17.3792 17.5622 17.3133C17.5379 17.3081 17.5138 17.3016 17.4901 17.294L13.4665 16.0004L6.75651 17.7263C6.62007 17.7614 6.47649 17.7574 6.34221 17.7147L1.47223 16.1647C1.46543 16.1625 1.45866 16.1603 1.45193 16.1579C1.0871 16.0302 0.813939 15.7971 0.613929 15.5356C0.608133 15.528 0.602481 15.5203 0.596973 15.5125C0.395967 15.2278 0.277432 14.8905 0.260536 14.5357C0.259972 14.5238 0.259689 14.5119 0.259689 14.5V2.39007C0.246699 2.11286 0.301239 1.83735 0.420015 1.58283C0.544641 1.31578 0.724533 1.10313 0.942417 0.93553C1.17424 0.757204 1.45649 0.6376 1.7691 0.61312C2.03626 0.583264 2.30621 0.616234 2.56047 0.712834L6.56277 1.99963L13.2729 0.273646ZM13.437 1.78025L6.72651 3.50634C6.58929 3.54162 6.44493 3.53736 6.31011 3.49398L2.08011 2.13402C2.06359 2.1287 2.04725 2.12282 2.03113 2.11637C2.00054 2.10413 1.96854 2.09972 1.93273 2.10419C1.91736 2.10611 1.90194 2.10756 1.88649 2.10852C1.88649 2.10852 1.88436 2.10866 1.88088 2.11001C1.8771 2.11149 1.86887 2.11532 1.85699 2.12447C1.81487 2.15686 1.79467 2.18421 1.77929 2.21715C1.76189 2.25446 1.75611 2.28942 1.75823 2.32321C1.7592 2.33879 1.75969 2.35439 1.75969 2.36999V14.4772C1.76448 14.5336 1.78316 14.5879 1.81511 14.6367C1.86704 14.7014 1.90866 14.7272 1.94108 14.7398L6.59169 16.2199L13.3028 14.4937C13.44 14.4584 13.5844 14.4626 13.7192 14.506L17.8938 15.8482C17.9184 15.8537 17.9428 15.8605 17.9669 15.8685C18.0209 15.8865 18.0669 15.8902 18.1034 15.8862C18.1214 15.8833 18.1425 15.8759 18.1629 15.8623C18.1981 15.8309 18.2196 15.8024 18.2346 15.7738C18.2473 15.7399 18.2533 15.7014 18.2511 15.6668C18.2502 15.6512 18.2497 15.6356 18.2497 15.62V3.52464C18.2453 3.48222 18.2258 3.42174 18.1769 3.3525C18.147 3.3102 18.1062 3.2784 18.0582 3.26022L13.437 1.78025Z" fill=""></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.55957 2.02002C6.97375 2.02002 7.30957 2.3558 7.30957 2.77002V16.92C7.30957 17.3343 6.97375 17.67 6.55957 17.67C6.14533 17.67 5.80957 17.3343 5.80957 16.92V2.77002C5.80957 2.3558 6.14533 2.02002 6.55957 2.02002Z" fill=""></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4893 0.330078C13.9035 0.330078 14.2393 0.665862 14.2393 1.08008V15.2301C14.2393 15.6443 13.9035 15.9801 13.4893 15.9801C13.0751 15.9801 12.7393 15.6443 12.7393 15.2301V1.08008C12.7393 0.665862 13.0751 0.330078 13.4893 0.330078Z" fill=""></path>
                    </svg>  {{$offer->ends_at->translatedFormat('d M Y')}}
                </p>
                
              </div>
           
            <div class="tour-meta-right share-container"> <a class="btn btn-share">
                <svg width="16" height="18" viewbox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 11.5332C12.012 11.5332 11.1413 12.0193 10.5944 12.7584L5.86633 10.3374C5.94483 10.0698 6 9.79249 6 9.49989C6 9.10302 5.91863 8.72572 5.77807 8.37869L10.7262 5.40109C11.2769 6.04735 12.0863 6.46655 13 6.46655C14.6543 6.46655 16 5.12085 16 3.46655C16 1.81225 14.6543 0.466553 13 0.466553C11.3457 0.466553 10 1.81225 10 3.46655C10 3.84779 10.0785 4.20942 10.2087 4.54515L5.24583 7.53149C4.69563 6.90442 3.8979 6.49989 3 6.49989C1.3457 6.49989 0 7.84559 0 9.49989C0 11.1542 1.3457 12.4999 3 12.4999C4.00433 12.4999 4.8897 11.9996 5.4345 11.2397L10.147 13.6529C10.0602 13.9331 10 14.2249 10 14.5332C10 16.1875 11.3457 17.5332 13 17.5332C14.6543 17.5332 16 16.1875 16 14.5332C16 12.8789 14.6543 11.5332 13 11.5332Z" fill=""></path>
                </svg> <button style="all: unset" class="share-button">Partager</button> </a>
                <div class="share-options">
                    <!-- Liens de partage -->
                    <a href="https://twitter.com/intent/tweet?text={{$offer->title}}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!&url={{urlencode(route('offers.show', [$offer->slug(), $offer]))}}" target="_blank">Partager sur Twitter</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}" target="_blank">Partager sur Facebook</a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('offers.show', [$offer->slug(), $offer
                    ])) }}&title=Super%20contenu&summary=Ceci%20est%20un%20résumé" target="_blank">Partager sur LinkedIn</a>
                    <a href="https://wa.me/?text={{$offer->title}}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!%20%20%20{{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}" target="_blank">Partager sur WhatsApp</a>
                    <a href="https://t.me/share/url?url={{urlencode(route('offers.show', [$offer->slug(), $offer])) }}&text={{$offer->title}}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!" target="_blank">Partager sur Telegram</a>
                    <a href="mailto:?subject={{$offer->title}}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!{{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}" target="_blank">Partager par Email</a>
                </div>

             
          </div>
        </div>
        <div class="row mt-30">   
          <div class="col-lg-8"> 
            <div class="box-feature-car"> 
              <div class="list-feature-car"> 
                <div class="item-feature-car"> 
                  <div class="item-feature-car-inner">
                    <div class="feature-info"> 
                      <p class="text-md-medium neutral-1000"> {{$offer->kg}} Kg</p>
                    </div>
                  </div>
                </div>
                <div class="item-feature-car"> 
                  <div class="item-feature-car-inner">
                    <div class="feature-info"> 
                      <p class="text-md-medium neutral-1000"> {{$offer->price}} € / kg </p>
                    </div>
                  </div>
                </div>
                <div class="item-feature-car"> 
                  <div class="item-feature-car-inner">
                    <div class="feature-info"> 
                      <p class="text-md-medium neutral-1000"> {{$offer->m_transport}} </p>
                    </div>
                  </div>
                </div>
                <div class="item-feature-car"> 
                  <div class="item-feature-car-inner">
                    <div class="feature-info"> 
                      <p class="text-md-medium neutral-1000"> {{$offer->company}} </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-collapse-expand"> 
              <div class="group-collapse-expand"> 
                  <h6>Description</h6>
                  <svg width="12" height="7" viewbox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                <div class="collapse show" id="collapseOverview">
                  <div class="card card-body">
                    <p>{{$offer->description}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            @if (auth()->check())
                @if (auth()->user()->id === $offer->creatorUser->id )
        
                @else
                    <div class="col-lg-4">
                        <div class="booking-form"> 
                          <div class="head-booking-form"> 
                            <p class="text-xl-bold neutral-1000">Formulaire de contact</p>
                          </div>
                          <div class="content-booking-form"> 
                                <form action="{{route('conversations.store')}}" method="POST" >
                                      @csrf
        
                                      <input type="hidden" name="user_ids[]" value="{{ $offer->creatorUser->id }}" >
                                      <input type="hidden" name="user_ids[]" value="{{ auth()->user()->id }}"> 
                                      <input type="hidden" name="annonce_id" value="{{ $offer->id }}" >
                    
                                      <div class="box-button-book">
                                          <a class="btn btn-book">  <button type="submit" style="all:unset ; color: white" >Contacter</button>
                                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                          </a>
                                      </div>
                                  </form>
                                <div class="box-need-help">
                                    <a> 
                                        <svg width="12" height="14" viewbox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z" fill=""></path>
                                          </svg>Cliquez sur Contactez pour discuter avec l'annonceur
                                    </a>
                                </div>
                          </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-lg-4">
                        <div class="booking-form"> 
                          <div class="head-booking-form"> 
                            <p class="text-xl-bold neutral-1000">Formulaire de contact</p>
                          </div>
                          <div class="content-booking-form">
                                  <div class="box-button-book">
                                      <a class="btn btn-book btn-signin" href="{{route('login')}}">Se Connecter
                                          <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>
                                      </a>
                                  </div>
                                  <div class="box-need-help">
                                      <a class="alert alert-warning btn-signin" href="#"> 
                                          <svg width="12" height="14" viewbox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z" fill=""></path>
                                          </svg> Veuillez vous connecter pour avoir accès au bouton de contact.
                                      </a>
                                  </div>
                          </div>
                        </div>
                    </div>
            @endif
        </div>
      </div>
    </section>
    
    <section class="section-box box-media background-body"> 
      <div class="container-media wow fadeInUp"> 
        <img src="{{asset('assets/imgs/page/homepage5/media.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media2.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media3.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media4.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media5.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media6.png')}}" alt="Travila">
        <img src="{{asset('assets/imgs/page/homepage5/media7.png')}}" alt="Travila">
      </div>
    </section>
  </main>
@endsection