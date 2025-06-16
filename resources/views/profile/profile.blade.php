@extends('base')

@section('title', config('app.name') . ' | Profile')

@section('content')


    <section class="box-section box-breadcrumb background-body">
        <div class="container">
            <ul class="breadcrumbs">
                <li> <a href="/"></a><span class="arrow-right">
                        {{-- <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg></span> --}}
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top" style="background-color: blue !important">
                            <div class="user-box">
                                <img src="{{ asset('/storage/' . $user->image) }}" alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white"> {{ $user->first_name }} {{ $user->name }}
                                {{ $user->profileBadge() }} </h5>
                            <h8 class="text-light"> Membre depuis {{ auth()->user()->created_at->translatedFormat('M Y') }}
                            </h8>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> {{ $user->phone }} </span>
                                        <small> Numéro de téléphone </small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> {{ $user->email }} </span>
                                        <small>Adresse email</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> {{ $user->pays }} </span>
                                        <small> Pays </small>
                                    </div>
                                </li>
                            </ul>
                            <div class="row text-center mt-4">
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"> {{ $user->creatorAnnonces()->count() }} </h4>
                                    <small class="mb-0 font-weight-bold"> Trajets </small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5">
                                        {{ $user->creatorAnnonces()->where('type', 1)->count() }} </h4>
                                    <small class="mb-0 font-weight-bold">Offres</small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5">
                                        {{ $user->creatorAnnonces()->where('type', 0)->count() }} </h4>
                                    <small class="mb-0 font-weight-bold">Demandes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="javascript:void()"
                                class="list-inline-item btn-social btn-behance waves-effect waves-light"><i
                                    class="fa fa-behance"></i></a>
                            <a href="javascript:void()"
                                class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i
                                    class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item" role="presentation">
                                <a href="#profile" class="nav-link active" data-bs-toggle="pill" role="tab"><i
                                        class="icon-user"></i> Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#notification" class="nav-link" data-bs-toggle="pill" role="tab"><i
                                        class="icon-user"></i> Notification</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit" class="nav-link" data-bs-toggle="pill" role="tab"><i
                                        class="icon-note"></i> Informations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#pdp" data-target="#pdp" data-bs-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Photo de profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#mdp" data-target="#mdp" data-bs-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Sécurité</span></a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#messages" data-target="#messages" data-bs-toggle="pill" class="nav-link"><i
                                        class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                            </li> --}}
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="profile">
                                <h5 class="mb-3">Mon Profile</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Niveau de Vérification ({{ $user->progress() }} % vérifié) </h6>
                                        <p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $user->progress() }}%; background-color: blue !important"
                                                aria-valuenow="{{ $user->progress() }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                {{ $user->progress() }}%
                                            </div>
                                        </div>

                                        @if (
                                            $user->hasVerifiedEmail() &&
                                                !$user->hasVerifiedPhone() &&
                                                !$user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress())
                                            @php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            @endphp

                                            <form action="{{ route('phone.send') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="phone"
                                                    value="{{ str_replace(' ', '', $phone->formatInternational()) }}">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary"
                                                    style="background-color: blue !important">Vérifier votre
                                                    numéro</button>

                                            </form>
                                        @endif

                                        @if (
                                            $user->hasVerifiedEmail() &&
                                                $user->hasVerifiedPhone() &&
                                                !$user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress())
                                            @php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            @endphp

                                            <form action="{{ route('phone.send') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="phone"
                                                    value="{{ str_replace(' ', '', $phone->formatInternational()) }}">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary" style="background-color: blue !important"
                                                    disabled>Vérifier votre Identité</button>

                                            </form>
                                        @endif

                                        @if (
                                            $user->hasVerifiedEmail() &&
                                                $user->hasVerifiedPhone() &&
                                                $user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress())
                                            @php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            @endphp

                                            <form action="{{ route('phone.send') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="phone"
                                                    value="{{ str_replace(' ', '', $phone->formatInternational()) }}">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary" style="background-color: blue !important"
                                                    disabled>Vérifier votre Adresse</button>

                                            </form>
                                        @endif

                                        </p>
                                        {{-- <h6> Biographie : </h6> --}}
                                        <p>
                                        <form action="{{ route('profile.update') }}" method="post">
                                            @csrf
                                            @method('patch')

                                            <div
                                                class="box-payment-method mt-20 pt-20 border-top border-bottom mb-20 pb-20 neutral-1000">
                                                <p class="text-lg fw-bold mb-15">Autorisations</p>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="accord" type="checkbox"
                                                        name="accord" value="1" @checked($user->accord === 1)>
                                                    <label class="form-check-label" for="accord">Autorisez la vue public
                                                        de
                                                        vos stats</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label for="bio" :value="__('Biographie')"
                                                            class="text-sm-medium neutral-500 mb-10">Biographie : </label>
                                                    <textarea id="bio" name="bio" class="form-control" placeholder="Parlez-nous un peu de vous"
                                                        rows="6"> {{ old('bio', $user->bio) }}</textarea>
                                                    @error('bio')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <!--<x-input-error class="mt-2" :messages="$errors->get('bio')" /> -->
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <button class="btn btn-primary" style="background-color: blue !important">
                                                    Enrégistrer </button>
                                            </div>
                                        </form>
                                        </p>
                                        {{-- <h6>À propos</h6>
                                        <p>
                                            {{ $user->bio }}
                                        </p> --}}
                                        {{-- <h6>Hobbies</h6>
                                        <p>
                                            Indie music, skiing and hiking. I love the great outdoors.
                                        </p> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Recentes destinations</h6>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Cotonou</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Paris</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Madrid</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Bruxelles</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Rome</a>

                                        <hr>

                                        <div class="badge-3d-container">
                                            <span class="badge badge-cube-3d-fixed bg-primary">
                                                <div class="content">
                                                    <i class="fa fa-user"></i>
                                                    <small>{{ $user->conversations()->count() }}</small>
                                                    <div class="badge-label">Convs.</div>
                                                </div>
                                            </span>

                                            <span class="badge badge-cube-3d-fixed bg-success">
                                                <div class="content">
                                                    <i class="fa fa-cog"></i>
                                                    <small> {{ $user->creatorCommandes()->where('status', 'terminee')->count() }} </small>
                                                    <div class="badge-label">Commandes</div>
                                                </div>
                                            </span>

                                            <span class="badge badge-cube-3d-fixed bg-danger">
                                                <div class="content">
                                                    <i class="fa fa-eye"></i>
                                                    <small>{{ $user->creatorAnnonces()->sum('views') }}</small>
                                                    <div class="badge-label">Views</div>
                                                </div>
                                            </span>
                                        </div>

                                    </div>
                                    {{-- <div class="col-md-12">
                                        <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span>
                                            Recentes Notifications</h5>
                                        <table class="table table-hover table-striped">
                                            <tbody>

                                                @foreach ($user->notifications()->paginate(5) as $notification)
                                                    <tr>
                                                        <td>
                                                            <strong>{{ $notification->data['title'] }}</strong>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="notification">
                                {{-- <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <div class="alert-icon">
                                        <i class="icon-info"></i>
                                    </div>
                                    <div class="alert-message">
                                        <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                    </div>
                                </div> --}}
                                <table class="table table-hover table-striped">
                                    <tbody>

                                        @foreach ($user->notifications()->paginate(5) as $notification)
                                            <tr>
                                                <td>
                                                    <span class="float-right font-weight-bold">
                                                        {{ $notification->created_at->diffForHumans() }} </span>
                                                    {{ $notification->data['message'] }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="edit">
                                <form action="{{ route('profile.update') }}" method="post">
                                    @csrf
                                    @method('patch')

                                    <div class="form-group row">
                                        <label for="pseudo" class="col-lg-3 col-form-label form-control-label">Pseudo
                                            :</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="pseudo" name="pseudo" type="text"
                                                value="{{ old('pseudo', $user->pseudo) }}" autocomplete="name"
                                                placeholder="Steven Job" required autofocus>
                                        </div>
                                        @error('pseudo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label form-control-label">Nom :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-sm" type="text" id="name"
                                                name="name" value="{{ old('name', $user->name) }}" required autofocus
                                                autocomplete="name" placeholder="Steven Job">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-lg-3 col-form-label form-control-label">Prenoms
                                            : </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="first_name" name="first_name" type="text"
                                                value="{{ old('first_name', $user->first_name) }}"
                                                placeholder="Steven Job">
                                        </div>
                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-lg-3 col-form-label form-control-label">Email :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="email" name="email" type="email"
                                                value="{{ old('email', $user->email) }}" type="text"
                                                placeholder="stevenjob@gmail.com">
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="pays" class="col-lg-3 col-form-label form-control-label">Pays :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="pays" name="pays"
                                                value="{{ old('pays', $user->pays) }}" type="text"
                                                placeholder="Pays">
                                        </div>
                                        @error('pays')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-3">
                                            <input class="form-control" id="city" name="city"
                                                value="{{ old('city', $user->city) }}" type="text"
                                                placeholder="Ville">
                                            @error('pays')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" id="adress" name="adress"
                                                value="{{ old('adress', $user->adress) }}"
                                                placeholder="Adresse complète (Rue Emile-Pierre Casel)" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-form-label form-control-label">Tel :
                                        </label>
                                        <div class="col-lg-9">
                                            <input id="phone" name="phone"
                                                value="{{ old('phone', $user->phone) }}" type="tel"
                                                placeholder="Tel">
                                        </div>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="date_of_birth" class="col-lg-3 col-form-label form-control-label">
                                            Date de naissance : </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="date_of_birth" name="date_of_birth"
                                                value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->toDateString() : '') }}"
                                                type="date" required autofocus placeholder="Date de naissance">
                                        </div>
                                        @error('date_of_birth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                value="M" @checked($user->sex === 'M')>
                                            <label class="form-check-label" for="sex">Homme</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                value="F" @checked($user->sex === 'F')>
                                            <label class="form-check-label" for="sex">Femme</label>
                                        </div>
                                        <x-input-error class="mt-2" :messages="$errors->get('sex')" />
                                    </div>


                                    {{-- <div
                                        class="box-payment-method mt-20 pt-20 border-top border-bottom mb-20 pb-20 neutral-1000">
                                        <p class="text-lg fw-bold mb-15">Autorisations</p>
                                        <div class="form-check">
                                            <input class="form-check-input" id="accord" type="checkbox"
                                                name="accord" value="1" @checked($user->accord === 1)>
                                            <label class="form-check-label" for="accord">Autorisez la vue public de
                                                vos stats</label>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="bio" :value="__('Biographie')"
                                                class="text-sm-medium neutral-500 mb-10">Biographie : </label>
                                            <textarea id="bio" name="bio" class="form-control" placeholder="Parlez-nous un peu de vous"
                                                rows="6"> {{ old('bio', $user->bio) }}</textarea>
                                            @error('bio')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--<x-input-error class="mt-2" :messages="$errors->get('bio')" /> -->
                                        </div>
                                    </div> --}}

                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important">
                                            Enrégistrer les modifications</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="pdp">
                                <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Changer de profil</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="file" name="image" id="fileInput">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important"> Changer
                                            la photo</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="mdp">
                                <form method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row">
                                        <label for="update_password_current_password"
                                            class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password"
                                                id="update_password_current_password" name="current_password"
                                                placeholder="***************">
                                            @error('current_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password"
                                            class="col-lg-3 col-form-label form-control-label">Nouveau mot de passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" id="update_password_password"
                                                name="password" placeholder="*************">
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password_confirmation"
                                            class="col-lg-3 col-form-label form-control-label">Conformer mot de
                                            passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password"
                                                id="update_password_password_confirmation" name="password_confirmation"
                                                placeholder="*************">
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important"> Changer
                                            le mot de passe</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#phone");
        // window.intlTelInput(input, {
        //     loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
        // });

        const userCountry = "{{ auth()->user()->country_code ?? 'fr' }}";

        intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: (success, failure) => {
                fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => success(data.country_code))
                    .catch(() => failure());
            },
            initialCountry: userCountry.toLowerCase(),
            hiddenInput: (telInputName) => ({
                phone: "phone_full",
                country: "country_code"
            }),
            separateDialCode: true
        });
    </script>



@endsection
