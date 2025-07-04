@extends('base')

@section('title', config('app.name'). ' | ' . $user->pseudo)

@section('content')

<section class="box-section box-breadcrumb background-body">
    <div class="container"> 
      <ul class="breadcrumbs"> 
        <li> <a href="{{ route('home') }}">Home</a><span class="arrow-right"> 
            <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span></li>
        <li> <a href="{{ route('home') }}">Users</a><span class="arrow-right"> 
            <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span></li>
        <li> <span class="text-breadcrumb">{{ $user->pseudo }} {{  $user->profileBadge() }} </span></li>
      </ul>
    </div>
  </section>

  <section class="section-box block-banner-book-tickets background-card">
    <div class="container">
      <div class="box-image-book">
        <!-- Bannière de couverture -->
        <img src="{{ asset('assets/imgs/page/tickets/banner-booking.png') }}" alt="Travila" class="banner-cover">
        
        <!-- Image de profil circulaire -->
        <a class="btnn-logo" href="#">
          <img src="{{ asset('storage/'.$user->image) }}" alt="Travila" class="circular-banner">
        </a>
      </div>
    </div>
  </section>
  

  <section class="section-box block-content-book-tickets background-card">
    <div class="container"> 
        <h4 class="neutral-1000 mb-20"> {{ $user->profileLevel() }} </h4>
        <p class="text-md-medium neutral-1000">
            {{ $user->bio }}
        </p>
      <div class="row mt-50">  
        <div class="col-lg-12"> 
          <div class="box-content-tickets-detail"> 
            <div class="box-timeline"> 
              <div class="item-timeline"> <span class="text-xl-bold text-ads-middle">  </span>

                @if ($user->lastAnnonce())

                <div class="item-line-timeline">

                    <div class="time-flight">
                      <p class="text-xl-bold neutral-1000">Dernier trajet : {{$user->lastAnnonce()->ends_city}}</p>
                      <p class="text-sm-medium neutral-500"> {{ $user->lastAnnonce()->title }} </p>
                    </div>
                    <div class="location-flight"> 
                      <p class="text-sm-medium neutral-500"> {{ $user->lastAnnonce()->created_at->translatedFormat('d M Y') }} </p>
                      <p class="neutral-1000"> Kilo Disponible : <span class="text-sm-bold " > {{ $user->lastAnnonce()->kg }} kg</span> </p>
                    </div> 
                  </div>
                    
                @endif

                <div class="item-info-flight mb-3" >
                  <div class="list-flight-facilities" >
                    <li class="wifi"> 
                      <svg width="15" height="11" viewbox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.69633 7.51943C9.90169 7.71223 9.90169 8.02518 9.69633 8.21934C9.49097 8.41214 9.15767 8.41214 8.95083 8.21934C8.05652 7.37833 6.59825 7.37833 5.70396 8.21934C5.49713 8.41214 5.1638 8.41214 4.95846 8.21934C4.7531 8.02518 4.7531 7.71223 4.95846 7.51943C6.26492 6.29284 8.38985 6.29284 9.69633 7.51943Z" fill=""></path>
                        <path d="M8.55792 9.74347C8.55792 10.3847 8.00587 10.9016 7.32583 10.9016C6.64579 10.9016 6.09521 10.3847 6.09521 9.74347C6.09521 9.10504 6.64579 8.58813 7.32583 8.58813C8.00587 8.58813 8.55792 9.10501 8.55792 9.74347Z" fill="black"></path>
                        <path d="M12.6769 4.72122C12.8823 4.91541 12.8823 5.22835 12.6769 5.4211C12.4715 5.61391 12.1382 5.61391 11.9314 5.4211C9.39284 3.03777 5.26207 3.03777 2.7235 5.4211C2.51666 5.61391 2.18333 5.61391 1.978 5.4211C1.77263 5.22832 1.77263 4.91541 1.978 4.72122C4.92724 1.9523 9.72764 1.9523 12.6769 4.72122Z" fill=""></path>
                        <path d="M14.1664 4.02125C13.961 4.21544 13.6277 4.21544 13.4223 4.02125C10.0609 0.866752 4.59387 0.866752 1.2324 4.02125C1.02704 4.21544 0.693742 4.21544 0.48838 4.02125C0.281543 3.82847 0.281543 3.51553 0.48838 3.32272C4.25904 -0.21874 10.3957 -0.21874 14.1663 3.32272C14.3732 3.51553 14.3732 3.82847 14.1664 4.02125Z" fill=""></path>
                        <path d="M11.186 6.12102C11.3929 6.31382 11.3929 6.62676 11.186 6.81954C10.9807 7.01376 10.6474 7.01376 10.442 6.81954C8.72333 5.20737 5.9318 5.20737 4.21312 6.81954C4.00776 7.01376 3.67446 7.01376 3.46909 6.81954C3.26226 6.62676 3.26226 6.31385 3.46909 6.12102C5.59847 4.12047 9.05665 4.12047 11.186 6.12102Z" fill=""></path>
                      </svg> Problème : {{ 0 }} signalé
                    </li>
                    <li class="duty"> 
                      <svg width="14" height="12" viewbox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.18208 0.18239C9.27332 0.158914 9.36936 0.161706 9.45912 0.190446L12.6858 1.22377L12.6984 1.22802C12.9313 1.30953 13.1292 1.46107 13.2684 1.65829C13.3929 1.83464 13.4874 2.05792 13.4994 2.30952C13.4998 2.31744 13.5 2.32536 13.5 2.33328V10.3999C13.5085 10.5815 13.4736 10.7596 13.4062 10.9169C13.4041 10.9218 13.4019 10.9266 13.3997 10.9314C13.3175 11.1075 13.2013 11.2442 13.0734 11.3508C13.0684 11.3549 13.0633 11.359 13.0582 11.363C12.901 11.4838 12.7184 11.5575 12.5327 11.5822L12.5286 11.5828C12.3577 11.6042 12.1923 11.5861 12.0416 11.5422C12.0254 11.5387 12.0094 11.5344 11.9936 11.5293L9.31116 10.6669L4.83784 11.8175C4.74688 11.8409 4.65116 11.8382 4.56164 11.8098L1.31498 10.7764C1.31045 10.775 1.30594 10.7735 1.30145 10.7719C1.05823 10.6868 0.876122 10.5314 0.742782 10.357C0.738918 10.352 0.73515 10.3468 0.731478 10.3416C0.597474 10.1518 0.51845 9.92696 0.507186 9.6904C0.50681 9.68248 0.506622 9.67456 0.506622 9.66664V1.59334C0.497962 1.40853 0.534322 1.22486 0.613506 1.05518C0.69659 0.877146 0.816518 0.735382 0.961774 0.623646C1.11632 0.504762 1.30449 0.425026 1.5129 0.408706C1.691 0.388802 1.87097 0.410782 2.04048 0.475182L4.70868 1.33305L9.18208 0.18239ZM9.29148 1.18679L4.81784 2.33752C4.72636 2.36104 4.63012 2.3582 4.54024 2.32928L1.72024 1.42264C1.70922 1.41909 1.69833 1.41517 1.68758 1.41087C1.66719 1.40271 1.64585 1.39977 1.62198 1.40275C1.61174 1.40403 1.60146 1.405 1.59115 1.40564C1.59115 1.40564 1.58974 1.40573 1.58742 1.40663C1.58489 1.40762 1.57941 1.41017 1.57149 1.41627C1.54341 1.43787 1.52994 1.4561 1.51969 1.47806C1.50809 1.50293 1.50424 1.52624 1.50565 1.54877C1.50629 1.55915 1.50662 1.56955 1.50662 1.57995V9.6514C1.50982 9.689 1.52227 9.7252 1.54357 9.75776C1.57819 9.80088 1.60594 9.81808 1.62755 9.82648L4.72796 10.8132L9.20204 9.6624C9.29352 9.63888 9.38976 9.64172 9.47964 9.67064L12.2627 10.5654C12.2791 10.5691 12.2954 10.5736 12.3114 10.579C12.3474 10.591 12.3781 10.5934 12.4024 10.5908C12.4144 10.5888 12.4285 10.5839 12.4421 10.5748C12.4656 10.5539 12.4799 10.5349 12.4899 10.5158C12.4984 10.4932 12.5024 10.4676 12.5009 10.4445C12.5003 10.4341 12.5 10.4237 12.5 10.4133V2.34972C12.497 2.32144 12.484 2.28112 12.4514 2.23496C12.4315 2.20676 12.4043 2.18556 12.3723 2.17344L9.29148 1.18679Z" fill=""></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.70654 1.34656C4.98266 1.34656 5.20654 1.57041 5.20654 1.84656V11.2799C5.20654 11.5561 4.98266 11.7799 4.70654 11.7799C4.43038 11.7799 4.20654 11.5561 4.20654 11.2799V1.84656C4.20654 1.57041 4.43038 1.34656 4.70654 1.34656Z" fill=""></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.32666 0.219971C9.60282 0.219971 9.82666 0.443827 9.82666 0.719971V10.1533C9.82666 10.4295 9.60282 10.6533 9.32666 10.6533C9.05054 10.6533 8.82666 10.4295 8.82666 10.1533V0.719971C8.82666 0.443827 9.05054 0.219971 9.32666 0.219971Z" fill=""></path>
                      </svg> Moyenne de note : 
                      {{-- {{ $user->moyenne() }} --}}
                      <div class="rate-review ml-2"> 
                        @for ($i = 0; $i < $user->moyenne(); $i++)
                            <img src="{{ asset('assets/imgs/page/tour-detail/star-big.svg') }}" alt="Travila">                                
                        @endfor
                        {{-- <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                        <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                        <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                        <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila"> --}}
                      </div>       
                    </li>
                  </div>

                </div>

                @if ($user->accord)
                <div class="item-info-flight"> 
                  <div class="logo-flight"></div>
           
                  <div class="list-flight-facilities"> 
                    <li class="baggage">
                      <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.122 7.23384H12.3453V5.80934C12.3453 5.55009 12.135 5.33991 11.8757 5.33991H9.33781C9.1025 4.62166 8.42469 4.10641 7.63672 4.10641H6.82216V0.469438C6.82216 0.210188 6.61194 0 6.35262 0H3.07384C2.81453 0 2.60428 0.210188 2.60428 0.469438V4.10644H1.78972C0.802875 4.10644 0 4.90906 0 5.89566V14.2107C0 15.1973 0.802875 16 1.78972 16H14.122C15.1575 16 16 15.1578 16 14.1225V9.11134C16 8.07609 15.1575 7.23384 14.122 7.23384ZM15.0609 9.11134V12.0802H5.77616V9.11134C5.77616 8.59378 6.19734 8.17269 6.71506 8.17269H14.122C14.6397 8.17269 15.0609 8.59375 15.0609 9.11134ZM11.4062 7.23384H9.43094V6.27878H11.4062V7.23384ZM3.54338 0.938844H5.88306V4.10641H3.54338V0.938844ZM0.939094 14.2107V5.89566C0.939094 5.42675 1.32069 5.04528 1.78972 5.04528H7.63672C8.08409 5.04528 8.45697 5.39431 8.48556 5.83991C8.48669 5.85728 8.48887 5.87431 8.49178 5.89106V7.23384H6.71503C5.6795 7.23384 4.83703 8.07609 4.83703 9.11134V14.1225C4.83703 14.4643 4.92931 14.7848 5.08962 15.0612H1.78972C1.32069 15.0612 0.939094 14.6797 0.939094 14.2107ZM14.122 15.0612H7.63672H6.71506C6.19734 15.0612 5.77616 14.6401 5.77616 14.1225V13.0191H15.0609V14.1225C15.0609 14.6401 14.6397 15.0612 14.122 15.0612Z" fill=""> </path>
                      </svg>Total offre : {{ $user->creatorAnnonces()->where('type', 1)->count() }}
                    </li>
                    <li class="cabin">
                      <svg width="10" height="16" viewbox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.82422 3.76562H6.41016V0.9375H6.88281C7.14169 0.9375 7.35156 0.727625 7.35156 0.46875C7.35156 0.209875 7.14169 0 6.88281 0H3.11719C2.85831 0 2.64844 0.209875 2.64844 0.46875C2.64844 0.727625 2.85831 0.9375 3.11719 0.9375H3.58984V3.76562H2.17578C1.39822 3.76562 0.765625 4.39822 0.765625 5.17578V12.707C0.765625 13.3572 1.20803 13.9057 1.8075 14.0681C1.74294 14.2296 1.70703 14.4056 1.70703 14.5898C1.70703 15.3674 2.33963 16 3.11719 16C3.89475 16 4.52734 15.3674 4.52734 14.5898C4.52734 14.4241 4.49838 14.265 4.44559 14.1172H5.55437C5.50159 14.265 5.47262 14.4241 5.47262 14.5898C5.47262 15.3674 6.10522 16 6.88278 16C7.66034 16 8.29294 15.3674 8.29294 14.5898C8.29294 14.4056 8.25703 14.2296 8.19247 14.0681C8.79197 13.9057 9.23434 13.3572 9.23434 12.707V5.17578C9.23437 4.39822 8.60178 3.76562 7.82422 3.76562ZM4.52734 0.9375H5.47266V3.76562H4.52734V0.9375ZM3.58984 14.5898C3.58984 14.8505 3.37781 15.0625 3.11719 15.0625C2.85656 15.0625 2.64453 14.8505 2.64453 14.5898C2.64453 14.3292 2.85656 14.1172 3.11719 14.1172C3.37781 14.1172 3.58984 14.3292 3.58984 14.5898ZM6.88281 15.0625C6.62219 15.0625 6.41016 14.8505 6.41016 14.5898C6.41016 14.3292 6.62219 14.1172 6.88281 14.1172C7.14344 14.1172 7.35547 14.3292 7.35547 14.5898C7.35547 14.8505 7.14344 15.0625 6.88281 15.0625ZM8.29688 12.707C8.29688 12.9677 8.08484 13.1797 7.82422 13.1797H2.17578C1.91516 13.1797 1.70312 12.9677 1.70312 12.707V5.17578C1.70312 4.91516 1.91516 4.70312 2.17578 4.70312H7.82422C8.08484 4.70312 8.29688 4.91516 8.29688 5.17578V12.707Z" fill=""></path>
                        <path d="M3.11719 5.64844C2.85831 5.64844 2.64844 5.85831 2.64844 6.11719V11.7656C2.64844 12.0245 2.85831 12.2344 3.11719 12.2344C3.37606 12.2344 3.58594 12.0245 3.58594 11.7656V6.11719C3.58594 5.85831 3.37606 5.64844 3.11719 5.64844Z" fill=""></path>
                        <path d="M5 5.64844C4.74112 5.64844 4.53125 5.85831 4.53125 6.11719V11.7656C4.53125 12.0245 4.74112 12.2344 5 12.2344C5.25888 12.2344 5.46875 12.0245 5.46875 11.7656V6.11719C5.46875 5.85831 5.25888 5.64844 5 5.64844Z" fill=""></path>
                        <path d="M6.88281 5.64844C6.62394 5.64844 6.41406 5.85831 6.41406 6.11719V11.7656C6.41406 12.0245 6.62394 12.2344 6.88281 12.2344C7.14169 12.2344 7.35156 12.0245 7.35156 11.7656V6.11719C7.35156 5.85831 7.14169 5.64844 6.88281 5.64844Z" fill=""> </path>
                      </svg> Total demande :  {{ $user->creatorAnnonces()->where('type', 0)->count() }}
                    </li>
                    <li class="meal"> 
                      <svg width="16" height="12" viewbox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.001 9.093C15.029 6.624 13.786 4.329 11.658 3.029C10.934 2.587 10.15 2.302 9.349 2.144C9.443 1.948 9.5 1.731 9.5 1.5C9.5 0.673 8.827 0 8 0C7.173 0 6.5 0.673 6.5 1.5C6.5 1.731 6.557 1.948 6.651 2.144C5.85 2.302 5.066 2.586 4.342 3.028C2.214 4.328 0.971 6.623 0.999 9.092C0.419 9.3 0 9.849 0 10.5C0 11.327 0.673 12 1.5 12H14.5C15.327 12 16 11.327 16 10.5C16 9.849 15.581 9.3 15.001 9.093ZM8 1C8.275 1 8.5 1.225 8.5 1.5C8.5 1.77 8.284 1.988 8.016 1.997C8.005 1.997 7.994 1.997 7.984 1.997C7.716 1.988 7.5 1.77 7.5 1.5C7.5 1.225 7.725 1 8 1ZM4.863 3.882C5.823 3.296 6.898 3.002 7.974 2.998C7.983 2.997 7.991 3 8 3C8.009 3 8.017 2.998 8.026 2.997C9.102 3.002 10.177 3.295 11.136 3.881C12.938 4.982 14 6.914 14.003 9H1.997C2 6.914 3.062 4.982 4.863 3.882ZM14.5 11H1.5C1.225 11 1 10.775 1 10.5C1 10.225 1.225 10 1.5 10H14.5C14.775 10 15 10.225 15 10.5C15 10.775 14.775 11 14.5 11Z" fill=""></path>
                      </svg>Nomnre de kilo offert : {{ $user->creatorAnnonces()->where('type', 1)->sum('kg') }} Kg
                    </li>
                    <li class="priority"> 
                      <svg width="14" height="14" viewbox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 1.5C9.27613 1.5 9.5 1.27614 9.5 1C9.5 0.72386 9.27613 0.5 9 0.5H6.96987C5.74547 0.499993 4.78574 0.499993 4.02432 0.582487C3.24729 0.666673 2.61771 0.841547 2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08015C0.841547 2.61771 0.666673 3.24729 0.582487 4.02432C0.499993 4.78574 0.499993 5.74547 0.5 6.96987V7.03013C0.499993 8.25453 0.499993 9.21427 0.582487 9.97567C0.666673 10.7527 0.841547 11.3823 1.2321 11.9199C1.46854 12.2453 1.75473 12.5315 2.08015 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.78573 13.5 5.74547 13.5 6.9698 13.5H7.0302C8.25453 13.5 9.21427 13.5 9.97567 13.4175C10.7527 13.3333 11.3823 13.1585 11.9199 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9199C13.1585 11.3823 13.3333 10.7527 13.4175 9.97567C13.5 9.21427 13.5 8.25453 13.5 7.0302V5C13.5 4.72386 13.2761 4.5 13 4.5C12.7239 4.5 12.5 4.72386 12.5 5V7C12.5 8.26107 12.4993 9.16667 12.4233 9.868C12.3483 10.5599 12.2049 10.9934 11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589C10.9934 12.2049 10.5599 12.3483 9.868 12.4233C9.16667 12.4993 8.26107 12.5 7 12.5C5.73893 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3483 3.00661 12.2049 2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.868C1.50069 9.16667 1.5 8.26107 1.5 7C1.5 5.73893 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73893 1.5 7 1.5H9Z" fill=""></path>
                        <path d="M3.21772 8.6845C3.0961 8.93243 3.1985 9.23203 3.44642 9.35363C3.69434 9.47523 3.9939 9.37283 4.11552 9.1249L5.08908 7.14023C5.39083 6.52503 6.27775 6.5551 6.53715 7.1893C7.12328 8.62196 9.12688 8.68983 9.80861 7.3001L10.7822 5.3154C10.9038 5.06748 10.8014 4.76791 10.5535 4.6463C10.3055 4.52469 10.006 4.62708 9.88435 4.875L8.91082 6.8597C8.60908 7.4749 7.72215 7.44483 7.46275 6.81063C6.87662 5.37795 4.87298 5.31008 4.19127 6.69983L3.21772 8.6845Z" fill=""></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6667 1.66667C10.6667 2.58714 11.4129 3.33333 12.3334 3.33333C13.2539 3.33333 14.0001 2.58714 14.0001 1.66667C14.0001 0.746193 13.2539 0 12.3334 0C11.4129 0 10.6667 0.746193 10.6667 1.66667ZM11.6667 1.66667C11.6667 2.03485 11.9652 2.33333 12.3334 2.33333C12.7016 2.33333 13.0001 2.03485 13.0001 1.66667C13.0001 1.29848 12.7016 1 12.3334 1C11.9652 1 11.6667 1.29848 11.6667 1.66667Z" fill=""></path>
                      </svg>Nombre de kilo demandé : {{ $user->creatorAnnonces()->where('type', 0)->sum('kg') }} Kg
                    </li>
                    <li class="entertainment"> 
                      <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0625 7.5625H9.02528L8.86903 6.93747H11.4375C11.9544 6.93747 12.375 6.51691 12.375 5.99997V2.24997C12.375 1.73303 11.9544 1.31247 11.4375 1.31247H8.53366L8.78094 0.915064C8.87212 0.768532 8.82725 0.575813 8.68072 0.484626C8.53419 0.39347 8.3415 0.438345 8.25031 0.584876L8 0.987064L7.74972 0.584845C7.65853 0.438345 7.46594 0.393376 7.31931 0.484595C7.17278 0.575782 7.12791 0.76847 7.21909 0.915032L7.46637 1.31244H4.5625C4.04556 1.31244 3.625 1.733 3.625 2.24994V5.99994C3.625 6.51688 4.04556 6.93744 4.5625 6.93744H7.131L6.97475 7.56247H4.375C4.20244 7.56247 4.0625 7.70238 4.0625 7.87497C4.0625 8.04756 4.20244 8.18747 4.375 8.18747H15.0625C15.2348 8.18747 15.375 8.32766 15.375 8.49997V11C15.375 11.1723 15.2348 11.3125 15.0625 11.3125H0.9375C0.765188 11.3125 0.625 11.1723 0.625 11V8.49997C0.625 8.32766 0.765188 8.18747 0.9375 8.18747H1.5625C1.73506 8.18747 1.875 8.04756 1.875 7.87497C1.875 7.70238 1.73506 7.56247 1.5625 7.56247H0.9375C0.420563 7.56247 0 7.98303 0 8.49997V11C0 11.4023 0.254813 11.7462 0.6115 11.8789L0.576625 12.5544C0.549812 13.0735 0.9245 13.5148 1.42963 13.559C1.45709 13.5614 1.48434 13.5626 1.51141 13.5626C1.98206 13.5626 2.38381 13.2057 2.44409 12.7178L2.54053 11.9375H13.4595L13.5559 12.7178C13.6162 13.2057 14.0179 13.5626 14.4886 13.5626C14.5156 13.5626 14.5429 13.5614 14.5704 13.559C15.0755 13.5148 15.4502 13.0735 15.4234 12.5545L15.3885 11.8789C15.7452 11.7462 16 11.4023 16 11V8.5C16 7.98303 15.5794 7.5625 15.0625 7.5625ZM11.75 2.24994V5.99994C11.75 6.17225 11.6098 6.31244 11.4375 6.31244H7.16581L9.69172 1.93744H10.4683L9.488 3.63544C9.40169 3.78491 9.45291 3.97603 9.60238 4.06231C9.65159 4.09072 9.70531 4.10422 9.75831 4.10422C9.86631 4.10422 9.97138 4.04819 10.0293 3.94794L11.1855 1.94528C11.187 1.94272 11.1881 1.94003 11.1895 1.93744H11.4375C11.6098 1.93744 11.75 2.07763 11.75 2.24994ZM4.25 5.99994V2.24994C4.25 2.07763 4.39019 1.93744 4.5625 1.93744H8.97003L6.44413 6.31244H4.5625C4.39019 6.31244 4.25 6.17228 4.25 5.99994ZM7.77522 6.93744H8.22478L8.38103 7.56247H7.61894L7.77522 6.93744ZM1.82378 12.6412C1.80153 12.8214 1.65294 12.951 1.48406 12.9363C1.31584 12.9216 1.19144 12.768 1.20078 12.5867L1.23428 11.9375H1.91078L1.82378 12.6412ZM14.5159 12.9363C14.3478 12.951 14.1985 12.8214 14.1762 12.6412L14.0892 11.9375H14.7657L14.7992 12.5867C14.8086 12.7681 14.6842 12.9216 14.5159 12.9363Z" fill=""></path>
                        <path d="M1.25 9.125V10.375C1.25 10.5476 1.38994 10.6875 1.5625 10.6875H14.4375C14.6101 10.6875 14.75 10.5476 14.75 10.375V9.125C14.75 8.95241 14.6101 8.8125 14.4375 8.8125H1.5625C1.38994 8.8125 1.25 8.95241 1.25 9.125ZM1.875 9.4375H14.125V10.0625H1.875V9.4375Z" fill=""></path>
                        <path d="M2.96887 8.1875C3.14144 8.1875 3.28137 8.04759 3.28137 7.875C3.28137 7.70241 3.14144 7.5625 2.96887 7.5625H2.96863C2.79606 7.5625 2.65625 7.70241 2.65625 7.875C2.65625 8.04759 2.79628 8.1875 2.96887 8.1875Z" fill=""></path>
                      </svg>Nombre de kilo vendu : {{ $user->creatorCommandes()->where('status', 'terminee')->count() }} Kg
                    </li>
                    <li class="seating"> 
                      <svg width="12" height="14" viewbox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.66673 3.30005C1.83832 3.30005 1.16675 3.97161 1.16675 4.80005V11.0001C1.16675 11.8285 1.83832 12.5001 2.66673 12.5001H7.50009C8.32849 12.5001 9.00009 11.8285 9.00009 11.0001V4.80005C9.00009 3.97161 8.32849 3.30005 7.50009 3.30005H2.66673ZM0.166748 4.80005C0.166748 3.41933 1.28604 2.30005 2.66673 2.30005H7.50009C8.88081 2.30005 10.0001 3.41933 10.0001 4.80005V11.0001C10.0001 12.3808 8.88081 13.5001 7.50009 13.5001H2.66673C1.28604 13.5001 0.166748 12.3808 0.166748 11.0001V4.80005Z" fill=""></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.87329 1C4.87329 0.723856 5.09717 0.5 5.37329 0.5H9.56661C10.8246 0.5 11.8333 1.53907 11.8333 2.8V8.51332C11.8333 8.78948 11.6095 9.01332 11.3333 9.01332C11.0572 9.01332 10.8333 8.78948 10.8333 8.51332V2.8C10.8333 2.07426 10.2553 1.5 9.56661 1.5H5.37329C5.09717 1.5 4.87329 1.27614 4.87329 1Z" fill=""></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.55347 10.6C2.55347 10.3238 2.77735 10.1 3.05347 10.1H5.41347C5.68963 10.1 5.91347 10.3238 5.91347 10.6C5.91347 10.8761 5.68963 11.1 5.41347 11.1H3.05347C2.77735 11.1 2.55347 10.8761 2.55347 10.6Z" fill=""></path>
                      </svg>Nombre de kilo acheté : {{ $user->receverCommandes()->where('status', 'terminee')->count() }} Kg
                    </li>
                    
                  </div>
                </div>
                @endif

               
                </div>

              
              </div>
              {{-- <div class="item-timeline"> 
                <div class="item-line-timeline"> 
                  <div class="time-flight"> 
                    <p class="text-sm-bold neutral-1000 icon-time">13:50</p>
                    <p class="text-sm-medium neutral-500">05 Jan 2024</p>
                  </div>
                  <div class="location-flight"> 
                    <p class="text-xl-bold neutral-1000">Hong Kong (HKG)</p>
                    <p class="text-sm-medium neutral-500">Hong Kong International Airport Terminal 1</p>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="box-stop"> 
              <div class="box-stop-left"><a class="close-stop" href="#"></a></div>
              <div class="box-stop-right">
                <p class="text-sm-bold neutral-1000">Avis des voyageurs</p>
                <p class="text-sm-medium neutral-1000">Les commentaire d'après voyage </p>
              </div>
            </div>

            {{-------------------------------- rate------------------------------------ --}}

            <div class="box-list-comment background-card"> 
                <div class="list-reviews"> 

                    @forelse ($user->rates as $rate)

                    <div class="item-review"> 
                        <div class="head-review"> 
                          <div class="author-review"> <img src="{{ asset('storage/'.$rate->commande?->receverUser?->image) }}" alt="Travila">
                            <div class="author-info"> 
                              <p class="text-lg-bold"> {{ $rate->commande?->receverUser?->psuedo }} </p>
                              <p class="text-sm-medium neutral-500"> {{ $rate->created_at->translatedFormat('d M Y') }} </p>
                            </div>
                          </div>
                          <div class="rate-review"> 
                            @for ($i = 0; $i < $rate->rate; $i++)
                                <img src="{{ asset('assets/imgs/page/tour-detail/star-big.svg') }}" alt="Travila">                                
                            @endfor
                            {{-- <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                            <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                            <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                            <img src="assets/imgs/page/tour-detail/star-big.svg" alt="Travila"> --}}
                        </div>
                        </div>
                        <div class="content-review"> 
                          <p class="text-sm-medium neutral-800"> {{ $rate->comment }} </p>
                        </div>
                      </div>
                        
                    @empty

                        <p>  Pas d'avis diponible</p>
                        
                    @endforelse


                </div>

                @if (!$user->rates->isEmpty())

                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="blog-detail.html#" aria-label="Previous"><span aria-hidden="true"> 
                          <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg></span></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"> 
                          <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg></span></a>
                    </li>
                  </ul>
                </nav>
                    
                @endif

              </div>

          </div>
        </div>
        {{-- <div class="col-lg-4">
          <div class="booking-form"> 
            <div class="head-booking-form"> 
              <p class="text-xl-bold neutral-1000">Booking Form</p>
            </div>
            <div class="content-booking-form"> 
              <div class="item-line-booking item-line-booking-2"> <strong class="text-md-bold neutral-1000">Full Name</strong>
                <div class="input-calendar">
                  <input class="form-control" type="text" value="John Steven">
                  <svg width="14" height="16" viewbox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99984 8.50004C4.8865 8.50004 3.1665 6.78004 3.1665 4.66671C3.1665 2.55337 4.8865 0.833374 6.99984 0.833374C9.11317 0.833374 10.8332 2.55337 10.8332 4.66671C10.8332 6.78004 9.11317 8.50004 6.99984 8.50004ZM6.99984 1.83337C5.43984 1.83337 4.1665 3.10671 4.1665 4.66671C4.1665 6.22671 5.43984 7.50004 6.99984 7.50004C8.55984 7.50004 9.83317 6.22671 9.83317 4.66671C9.83317 3.10671 8.55984 1.83337 6.99984 1.83337Z" fill=""></path>
                    <path d="M12.7267 15.1667C12.4534 15.1667 12.2267 14.94 12.2267 14.6667C12.2267 12.3667 9.88013 10.5 7.00013 10.5C4.1201 10.5 1.77344 12.3667 1.77344 14.6667C1.77344 14.94 1.54677 15.1667 1.27344 15.1667C1.0001 15.1667 0.773438 14.94 0.773438 14.6667C0.773438 11.82 3.56676 9.5 7.00013 9.5C10.4335 9.5 13.2267 11.82 13.2267 14.6667C13.2267 14.94 13.0001 15.1667 12.7267 15.1667Z" fill=""></path>
                  </svg>
                </div>
              </div>
              <div class="item-line-booking item-line-booking-2"> <strong class="text-md-bold neutral-1000">Phone</strong>
                <div class="input-calendar">
                  <input class="form-control" type="text" value="123-456-789">
                  <svg width="14" height="16" viewbox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99984 8.50004C4.8865 8.50004 3.1665 6.78004 3.1665 4.66671C3.1665 2.55337 4.8865 0.833374 6.99984 0.833374C9.11317 0.833374 10.8332 2.55337 10.8332 4.66671C10.8332 6.78004 9.11317 8.50004 6.99984 8.50004ZM6.99984 1.83337C5.43984 1.83337 4.1665 3.10671 4.1665 4.66671C4.1665 6.22671 5.43984 7.50004 6.99984 7.50004C8.55984 7.50004 9.83317 6.22671 9.83317 4.66671C9.83317 3.10671 8.55984 1.83337 6.99984 1.83337Z" fill=""></path>
                    <path d="M12.7267 15.1667C12.4534 15.1667 12.2267 14.94 12.2267 14.6667C12.2267 12.3667 9.88013 10.5 7.00013 10.5C4.1201 10.5 1.77344 12.3667 1.77344 14.6667C1.77344 14.94 1.54677 15.1667 1.27344 15.1667C1.0001 15.1667 0.773438 14.94 0.773438 14.6667C0.773438 11.82 3.56676 9.5 7.00013 9.5C10.4335 9.5 13.2267 11.82 13.2267 14.6667C13.2267 14.94 13.0001 15.1667 12.7267 15.1667Z" fill=""></path>
                  </svg>
                </div>
              </div>
              <div class="item-line-booking item-line-booking-2"> <strong class="text-md-bold neutral-1000">Passport</strong>
                <div class="input-calendar">
                  <input class="form-control" type="text" value="123456789">
                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_859_28688)">
                      <path d="M15.0625 7.66382V5.77748C15.0625 4.85073 14.3251 4.09339 13.4062 4.06032V2.90248C13.4062 2.29939 12.9156 1.80873 12.3125 1.80873H9.30131L8.91247 0.727885C8.81331 0.45226 8.61262 0.23201 8.34737 0.107729C8.08212 -0.0165835 7.78444 -0.0298335 7.50922 0.070354L2.045 2.05914C1.77006 2.1592 1.55072 2.36042 1.42734 2.62573C1.30397 2.89104 1.29144 3.18845 1.39209 3.4632L1.61162 4.06242C0.713656 4.11795 0 4.86576 0 5.77748V14.2775C0 15.2252 0.771031 15.9962 1.71875 15.9962H13.3438C14.2915 15.9962 15.0625 15.2252 15.0625 14.2775V12.3286C15.5918 12.2526 16 11.7963 16 11.2462V8.74623C16 8.1962 15.5918 7.73989 15.0625 7.66382ZM15.0625 11.2462C15.0625 11.3324 14.9924 11.4025 14.9062 11.4025H12.4062C11.6308 11.4025 11 10.7716 11 9.99623C11 9.22082 11.6308 8.58998 12.4062 8.58998H14.9062C14.9924 8.58998 15.0625 8.66007 15.0625 8.74623V11.2462ZM2.27238 3.1407C2.25297 3.08773 2.26719 3.04301 2.27741 3.02104C2.28762 2.9991 2.31266 2.95939 2.36566 2.9401L7.82984 0.951323C7.88291 0.932041 7.92762 0.946385 7.94959 0.956667C7.97156 0.966948 8.01122 0.992135 8.03031 1.04526L8.305 1.80876H8.09375C7.49066 1.80876 7 2.29942 7 2.90251V4.05876H2.60872L2.27238 3.1407ZM12.4688 2.90248V4.05873H7.9375V2.90248C7.9375 2.81632 8.00759 2.74623 8.09375 2.74623H12.3125C12.3987 2.74623 12.4688 2.81632 12.4688 2.90248ZM13.3438 15.0587H1.71875C1.28797 15.0587 0.9375 14.7083 0.9375 14.2775V5.77748C0.9375 5.3467 1.28797 4.99623 1.71875 4.99623H13.3438C13.7745 4.99623 14.125 5.3467 14.125 5.77748V7.65248H12.4062C11.1139 7.65248 10.0625 8.70389 10.0625 9.99623C10.0625 11.2886 11.1139 12.34 12.4062 12.34H14.125V14.2775C14.125 14.7083 13.7745 15.0587 13.3438 15.0587Z" fill=""></path>
                      <path d="M12.4062 10.465C12.6651 10.465 12.875 10.2551 12.875 9.99622C12.875 9.73733 12.6651 9.52747 12.4062 9.52747C12.1474 9.52747 11.9375 9.73733 11.9375 9.99622C11.9375 10.2551 12.1474 10.465 12.4062 10.465Z" fill=""></path>
                    </g>
                    <defs>
                      <clippath id="clip0_859_28688">
                        <rect width="16" height="16" fill="white"></rect>
                      </clippath>
                    </defs>
                  </svg>
                </div>
              </div>
              <div class="item-line-booking"> <strong class="text-md-bold neutral-1000">Title</strong>
                <div class="input-calendar input-radio-type">
                  <label>
                    <input class="form-rd" type="radio" value="Mr" name="title">Mr.
                  </label>
                  <label>
                    <input class="form-rd" type="radio" value="Mrs" name="title">Mrs.
                  </label>
                  <label>
                    <input class="form-rd" type="radio" value="Ms" name="title">Ms.
                  </label>
                </div>
              </div>
              <div class="item-line-booking"> 
                <div class="box-tickets"><strong class="text-md-bold neutral-1000">Tickets:</strong>
                  <div class="line-booking-tickets"> 
                    <div class="item-ticket"> 
                      <p class="text-md-medium neutral-500 mr-30">Adult (18+ years)</p>
                      <p class="text-md-medium neutral-500">$42.50 </p>
                    </div>
                    <div class="dropdown-quantity"> 
                      <div class="dropdown">
                        <button class="btn dropdown-toggle" id="dropdownTicket" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>01</span>
                          <svg width="12" height="7" viewbox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownTicket">
                          <li><a class="dropdown-item active" href="book-ticket.html#">01</a></li>
                          <li><a class="dropdown-item" href="book-ticket.html#">02</a></li>
                          <li><a class="dropdown-item" href="book-ticket.html#">03</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="line-booking-tickets"> 
                    <div class="item-ticket"> 
                      <p class="text-md-medium neutral-500 mr-30">Adult (18+ years)</p>
                      <p class="text-md-medium neutral-500">$42.50 </p>
                    </div>
                    <div class="dropdown-quantity"> 
                      <div class="dropdown">
                        <button class="btn dropdown-toggle" id="dropdownTicketYouth" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>01</span>
                          <svg width="12" height="7" viewbox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownTicketYouth">
                          <li><a class="dropdown-item active" href="book-ticket.html#">01</a></li>
                          <li><a class="dropdown-item" href="book-ticket.html#">02</a></li>
                          <li><a class="dropdown-item" href="book-ticket.html#">03</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item-line-booking"> 
                <div class="box-tickets"><strong class="text-md-bold neutral-1000">Add Extra:</strong>
                  <div class="line-booking-tickets"> 
                    <div class="item-ticket"> 
                      <ul class="list-filter-checkbox"> 
                        <li> 
                          <label class="cb-container">
                            <input type="checkbox"><span class="text-sm-medium">Add service per Booking </span><span class="checkmark"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="include-price">
                      <p class="text-md-bold neutral-1000">$32.00</p>
                    </div>
                  </div>
                  <div class="line-booking-tickets"> 
                    <div class="item-ticket"> 
                      <ul class="list-filter-checkbox"> 
                        <li> 
                          <label class="cb-container">
                            <input type="checkbox"><span class="text-sm-medium">Add service per Personal </span><span class="checkmark"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="include-price"> 
                      <p class="text-md-bold neutral-1000">$24.00</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item-line-booking last-item"> <strong class="text-md-bold neutral-1000">Total:</strong>
                <div class="line-booking-right"> 
                  <p class="text-xl-bold neutral-1000">$124.00</p>
                </div>
              </div>
              <div class="box-button-book"> <a class="btn btn-book" href="book-ticket.html#">Book Now 
                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></a></div>
              <div class="box-need-help"> <a href="help-center.html"> 
                  <svg width="12" height="14" viewbox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z" fill=""></path>
                  </svg>Need some help?</a></div>
            </div>
          </div>
          <div class="sidebar-banner"> <a href="book-ticket.html#"><img src="assets/imgs/page/tour-detail/banner-ads.png" alt="Travila"></a></div>
          <div class="sidebar-banner"> <a href="book-ticket.html#"><img src="assets/imgs/page/tour-detail/banner-ads2.png" alt="Travila"></a></div>
        </div> --}}
      </div>
    </div>
  </section>
    
@endsection