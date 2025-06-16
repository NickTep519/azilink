@extends('base')

@section('title', config('app.name').' | '.'demandes')

@section('content')

<main class="main">
    <section class="box-section block-banner-tickets"> 
      <div class="container"> 
        <div class="text-center"> 
          
          <h6 class="heading-6-medium">Explorer les demandes disponibles.</h6>
        </div>
        <div class="box-search-advance box-search-advance-3 background-card wow fadeInUp"> 

          <form>
              <div class="box-bottom-search background-card"> 
                    <div class="item-search item-search-2"> 
                        <label class="text-sm-bold neutral-500">Ville Depart</label>
                        <div>
                          <input name="starts_city" class="search-input cityInput" type="text" placeholder="" >
                          <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#fff; background-color: #303c44 ; border: 1px solid #303c44; max-width: 300px;"></ul>
                        </div>
                    </div>
                    <div class="item-search item-sea rch-3"> 
                        <label class="text-sm-bold neutral-500">Ville Arrivée</label>
                        <div>
                          <input name="ends_city" class="search-input cityInput" type="text" placeholder="">
                          <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#fff; background-color: #303c44 ; border: 1px solid #303c44; max-width: 300px;"></ul>
                        </div>
                    </div>
            
                    <div class="item-search item-search-2"> 
                      <label class="text-sm-bold neutral-500">Poids (Kg) </label>
                      <div class="box-calendar-date">
                          <input name="kg" class="search-input"  type="number" placeholder="" min="0" >
                          <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#fff; background-color: #303c44 ; border: 1px solid #303c44; max-width: 300px;"></ul>
                      </div>
                    </div>
                    
                    <div class="item-search item-sea rch-3"> 
                      <label  class="text-sm-bold neutral-500">Prix/kg</label>
                        <div id="slider-range"></div>
                        <div class="box-value-price"><span class="text-md-medium neutral-1000">$0</span><span class="text-md-medium neutral-1000">$1000</span></div>
                        <input class="value-money search-input" name="price" type="hidden">
                    </div>
       
                    <div class="item-search bd-none d-flex justify-content-end"> 
                      <button class="btn btn-black-lg"> 
                          <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>Recherche
                      </button>
                    </div>
              </div>

          </form>
        </div>
      </div>
    </section>

    <section class="box-section block-content-tourlist background-body">
      <div class="container"> 
        <div class="box-content-main">

          <div class="content-right">
            <div class="box-filters mb-25 pb-5 border-bottom border-1">
              <div class="row align-items-center">
                <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                  <div class="box-view-type"><a class="display-type display-grid active" href="tour-grid.html"> 
                      <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 8V2.75C20 2.3375 19.6625 2 19.25 2H14C13.5875 2 13.25 2.3375 13.25 2.75V8C13.25 8.4125 13.5875 8.75 14 8.75H19.25C19.6625 8.75 20 8.4125 20 8ZM19.25 0.5C20.495 0.5 21.5 1.505 21.5 2.75V8C21.5 9.245 20.495 10.25 19.25 10.25H14C12.755 10.25 11.75 9.245 11.75 8V2.75C11.75 1.505 12.755 0.5 14 0.5H19.25Z" fill=""></path>
                        <path d="M20 19.25V14C20 13.5875 19.6625 13.25 19.25 13.25H14C13.5875 13.25 13.25 13.5875 13.25 14V19.25C13.25 19.6625 13.5875 20 14 20H19.25C19.6625 20 20 19.6625 20 19.25ZM19.25 11.75C20.495 11.75 21.5 12.755 21.5 14V19.25C21.5 20.495 20.495 21.5 19.25 21.5H14C12.755 21.5 11.75 20.495 11.75 19.25V14C11.75 12.755 12.755 11.75 14 11.75H19.25Z" fill=""></path>
                        <path d="M8 8.75C8.4125 8.75 8.75 8.4125 8.75 8V2.75C8.75 2.3375 8.4125 2 8 2H2.75C2.3375 2 2 2.3375 2 2.75V8C2 8.4125 2.3375 8.75 2.75 8.75H8ZM8 0.5C9.245 0.5 10.25 1.505 10.25 2.75V8C10.25 9.245 9.245 10.25 8 10.25H2.75C1.505 10.25 0.5 9.245 0.5 8V2.75C0.5 1.505 1.505 0.5 2.75 0.5H8Z" fill=""></path>
                        <path d="M8 20C8.4125 20 8.75 19.6625 8.75 19.25V14C8.75 13.5875 8.4125 13.25 8 13.25H2.75C2.3375 13.25 2 13.5875 2 14V19.25C2 19.6625 2.3375 20 2.75 20H8ZM8 11.75C9.245 11.75 10.25 12.755 10.25 14V19.25C10.25 20.495 9.245 21.5 8 21.5H2.75C1.505 21.5 0.5 20.495 0.5 19.25V14C0.5 12.755 1.505 11.75 2.75 11.75H8Z" fill=""></path>
                      </svg></a><a class="display-type display-list" href="tour-list.html"> 
                      <svg width="21" height="21" viewbox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.788 0H1.09497C0.491194 0 0 0.486501 0 1.08456V4.74269C0 5.34075 0.491194 5.82729 1.09497 5.82729H4.788C5.39177 5.82729 5.88297 5.34075 5.88297 4.74269V1.08456C5.88297 0.486501 5.39177 0 4.788 0ZM4.80951 4.74273C4.80951 4.75328 4.79865 4.76404 4.788 4.76404H1.09497C1.08432 4.76404 1.07345 4.75328 1.07345 4.74273V1.08456C1.07345 1.07401 1.08432 1.06329 1.09497 1.06329H4.788C4.79865 1.06329 4.80951 1.07401 4.80951 1.08456V4.74273ZM7.53412 1.32686C7.53412 1.03321 7.77444 0.795211 8.07084 0.795211H20.4632C20.7596 0.795211 21 1.03321 21 1.32686C21 1.62046 20.7596 1.8585 20.4632 1.8585H8.07084C7.77444 1.8585 7.53412 1.62046 7.53412 1.32686ZM21 4.50043C21 4.79408 20.7597 5.03208 20.4633 5.03208H8.07084C7.77444 5.03208 7.53412 4.79408 7.53412 4.50043C7.53412 4.20683 7.77444 3.96879 8.07084 3.96879H20.4632C20.7597 3.96879 21 4.20683 21 4.50043ZM4.788 7.58633H1.09497C0.491194 7.58633 0 8.07283 0 8.67089V12.329C0 12.9271 0.491194 13.4136 1.09497 13.4136H4.788C5.39177 13.4136 5.88297 12.9271 5.88297 12.329V8.67089C5.88297 8.07288 5.39177 7.58633 4.788 7.58633ZM4.80951 12.3291C4.80951 12.3396 4.79865 12.3504 4.788 12.3504H1.09497C1.08432 12.3504 1.07345 12.3396 1.07345 12.3291V8.67094C1.07345 8.66039 1.08432 8.64967 1.09497 8.64967H4.788C4.79865 8.64967 4.80951 8.66039 4.80951 8.67094V12.3291ZM4.788 15.1727H1.09497C0.491194 15.1727 0 15.6592 0 16.2573V19.9154C0 20.5135 0.491194 21 1.09497 21H4.788C5.39177 21 5.88297 20.5135 5.88297 19.9154V16.2573C5.88297 15.6592 5.39177 15.1727 4.788 15.1727ZM4.80951 19.9154C4.80951 19.926 4.79865 19.9368 4.788 19.9368H1.09497C1.08432 19.9368 1.07345 19.926 1.07345 19.9154V16.2573C1.07345 16.2468 1.08432 16.236 1.09497 16.236H4.788C4.79865 16.236 4.80951 16.2468 4.80951 16.2573V19.9154ZM21 12.0868C21 12.3805 20.7597 12.6185 20.4633 12.6185H8.07084C7.77444 12.6185 7.53412 12.3805 7.53412 12.0868C7.53412 11.7932 7.77444 11.5552 8.07084 11.5552H20.4632C20.7597 11.5552 21 11.7932 21 12.0868ZM21 8.91328C21 9.20688 20.7597 9.44492 20.4633 9.44492H8.07084C7.77444 9.44492 7.53412 9.20688 7.53412 8.91328C7.53412 8.61963 7.77444 8.38163 8.07084 8.38163H20.4632C20.7597 8.38163 21 8.61963 21 8.91328ZM21 16.4996C21 16.7932 20.7597 17.0313 20.4633 17.0313H8.07084C7.77444 17.0313 7.53412 16.7932 7.53412 16.4996C7.53412 16.206 7.77444 15.968 8.07084 15.968H20.4632C20.7597 15.968 21 16.206 21 16.4996ZM21 19.6732C21 19.9668 20.7597 20.2048 20.4633 20.2048H8.07084C7.77444 20.2048 7.53412 19.9668 7.53412 19.6732C7.53412 19.3796 7.77444 19.1415 8.07084 19.1415H20.4632C20.7597 19.1415 21 19.3796 21 19.6732Z" fill=""></path>
                      </svg></a><span class="text-sm-bold neutral-500 number-found">Plus de {{$toutes_les_demandes}} demande(s) disponibles</span></div>
                </div>
              </div>
            </div>
            <div class="box-grid-tours wow fadeIn">
              <div class="row">
                <div class="box-list-flights box-list-flights-2"> 

                  @forelse ($requests as $request)

                  <div class="item-flight background-card border-1">
                    <div class="flight-route"> 
                      <div class="flight-name"><img src="{{ asset('assets/imgs/page/tickets/logo' . rand(2, 6) . '.png') }}" alt="Travila">
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
                        <p class="text-sm-medium neutral-500">Poids demandé</p>
                        <p class="text-lg-bold neutral-1000">{{$request->kg_restant}} Kg </p>
                      </div>
                      <div class="flight-price-2 border-1"> 
                        <p class="text-sm-medium neutral-500">Prix/Kg</p>
                        <p class="text-lg-bold neutral-1000"> {{$request->price == NULL ? 'XX' : $request->price}} €</p>
                      </div>
                    </div>
                    <div class="box-author-small">
                      <img src="{{ asset('storage/'.$request->creatorUser->image) }}" alt="Travilla" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                      <p class="text-sm-bold neutral-1000"> 
                        <a href="{{ route('users.details', $request->creatorUser->slug ) }}" style="color: black; text-decoration: none;" class="text-sm-bold">
                            {{ $request->creatorUser->pseudo }} {{ $request->creatorUser->profileBadge() }}
                        </a>
                      </p>
                    </div>
                    <div class="flight-button"> 
                      <a class="btn btn-gray" href="{{route('requests.show', [$request->slug(), $request])}}">Voir..</a>
                    </div>
                  </div>
                  
                  @empty
                  
                   <p> Aucune demande trouvée.  <a href="{{route('annonces.create',  array_merge(request()->all(), ['type' => 0]) )}}" >  Créez en une selon votre recherche.</a> </p>
                      
                  @endforelse

                </div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{$requests->previousPageUrl()}}" aria-label="Previous"><span aria-hidden="true"> 
                      <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></span></a></li>

                
                @for ($i = 1; $i <= $requests->lastPage(); $i++)

                  @if ($requests->currentPage() === $i)
                  <li class="page-item"><a class="page-link active">{{ $i }}</a></li>
                  @else
                  <li class="page-item"><a class="page-link" href="{{$requests->url($i)}}">{{ $i }}</a></li>
                  @endif

                @endfor

                <li class="page-item"><a class="page-link" href="{{$requests->nextPageUrl()}}" aria-label="Next"><span aria-hidden="true"> 
                      <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></span></a></li>
              </ul>
            </nav>
          </div>

        </div>
      </div>
    </section>

    <div class="pb-90 background-body"></div>
    <section class="section-box box-media background-body"> 
      <div class="container-media wow fadeInUp"> <img src="assets/imgs/page/homepage5/media.png" alt="Travila"><img src="assets/imgs/page/homepage5/media2.png" alt="Travila"><img src="assets/imgs/page/homepage5/media3.png" alt="Travila"><img src="assets/imgs/page/homepage5/media4.png" alt="Travila"><img src="assets/imgs/page/homepage5/media5.png" alt="Travila"><img src="assets/imgs/page/homepage5/media6.png" alt="Travila"><img src="assets/imgs/page/homepage5/media7.png" alt="Travila"></div>
    </section>
  </main>
    
@endsection