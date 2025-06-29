@extends('base') 

@section('title', config('app.name') )

@section('content')
    

<main class="main">
    <section class="box-section block-banner-home10"> 
      <div class="container"> 
        <p class="text-with-img mb-30"> <img src="{{asset('assets/imgs/page/homepage10/earth.png')}}" alt="{{config('app.name')}}">Le meilleur système d'echange international</p>
        <h2 class="color-white mb-20">Gagnez en monétisant vos espaces bagages libres &amp; offrez une solution sécurisée pour transporter vos colis.</h2>
        <ul class="list-ticks-green"> 
          <li>Optimisation de l'espace inutilisé</li>
          <li>Réduction des coûts d'envoi de colis</li>
          <li>Rapidité du service</li>
        </ul>
        <div class="box-buttons-banner mt-65">
            @auth
             <a class="btn btn-brand-secondary" href="{{route('offers.index')}}"> Commencer
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 19L19 12L12 5M19 12L5 12" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a>
            @endauth
            @guest
             <a class="btn btn-brand-secondary" href="{{route('register')}}"> Commencer
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 19L19 12L12 5M19 12L5 12" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a>
            @endguest
            
            <a class="btn btn-how-work color-white" href="{{route('offers.index')}}"><img src="assets/imgs/page/homepage10/play.png" alt="AziLink">Voir les Trajets
            </a>
            </div>
        </div>
    </section>

    <!-- Rérentes offres -->

    <section class="section-box box-top-flights background-body">
        <div class="container">
            <div class="row align-items-end">
              <div class="col-md-9 mb-30 wow fadeInUp">
                <div class="box-title-bestsell">
                  <h2 class="title-svg neutral-1000 mb-15"> 
                    <svg width="27" height="39" viewbox="0 0 27 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9721 38.9991C8.7171 38.9991 4.81518 36.9218 2.26676 33.3001C-2.75855 26.158 2.51539 14.3625 2.74208 13.8636C2.9258 13.4594 3.52612 13.5316 3.60747 13.9699C3.76126 14.8015 4.29256 16.7779 5.15293 17.7806C5.10151 14.7925 5.50964 5.77322 11.837 0.116751C12.0555 -0.0784021 12.5434 -0.0722321 12.6046 0.489233C12.7694 2.00841 13.5182 7.07279 16.2396 8.45395C16.5072 8.59014 19.041 11.7859 19.4825 14.7516C19.9265 14.1746 20.5412 12.9299 20.8221 10.3182C20.8639 9.92925 21.3458 9.7702 21.6118 10.0561C21.708 10.1596 31.1506 20.547 24.5663 32.0572C22.0801 36.4045 17.7458 38.9991 12.9718 38.9991H12.9721Z" fill="#FFA725"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6808 35.7816C16.2031 35.7816 18.5162 34.5504 20.0269 32.4035C23.0058 28.1695 19.8795 21.1774 19.7451 20.8817C19.6361 20.642 19.2803 20.6849 19.2321 20.9448C19.1409 21.4377 18.826 22.6093 18.316 23.2036C18.3464 21.4322 18.1046 16.0858 14.3538 12.7326C14.2242 12.6169 13.9351 12.6206 13.8988 12.9533C13.801 13.8539 13.3572 16.8559 11.7439 17.6747C11.5853 17.7554 10.0832 19.65 9.82136 21.408C9.5581 21.0659 9.19362 20.328 9.02726 18.7798C9.00235 18.5492 8.71671 18.4548 8.55926 18.6244C8.50213 18.6859 2.90484 24.8435 6.80791 31.6665C8.28184 34.2435 10.8511 35.7816 13.6812 35.7816H13.6808Z" fill="#FF871E"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.85986 33.1274C9.45699 33.1274 9.24767 32.6357 9.53674 32.3471L16.8513 25.0323C17.2775 24.6061 17.9233 25.2537 17.498 25.6787L10.1832 32.9935C10.0939 33.0829 9.97709 33.1274 9.85986 33.1274Z" fill="white"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1965 28.6139C8.66976 28.6139 8.66816 24.77 11.196 24.77C13.7241 24.77 13.7229 28.6139 11.1965 28.6139ZM11.1965 25.6834C10.3041 25.6834 9.84959 26.7698 10.4835 27.4041C11.4056 28.3264 12.8596 26.93 11.9092 25.9789C11.7189 25.7881 11.4659 25.6834 11.1965 25.6834Z" fill="white"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M15.839 33.2555C13.3121 33.2555 13.3109 29.4119 15.839 29.4119C18.3668 29.4119 18.3666 33.2555 15.839 33.2555ZM15.839 30.3252C14.9464 30.3252 14.4923 31.4116 15.1262 32.046C16.0481 32.9685 17.5021 31.5713 16.552 30.6207C16.3616 30.4299 16.1082 30.3252 15.839 30.3252Z" fill="white"></path>
                    </svg> Les Offres
                  </h2>
                  <p class="text-xl-medium neutral-500">Bénéficiez d'une large gamme de trajets pour envoyer vos colis partout dans le monde, en toute sécurité.</p>
                </div>
              </div>
            </div>
            <div class="box-list-tickets wow fadeIn">
                <div class="row">
                  @forelse ($offers as $offer)
                  <div class="col-lg-6"> 
                      <div class="card-flight background-card"> 
                        <div class="card-image"> <a class="wish" href="#">
                            <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a><img src="{{$offer->image_city_destination}}" alt="AziLink"></div>
                        <div class="card-info"> 
                          <div class="card-date"><span class="date-1"> {{$offer->starts_at->translatedFormat('d M Y')}} </span><span class="line"></span><span class="date-1">{{$offer->ends_at->translatedFormat('d M Y')}}</span></div>
                          <div class="card-route"> 
                            <h8 class="route-name neutral-1000"> {{$offer->starts_city}} </h8><span class="icon-route"></span>
                            <h8 class="route-name neutral-1000"> {{$offer->ends_city}} </h8>
                          </div>
                          <div class="card-price"> 
                            <div class="card-price-1"> 
                              <p class="text-md-medium">Poid demandé</p>
                              <h6 class="neutral-1000"> {{$offer->kg}} Kg </h6>
                            </div>
                            <div class="card-price-1"> 
                              <p class="text-md-medium"> Prix/Kg </p>
                              <h6 class="neutral-1000">{{$offer->price}} €</h6>
                            </div>
                          </div>
                          <div class="card-meta"> 
                            <div class="box-author-small">
                              <img src="{{ asset('storage/'.$offer->creatorUser->image) }}" alt="Travilla" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                              <p class="text-sm-bold neutral-1000"> 
                                <a href="{{ route('users.details', $offer->creatorUser->slug ) }}" style="color: black; text-decoration: none;" class="text-sm-bold">
                                    {{ $offer->creatorUser->pseudo }} {{  $offer->creatorUser->profileBadge() }}
                                </a>
                              </p>
                            </div>
                            <div class="card-seats"> 
                              <div class="card-button"> <a class="btn btn-gray" href="{{route('offers.show', [$offer->slug(), $offer])}}">Voir..</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>      
                  @empty
                      
                  @endforelse
                </div>
            </div>

            <div class="row align-items-end">
              <div class="col-md-9 mb-30 wow fadeInUp">

              </div>
              <div class="col-md-3 position-relative mb-30 wow fadeInUp">
                <div class="d-flex justify-content-center justify-content-md-end"><a class="btn btn-black-lg" href="{{route('offers.index')}}">Voir Plus 
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></a></div>
              </div>
            </div>
        </div>
    </section>

    <section class="section-box box-best-sell background-body">
      <div class="container"> 
        <div class="row align-items-end">
          <div class="col-md-9 mb-30 wow fadeInUp">
            <div class="box-title-bestsell">
              <h2 class="title-svg neutral-1000 mb-15"> 
                <svg width="27" height="39" viewbox="0 0 27 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9721 38.9991C8.7171 38.9991 4.81518 36.9218 2.26676 33.3001C-2.75855 26.158 2.51539 14.3625 2.74208 13.8636C2.9258 13.4594 3.52612 13.5316 3.60747 13.9699C3.76126 14.8015 4.29256 16.7779 5.15293 17.7806C5.10151 14.7925 5.50964 5.77322 11.837 0.116751C12.0555 -0.0784021 12.5434 -0.0722321 12.6046 0.489233C12.7694 2.00841 13.5182 7.07279 16.2396 8.45395C16.5072 8.59014 19.041 11.7859 19.4825 14.7516C19.9265 14.1746 20.5412 12.9299 20.8221 10.3182C20.8639 9.92925 21.3458 9.7702 21.6118 10.0561C21.708 10.1596 31.1506 20.547 24.5663 32.0572C22.0801 36.4045 17.7458 38.9991 12.9718 38.9991H12.9721Z" fill="#FFA725"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6808 35.7816C16.2031 35.7816 18.5162 34.5504 20.0269 32.4035C23.0058 28.1695 19.8795 21.1774 19.7451 20.8817C19.6361 20.642 19.2803 20.6849 19.2321 20.9448C19.1409 21.4377 18.826 22.6093 18.316 23.2036C18.3464 21.4322 18.1046 16.0858 14.3538 12.7326C14.2242 12.6169 13.9351 12.6206 13.8988 12.9533C13.801 13.8539 13.3572 16.8559 11.7439 17.6747C11.5853 17.7554 10.0832 19.65 9.82136 21.408C9.5581 21.0659 9.19362 20.328 9.02726 18.7798C9.00235 18.5492 8.71671 18.4548 8.55926 18.6244C8.50213 18.6859 2.90484 24.8435 6.80791 31.6665C8.28184 34.2435 10.8511 35.7816 13.6812 35.7816H13.6808Z" fill="#FF871E"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.85986 33.1274C9.45699 33.1274 9.24767 32.6357 9.53674 32.3471L16.8513 25.0323C17.2775 24.6061 17.9233 25.2537 17.498 25.6787L10.1832 32.9935C10.0939 33.0829 9.97709 33.1274 9.85986 33.1274Z" fill="white"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1965 28.6139C8.66976 28.6139 8.66816 24.77 11.196 24.77C13.7241 24.77 13.7229 28.6139 11.1965 28.6139ZM11.1965 25.6834C10.3041 25.6834 9.84959 26.7698 10.4835 27.4041C11.4056 28.3264 12.8596 26.93 11.9092 25.9789C11.7189 25.7881 11.4659 25.6834 11.1965 25.6834Z" fill="white"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M15.839 33.2555C13.3121 33.2555 13.3109 29.4119 15.839 29.4119C18.3668 29.4119 18.3666 33.2555 15.839 33.2555ZM15.839 30.3252C14.9464 30.3252 14.4923 31.4116 15.1262 32.046C16.0481 32.9685 17.5021 31.5713 16.552 30.6207C16.3616 30.4299 16.1082 30.3252 15.839 30.3252Z" fill="white"></path>
                </svg>Les Demandes
              </h2>
              <p class="text-xl-medium neutral-500">Découvrez une large gamme de demandes de trajets pour monétiser vos espaces bagages libres.</p>
            </div>
          </div>

        </div>
        <div class="row mt-35"> 
          <div class="col-lg-12">
            <div class="box-grid-tours wow fadeIn">
              <div class="row">
                <div class="box-list-flights box-list-flights-2"> 

                  @forelse ($requests as $request)

                  <div class="item-flight background-card border-1">
                    <div class="flight-route"> 
                      <div class="flight-name"><img src="{{ asset('assets/imgs/page/tickets/logo' . rand(2, 6) . '.png') }}" alt="AziLink">
                        <div class="flight-info"> 
                          <p class="text-md-bold neutral-1000">{{$request->starts_city}}</p>
                          <p class="text-sm-medium time-flight"> <span class="neutral-1000"></span>{{$request->starts_at->translatedFormat('d M Y')}}</p>
                        </div>
                      </div>
                      <div class="flight-route-icon"></div>
                      <div class="flight-name"> 
                        <div class="flight-info"> 
                          <p class="text-md-bold neutral-1000">{{$request->ends_city}}</p>
                          <p class="text-sm-medium time-flight"><span class="neutral-1000"></span>{{$request->ends_at->translatedFormat('d M Y')}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="flight-price">
                      <div class="flight-price-1 border-1"> 
                        <p class="text-sm-medium neutral-500">Poids offers</p>
                        <p class="text-lg-bold neutral-1000">{{$request->kg}} Kg</p>
                      </div>
                      <div class="flight-price-2 border-1"> 
                        <p class="text-sm-medium neutral-500">Prix/Kg</p>
                        <p class="text-lg-bold neutral-1000">{{$request->price == NULL ? 'XX' : $request->price }} €</p>
                      </div>
                    </div>
                    <div class="box-author-small">
                      <img src="{{ asset('storage/'.$request->creatorUser->image) }}" alt="Travilla" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                      <p class="text-sm-bold neutral-1000"> 
                        <a href="{{ route('users.details', $request->creatorUser->slug ) }}" style="color: black; text-decoration: none;" class="text-sm-bold">
                            {{ $request->creatorUser->pseudo }} {{  $request->creatorUser->profileBadge() }}
                        </a>
                      </p>
                    </div>
                    <div class="flight-button"> 
                      <a class="btn btn-gray" href="{{route('requests.show', [$request->slug(), $request])}}">Voir..</a>
                    </div>
                  </div>
                  
                  @empty
                      
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row align-items-end">
          <div class="col-md-9 mb-30 wow fadeInUp">

          </div>
          <div class="col-md-3 position-relative mb-30 wow fadeInUp">
            <div class="d-flex justify-content-center justify-content-md-end"><a class="btn btn-black-lg" href="{{route('requests.index')}}">Voir Plus 
                <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></a></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-box box-popular-destinations background-body mt-20 pt-60">
      <div class="container"> 
        <div class="row align-items-end">
          <div class="col-lg-6 mb-30 text-center text-lg-start"> 
            <h2 class="neutral-1000">
              <svg width="27" height="39" viewbox="0 0 27 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9721 38.9991C8.7171 38.9991 4.81518 36.9218 2.26676 33.3001C-2.75855 26.158 2.51539 14.3625 2.74208 13.8636C2.9258 13.4594 3.52612 13.5316 3.60747 13.9699C3.76126 14.8015 4.29256 16.7779 5.15293 17.7806C5.10151 14.7925 5.50964 5.77322 11.837 0.116751C12.0555 -0.0784021 12.5434 -0.0722321 12.6046 0.489233C12.7694 2.00841 13.5182 7.07279 16.2396 8.45395C16.5072 8.59014 19.041 11.7859 19.4825 14.7516C19.9265 14.1746 20.5412 12.9299 20.8221 10.3182C20.8639 9.92925 21.3458 9.7702 21.6118 10.0561C21.708 10.1596 31.1506 20.547 24.5663 32.0572C22.0801 36.4045 17.7458 38.9991 12.9718 38.9991H12.9721Z" fill="#FFA725"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6808 35.7816C16.2031 35.7816 18.5162 34.5504 20.0269 32.4035C23.0058 28.1695 19.8795 21.1774 19.7451 20.8817C19.6361 20.642 19.2803 20.6849 19.2321 20.9448C19.1409 21.4377 18.826 22.6093 18.316 23.2036C18.3464 21.4322 18.1046 16.0858 14.3538 12.7326C14.2242 12.6169 13.9351 12.6206 13.8988 12.9533C13.801 13.8539 13.3572 16.8559 11.7439 17.6747C11.5853 17.7554 10.0832 19.65 9.82136 21.408C9.5581 21.0659 9.19362 20.328 9.02726 18.7798C9.00235 18.5492 8.71671 18.4548 8.55926 18.6244C8.50213 18.6859 2.90484 24.8435 6.80791 31.6665C8.28184 34.2435 10.8511 35.7816 13.6812 35.7816H13.6808Z" fill="#FF871E"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.85986 33.1274C9.45699 33.1274 9.24767 32.6357 9.53674 32.3471L16.8513 25.0323C17.2775 24.6061 17.9233 25.2537 17.498 25.6787L10.1832 32.9935C10.0939 33.0829 9.97709 33.1274 9.85986 33.1274Z" fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1965 28.6139C8.66976 28.6139 8.66816 24.77 11.196 24.77C13.7241 24.77 13.7229 28.6139 11.1965 28.6139ZM11.1965 25.6834C10.3041 25.6834 9.84959 26.7698 10.4835 27.4041C11.4056 28.3264 12.8596 26.93 11.9092 25.9789C11.7189 25.7881 11.4659 25.6834 11.1965 25.6834Z" fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.839 33.2555C13.3121 33.2555 13.3109 29.4119 15.839 29.4119C18.3668 29.4119 18.3666 33.2555 15.839 33.2555ZM15.839 30.3252C14.9464 30.3252 14.4923 31.4116 15.1262 32.046C16.0481 32.9685 17.5021 31.5713 16.552 30.6207C16.3616 30.4299 16.1082 30.3252 15.839 30.3252Z" fill="white"></path>
              </svg>Destinations populaires
            </h2>
            <p class="text-xl-medium neutral-500">Destinations préférées basées sur les avis des clients.</p>
          </div>
        </div>
        <div class="box-list-populars"> 
          <div class="row"> 
          
           @foreach ($popularCitiesAnnonces as $annonce)
           
           <div class="col-lg-3 col-sm-6"> 
              <div class="card-popular background-card hover-up"> 
                <div class="card-image"> <a href="#"><img width="110" height="110" src="{{$annonce->image_city_destination}}" alt="AziLink"></a></div>
                <div class="card-info"> <a class="card-title" href="{{route('offers.index', ['ends_city' => $annonce->city_destination] ) }}">{{$annonce->ends_city}}</a>
                  <div class="card-meta"> 
                    <div class="meta-links"> <a href="#"> plus de {{$annonce->ads_count}} annonces</a><a href="#"></a></div>
                    <div class="card-button"> <a href="#"> 
                        <svg width="10" height="10" viewbox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a></div>
                  </div>
                </div>
              </div>
            </div>
                
            @endforeach
            
            <div class="col-lg-3 col-sm-6"> 
              <div class="card-popular background-card hover-up"> 
                <div class="card-image"> <a href="#"><img src="assets/imgs/page/homepage1/popular2.png" alt="AziLink"></a></div>
                <div class="card-info"> <a class="card-title" href="#">Amsterdam</a>
                  <div class="card-meta"> 
                    <div class="meta-links"> <a href="#">356 Tours, </a><a href="#">248 Activités</a></div>
                    <div class="card-button"> <a href="#"> 
                        <svg width="10" height="10" viewbox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-box box-how-it-work-3 background-body">
      <div class="container"> 
        <div class="box-how-it-work-inner background-3">
          <h3 class="neutral-1000 wow fadeInUp"> Avantages </h3>
          <p class="text-xl-medium neutral-500 mb-30 wow fadeInUp">Juste 4 avantages d'{{config('app.name')}}</p>
          <div class="row">
            <div class="col-lg-10">
              <ul class="list-steps list-steps-2-col wow fadeInUp">
                <li> 
                  <div class="step-no">   <span>1</span></div>
                  <div class="step-info">
                    <p class="text-xl-bold neutral-1000">Monetisation des trajets</p>
                    <p class="text-sm-medium neutral-500"> Vous pouvez rentabiliser vos voyages en transportant des colis pour
                        d'autres personnes, augmentant ainsi vos revenus sans effort supplémentaire.</p>
                  </div>
                </li>
                <li> 
                  <div class="step-no">   <span>2</span></div>
                  <div class="step-info">
                    <p class="text-xl-bold neutral-1000">Optimisation de l'espace inutilisé
                    <p class="text-sm-medium neutral-500">
                        <p> Plutôt que de voyager avec des kilos non utilisés,
                        transporter des biens pour des expéditeurs et maximiser leur charge utile.</p>
                  </div>
                </li>
                <li> 
                  <div class="step-no">   <span>3</span></div>
                  <div class="step-info">
                    <p class="text-xl-bold neutral-1000"> Réduction des coûts d'envois </p>
                    <p class="text-sm-medium neutral-500"> Le recours à des voyageurs pour transporter des colis peut être beaucoup moins cher que les services 
                        de transport traditionnels, en particulier pour les envois internationaux</p>
                  </div>
                </li>
                <li> 
                  <div class="step-no">   <span>4</span></div>
                  <div class="step-info">
                    <p class="text-xl-bold neutral-1000">Rapidité des envois</p>
                    <p class="text-sm-medium neutral-500"> Si un voyageur se rend rapidement à une destination, l'expéditeur peut envoyer ses biens bien plus 
                        vite qu'avec les options d'envoi classiques.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  
</main>
    
@endsection