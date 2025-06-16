@extends('base')

@section('title', config('app.name') . ' | Connexion')

@section('content')
    <style>
        @media (min-width: 1400px) {
            .container {
                max-width: 2000px !important;
            }
        }


        /* Masquer l'input file */
        .file-input {
            display: none;
        }

        /* Styliser le bouton */
        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            /* Bleu */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        /* Effet au survol */
        .custom-button:hover {
            background-color: #0056b3;
        }
    </style>

    <main class="main">
        <div class="box-content">
            <div class="section-box">
                <div class="container">
                    <div class="box-heading">
                        <div class="box-heading-left">
                            <div class="box-title">
                                <h4 class="neutral-1000 mb-15">Profil</h4>
                            </div>
                            <div class="box-breadcrumb">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li> <a class="icon-home" href="#">Accueil</a></li>
                                        <li><a class="icon-home" href="#">Utilisateur</a></li>
                                        <li><span>Profil</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="box-form-profile"
                                style="border: 5px solid black !important; border-radius: 10px !important; padding: 20px !important;">
                                <h6 class="text-lg-bold neutral-1000 mb-30"> Mis à jour des informations de votre profil
                                </h6>
                                <div class="box-avatar-profile">

                                   
                                    <div class="image-avatar">
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}"
                                            style="width: 50px ; height: 50px " style="">
                                    </div>
                                    <div class="box-button-upload-avatar">

                                        <form action="{{ route('upload.image') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Input file masqué -->
                                            <input type="file" name="image" id="fileInput">

                                            <!-- Bouton stylisé -->
                                            <button type="submit" class="custom-button">
                                                Changer l'image du profil
                                            </button>
                                        </form>
                                    </div>

                                    @if (!$user->hasVerifiedPhone())
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Votre numéro n\'est pas vérifié.') }}


                                    <form action="{{ route('phone.send') }}" method="POST">
                                        @csrf

                                        @php
                                             $phone =  new Propaganistas\LaravelPhone\PhoneNumber(auth()->user()->phone, auth()->user()->country_code) ; 
                                            //  dd( str_replace(' ', '', $phone->formatInternational()) ) ; 
                                        @endphp

                                        <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">

                                        <button
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Cliquez ici
                                        </button>

                                    </form>


                                    </p>
                                @endif

                                </div>

                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form action="{{ route('profile.update') }}" method="post">
                                    @csrf
                                    @method('patch')

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="pseudo" :value="__('Pseudo')"
                                                    class="text-sm-medium neutral-500 mb-10">Pseudo *</label>
                                                <input id="pseudo" name="pseudo" class="form-control" type="text"
                                                    value="{{ old('pseudo', $user->pseudo) }}" required autofocus
                                                    autocomplete="name" placeholder="Steven Job">
                                                @error('pseudo')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('pseudo')" />-->
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name" :value="__('Nom')"
                                                    class="text-sm-medium neutral-500 mb-10">Nom *</label>
                                                <input id="name" name="name" class="form-control" type="text"
                                                    value="{{ old('name', $user->name) }}" required autofocus
                                                    autocomplete="name" placeholder="Steven Job">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('name')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-sm-medium neutral-500 mb-10">Prenom *</label>
                                                <input id="first_name" name="first_name" class="form-control" type="text"
                                                    value="{{ old('first_name', $user->first_name) }}"
                                                    placeholder="Steven Job">
                                                @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('first_name')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email" :value="__('Email')"
                                                    class="text-sm-medium neutral-500 mb-10">Email *</label>
                                                <input id="email" name="email" type="email"
                                                    value="{{ old('email', $user->email) }}" class="form-control"
                                                    type="text" placeholder="stevenjob@gmail.com">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('email')" />-->
                                            </div>
                                        </div>
                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800">
                                                    {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                                    <button form="send-verification"
                                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone" :value="__('Tel')"
                                                    class="text-sm-medium neutral-500 mb-10">Tel *</label>
                                                <input id="phone" name="phone" type="text"
                                                    value="{{ old('phone', $user->phone) }}" required autofocus
                                                    autocomplete="phone" class="form-control"
                                                    placeholder="Contact number" value="01 - 234 567 89">
                                                @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('phone')" />-->
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="pays" :value="__('Pays')"
                                                    class="text-sm-medium neutral-500 mb-10">Pays</label>
                                                <input id="pays" name="pays"
                                                    value="{{ old('pays', $user->pays) }}" class="form-control"
                                                    type="text" placeholder="Pays" value="Pays">
                                                @error('pays')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('pays')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="city" :value="__('Ville')"
                                                    class="text-sm-medium neutral-500 mb-10">Ville</label>
                                                <input id="city" name="city"
                                                    value="{{ old('city', $user->city) }}" class="form-control"
                                                    type="text" placeholder="Ville" value="Chicago">
                                                @error('city')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('city')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="adress" :value="__('Adresse')"
                                                    class="text-sm-medium neutral-500 mb-10">Adresse complète</label>
                                                <input id="adress" name="adress"
                                                    value="{{ old('adress', $user->adress) }}" class="form-control"
                                                    type="text"
                                                    placeholder="205 North Michigan Avenue, Suite 810, Chicago, 60601, USA"
                                                    value="">
                                                @error('adress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('adress')" />-->
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="site" :value="__('Site')"
                                                    class="text-sm-medium neutral-500 mb-10">Site personnel</label>
                                                <input id="site" name="site"
                                                    value="{{ old('site', $user->site) }}" class="form-control"
                                                    type="text" placeholder="https://alithemes.com">
                                                @error('site')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('site')" />-->
                                            </div>
                                        </div>
                                        <div for="nationalite" :value="__('Nationalite')" class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-sm-medium neutral-500 mb-10">Nationalité</label>
                                                <input id="nationalite" name="nationalite"
                                                    value="{{ old('nationalite', $user->nationalite) }}"
                                                    class="form-control" type="text">
                                                @error('nationalite')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('nationalite')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="date_of_birth" :value="__('Date de naissance')"
                                                    class="text-sm-medium neutral-500 mb-10">Date de naissance</label>
                                                <input id="date_of_birth" name="date_of_birth" type="date"
                                                    class="form-control"
                                                    value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->toDateString() : '') }}"
                                                    required autofocus>
                                                @error('date_of_birth')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" /> -->
                                            </div>
                                        </div>

                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex"
                                                    id="sex" value="M" @checked($user->sex === 'M')>
                                                <label class="form-check-label" for="sex">Homme</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sex"
                                                    id="sex" value="F" @checked($user->sex === 'F')>
                                                <label class="form-check-label" for="sex">Femme</label>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
                                        </div>

                                        <div
                                            class="box-payment-method mt-20 pt-20 border-top border-bottom mb-20 pb-20 neutral-1000">
                                            <p class="text-lg fw-bold mb-15">Autorisations</p>
                                            <div class="form-check">
                                                <input class="form-check-input" id="accord" type="checkbox"
                                                    name="accord" value="1" @checked($user->accord === 1)>
                                                <label class="form-check-label" for="accord">Autorisez la vue public de
                                                    vos starts</label>
                                            </div>
                                            {{-- <div class="form-check">
                    <input class="form-check-input" id="flexRadioDefault2" type="checkbox" name="flexRadioDefault">
                    <label class="form-check-label" for="flexRadioDefault2">Paypal</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="flexRadioDefault2" type="checkbox" name="flexRadioDefault">
                    <label class="form-check-label" for="flexRadioDefault2">Direct Bank Transfer</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="flexRadioDefault2" type="checkbox" name="flexRadioDefault">
                    <label class="form-check-label" for="flexRadioDefault2">Check Payments</label>
                  </div> --}}
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="bio" :value="__('Biographie')"
                                                    class="text-sm-medium neutral-500 mb-10">Biographie</label>
                                                <textarea id="bio" name="bio" class="form-control" placeholder="Parlez-nous un peu de vous"
                                                    rows="6"> {{ old('bio', $user->bio) }}</textarea>
                                                @error('bio')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('bio')" /> -->
                                            </div>
                                        </div>


                                    </div>
                                    <div class="box-button-save mt-15">
                                        <button class="btn btn-gray">Enregistrer les modifications</button>
                                    </div>
                                </form>

                            </div><br> <br>
                        </div>


                        <div class="col-xl-3 col-lg-4">

                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                @method('patch')

                                <div class="box-form-profile"
                                    style="border: 5px solid black !important; border-radius: 10px !important; padding: 20px !important;">
                                    <h6 class="text-lg-bold neutral-1000 mb-12">Réseaux Sociaux</h6>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="link_facebook" :value="__('Facebook')"
                                                class="lbl-checkbox text-sm-medium neutral-500">Facebook</label>
                                            <div class="form-group">
                                                <input id="link_facebook" name="link_facebook"
                                                    value="{{ old('link_facebook', $user->link_facebook) }}"
                                                    class="form-control" type="text"
                                                    placeholder="https://www.facebook.com">
                                                @error('link_facebook')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('link_facebook')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="link_x" :value="__('X')"
                                                class="lbl-checkbox text-sm-medium neutral-500">X</label>
                                            <div class="form-group">
                                                <input id="link_x" name="link_x"
                                                    value="{{ old('link_x', $user->link_x) }}" class="form-control"
                                                    type="text" placeholder="https://x.com">
                                                @error('link_x')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('link_x')" />-->
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="link_insta" :value="__('Instagram')"
                                                class="lbl-checkbox text-sm-medium neutral-500">Instagram</label>
                                            <div class="form-group">
                                                <input id="link_insta" name="link_insta"
                                                    value="{{ old('link_insta', $user->link_insta) }}"
                                                    class="form-control" type="text"
                                                    placeholder="https://www.instagram.com">
                                                @error('link_insta')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--<x-input-error class="mt-2" :messages="$errors->get('link_insta')" />-->
                                            </div>
                                        </div>
                                    </div>
                                    <input type ="hidden" name="regle" value="1">
                                    <div class="box-button-save mt-15">
                                        <button class="btn btn-gray">Enregistrer les modifications</button>
                                    </div>
                                </div><br><br>
                            </form>


                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="box-form-profile"
                                    style="border: 5px solid black !important; border-radius: 10px !important; padding: 20px !important;">
                                    <h6 class="text-lg-bold neutral-1000 mb-12">Changer le mot de passe</h6>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="update_password_current_password"
                                                :value="__('Ancien mot de passe')"
                                                class="lbl-checkbox text-sm-medium neutral-500">Ancien mot de passe</label>
                                            <div class="form-group">
                                                <input id="update_password_current_password" name="current_password"
                                                    class="form-control" type="password" placeholder="*************">
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="update_password_password" :value="__('Nouveau mot de passe')"
                                                class="lbl-checkbox text-sm-medium neutral-500">Nouveau mot de
                                                passe</label>
                                            <div class="form-group">
                                                <input id="update_password_password" name="password" class="form-control"
                                                    type="password" placeholder="*************">
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="update_password_password_confirmation"
                                                :value="__('Confirm Password')"
                                                class="lbl-checkbox text-sm-medium neutral-500">Confirmer le nouveau mot de
                                                passe</label>
                                            <div class="form-group">
                                                <input id="update_password_password_confirmation"
                                                    name="password_confirmation" class="form-control" type="password"
                                                    placeholder="*************">
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex items-center gap-4">
                                        <div class="box-button-save mt-15">
                                            <button class="btn btn-gray">Save Changes</button>
                                        </div>

                                        @if (session('status') === 'password-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                            <div class="alert alert-success"> {{ __('Mot de pass modifié.') }}</div>
                                            </p>
                                        @endif
                                    </div>

                                </div><br><br>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
