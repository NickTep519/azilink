@extends('base')

@section('title', 'Vérification de téléphone')

@section('content')


@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif


    <main class="main">
        <section class="box-section box-breadcrumb background-100">
            <div class="container">
                <ul class="breadcrumbs">
                    <li> <a href="index.html">Home</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb">Confirmation</span></li>
                </ul>
            </div>
        </section>
        <section class="section-box box-become-video background-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mx-auto">
                        <div class="text-center neutral-1000"><img class="mr-10"
                                src="assets/imgs/page/pages/confirmation.svg" alt="Travila">
                            <h5 class="mt-15 mb-15 neutral-1000 wow fadeInUp">Vérification de numéro</h5>
                            <p class="mb-50">
                                Veuillez entrer le CODE qui a été envoyé à votre numéro</p>
                            <div class="p-5 border rounded-3">


                                <div class="w-100 justify-content-between">

                                    @php
                                        $phone =  new Propaganistas\LaravelPhone\PhoneNumber(auth()->user()->phone, auth()->user()->country_code) ; 
                                    @endphp

                                    <form action="{{ route('verify.code.phone') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="phone" value="{{ str_replace(' ', '', $phone->formatInternational()) }}"
                                            class="activation-code-input w-100 " placeholder="code">
                                            <input type="hidden" name="country_code" value="{{ auth()->user()->country_code }}" >
                                        <input class="activation-code-input w-100 " name="code" placeholder="code">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="d-flex align-items-end mb-50 text-end justify-content-end">
                                            <button class="btn btn-print d-flex gap-2"> <span>Envoyer</span></button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-media background-body">
            <div class="container-media wow fadeInUp"> <img src="assets/imgs/page/homepage5/media.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media2.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media3.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media4.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media5.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media6.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media7.png" alt="Travila"></div>
        </section>
    </main>



@endsection
