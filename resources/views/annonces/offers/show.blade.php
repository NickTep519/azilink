@extends('base')

@section('meta')

    <meta property="og:title" content="{{ $offer->title }}" />
    <meta property="og:description" content="{{ $offer->description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $offer->image_city_destination }}" />
    <meta property="og:type" content="{{ 'website' }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />



    <meta name="twitter:card" content="{{ $offer->image_city_destination }}">
    <meta name="twitter:title" content="{{ $offer->title }}">
    <meta name="twitter:description" content="{{ $offer->description }}">
    <meta name="twitter:image" content="{{ $offer->image_city_destination }}">
    <meta name="twitter:url" content="{{ route('home') }}">
    <meta name="twitter:site" content="{{ config('app.name') }}">


@endsection

@section('style')
    <style>
        @media (min-width: 1200px) {
            .container {
                max-width: 1440px !immportant;
            }
        }
    </style>

@endsection


@section('title', config('app.name') . ' | offers | ' . $offer->title)

@section('content')
    <main class="main">

        <section class="box-section box-breadcrumb background-body">
            <div class="container text-center">
                <ul class="breadcrumbs">
                    <li> <a href="{{ route('home') }}">Accueille</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <a href="{{ route('offers.index') }}">Offres</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb"> {{ $offer->title }} </span></li>
                </ul>
            </div>
        </section>

        <section class="box-section block-banner-tour-detail-4 background-card">
            <div class="box-banner-tour-detail-4">
                <div class="box-banner-tour-detail-4-inner">
                    <div class="box-swiper">

                        <div class="swiper-container swiper-group-1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="box-banner-tour-4">
                                        <img src="{{ $offer->image_city_destination }}" alt="Travila">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>

                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"> </path>
                            </svg>
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="box-header-on-top">
                <div class="container">
                    <div class="tour-header tour-header-on-top">
                        <div class="box-author-small">
                            <img src="{{ asset('storage/'.$offer->creatorUser->image) }}" alt="Travilla" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                            <p class="text-sm-bold" style="color: white" > 
                                <a href="{{ route('users.details', $offer->creatorUser->slug ) }}" style="color: white; text-decoration: none;" class="text-sm-bold">
                                    {{ $offer->creatorUser->pseudo }} {{  $offer->creatorUser->profileBadge() }}
                                </a>
                            </p>
                        </div>
                        <div class="tour-rate">
                            <div class="rate-element"><span class="rating"> {{ $offer->creatorUser->moyenne() }} <span
                                        class="text-sm-medium neutral-500">( {{ $offer->views }} vues)</span></span></div>
                        </div>
                        <div class="tour-title-main w-lg-75">
                            <h4 class="color-white"> {{$offer->title}} </h4>
                        </div>
                        <div class="tour-metas">
                            
                           {{-- <div class="tour-meta-left">
                                <p class="text-md-medium color-white mr-20 tour-location">
                                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                            fill=""></path>
                                    </svg>{{ $offer->starts_city }}
                                </p>
                                <p class="text-md-medium color-white mr-20 tour-location">
                                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                            fill=""></path>
                                    </svg> {{ $offer->ends_city }}
                                </p>
                            </div> --}}

                            <div class="tour-meta-right share-container"> <a class="btn btn-share">
                                    <svg width="16" height="18" viewbox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 11.5332C12.012 11.5332 11.1413 12.0193 10.5944 12.7584L5.86633 10.3374C5.94483 10.0698 6 9.79249 6 9.49989C6 9.10302 5.91863 8.72572 5.77807 8.37869L10.7262 5.40109C11.2769 6.04735 12.0863 6.46655 13 6.46655C14.6543 6.46655 16 5.12085 16 3.46655C16 1.81225 14.6543 0.466553 13 0.466553C11.3457 0.466553 10 1.81225 10 3.46655C10 3.84779 10.0785 4.20942 10.2087 4.54515L5.24583 7.53149C4.69563 6.90442 3.8979 6.49989 3 6.49989C1.3457 6.49989 0 7.84559 0 9.49989C0 11.1542 1.3457 12.4999 3 12.4999C4.00433 12.4999 4.8897 11.9996 5.4345 11.2397L10.147 13.6529C10.0602 13.9331 10 14.2249 10 14.5332C10 16.1875 11.3457 17.5332 13 17.5332C14.6543 17.5332 16 16.1875 16 14.5332C16 12.8789 14.6543 11.5332 13 11.5332Z"
                                            fill=""></path>
                                    </svg> <button style="all: unset" class="share-button">Partager</button> </a>
                                <div class="share-options">
                                    <!-- Liens de partage -->
                                    <a href="https://twitter.com/intent/tweet?text={{ $offer->title }}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!&url={{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}"
                                        target="_blank">Partager sur Twitter</a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}"
                                        target="_blank">Partager sur Facebook</a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}&title=Super%20contenu&summary=Ceci%20est%20un%20résumé"
                                        target="_blank">Partager sur LinkedIn</a>
                                    <a href="https://wa.me/?text={{ $offer->title }}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!%20%20%20{{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}"
                                        target="_blank">Partager sur WhatsApp</a>
                                    <a href="https://t.me/share/url?url={{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}&text={{ $offer->title }}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!"
                                        target="_blank">Partager sur Telegram</a>
                                    <a href="mailto:?subject={{ $offer->title }}.%20Cliquez%20sur%20le%20lien%20pour%20plus%20de%20details%20!{{ urlencode(route('offers.show', [$offer->slug(), $offer])) }}"
                                        target="_blank">Partager par Email</a>
                                </div>
                                <a class="btn btn-wishlish" href="#">
                                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.2222 2.3638C4.34203 0.243977 7.65342 0.0419426 10.0004 1.7577C12.3473 0.0419426 15.6587 0.243977 17.7786 2.3638C20.1217 4.70695 20.1217 8.50594 17.7786 10.8491L12.1217 16.5059C10.9501 17.6775 9.05063 17.6775 7.87906 16.5059L2.2222 10.8491C-0.120943 8.50594 -0.120943 4.70695 2.2222 2.3638Z"
                                            fill=""></path>
                                    </svg>J'aime</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="box-section box-content-tour-detail background-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box-info-tour">
                            
                            <div class="tour-info-group">
                                <div class="icon-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600">Ville de départ </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->starts_city }} </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                    </svg>
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Date de départ </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->starts_at->translatedFormat('d M Y') }} </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item background-7">
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>                                                                         
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Ville d'arrivée </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->ends_city  }} </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item background-3">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                    </svg>                                                                        
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Date d'arrivée </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->ends_at->translatedFormat('d M Y') }} </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box-info-tour">
                            
                            <div class="tour-info-group">
                                <div class="icon-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke="black" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                                    </svg>                                      
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600">kilogramme </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->kg_restant }} Kg </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                                            
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Prix / Kg </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->price }} € </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item background-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                    </svg>                                                                            
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Compagnie </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->company }} </p>
                                </div>
                            </div>
                            <div class="tour-info-group">
                                <div class="icon-item background-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                    </svg>                                                                          
                                </div>
                                <div class="info-item">
                                    <p class="text-sm-medium neutral-600"> Transport </p>
                                    <p class="text-lg-bold neutral-1000"> {{ $offer->m_transport }} </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="box-collapse-expand">

                            <div class="group-collapse-expand">
                                <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOverview" aria-expanded="false"
                                    aria-controls="collapseOverview">
                                    <h6> Description </h6>
                                    <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <div class="collapse show" id="collapseOverview">
                                    <div class="card card-body">
                                        <p> {{ $offer->description }} </p>
                                    </div>
                                </div>
                            </div>

                          
                        </div>
                    </div>

                    @if (auth()->check())
                        @if (auth()->user()->id === $offer->creatorUser->id)
                        @else
                            <div class="col-lg-4">
                                <div class="booking-form">
                                    <div class="head-booking-form">
                                        <p class="text-xl-bold neutral-1000">Formulaire de contact</p>
                                    </div>
                                    <div class="content-booking-form">
                                        <form action="{{ route('conversations.store') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="user_ids[]" value="{{ $offer->creatorUser->id }}">
                                            <input type="hidden" name="user_ids[]" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="annonce_id" value="{{ $offer->id }}">

                                            <div class="box-button-book">
                                                <a class="btn btn-book"> <button type="submit"
                                                        style="all:unset ; color: white">Contacter</button>
                                                    <svg width="16" height="16" viewbox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke=""
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </div>

                                        </form>

                                        <div class="box-need-help">
                                            <a>
                                                <svg width="12" height="14" viewbox="0 0 12 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z"
                                                        fill=""></path>
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
                                        <a class="btn btn-book btn-signin" href="{{ route('login') }}">Se Connecter
                                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="box-need-help">
                                        <a class="alert alert-warning btn-signin" href="#">
                                            <svg width="12" height="14" viewbox="0 0 12 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z"
                                                    fill=""></path>
                                            </svg> Veuillez vous connecter pour avoir accès au bouton de contact.
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            </div>
            </div>
        </section>




        <section class="section-box box-media background-body">
            <div class="container-media wow fadeInUp">
                <img src="{{ asset('assets/imgs/page/homepage5/media.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media2.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media3.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media4.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media5.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media6.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media7.png') }}" alt="Travila">
            </div>
        </section>
    </main>
@endsection
