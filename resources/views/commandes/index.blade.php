@extends('base')

@section('title', config('app.name') . ' | Mes commandes')

@section('content')

    <style>
        @media (min-width: 1400px) {
            .container {
                max-width: 2000px !important;
            }
        }

        /* Table réactive pour les mobiles */
        .mobile-table {
            width: 100% !important;
            overflow-x: auto !important;
            display: block !important;
            border-collapse: collapse !important;
            margin-bottom: 1rem !important;
        }

        .mobile-table thead {
            display: none !important;
            /* Cacher l'en-tête sur mobile */
        }

        .mobile-table tbody tr {
            display: flex !important;
            flex-direction: column !important;
            border: 1px solid var(--bs-border-color) !important;
            margin-bottom: 1rem !important;
            border-radius: 8px !important;
            background-color: var(--bs-background-white) !important;
            overflow: hidden !important;
        }

        .mobile-table tbody tr td {
            display: flex !important;
            justify-content: space-between !important;
            padding: 0.5rem 1rem !important;
            font-size: 0.9rem !important;
            color: var(--bs-neutral-500) !important;
        }

        .mobile-table tbody tr td::before {
            content: attr(data-label) !important;
            font-weight: bold !important;
            color: var(--bs-neutral-700) !important;
            margin-right: 1rem !important;
        }

        .mobile-table .btn-action svg {
            fill: var(--bs-neutral-900);
            /* Couleur sombre visible */
            width: 20px;
            /* Taille de l'icône */
            height: 20px;
            /* Taille de l'icône */
        }

        .mobile-table .btn-action {
            background-color: var(--bs-neutral-100);
            /* Couleur de fond */
            border-radius: 50%;
            /* Cercle autour de l'icône */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            /* Taille du bouton */
            height: 30px;
            /* Taille du bouton */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Ombre pour le contraste */
        }

        .table-mybooking .btn-action svg {
            fill: var(--bs-neutral-900);
            /* Couleur sombre visible */
            width: 20px;
            /* Taille de l'icône */
            height: 20px;
            /* Taille de l'icône */
        }

        .table-mybooking .btn-action {
            background-color: var(--bs-neutral-100);
            /* Couleur de fond */
            border-radius: 50%;
            /* Cercle autour de l'icône */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            /* Taille du bouton */
            height: 30px;
            /* Taille du bouton */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Ombre pour le contraste */
        }
    </style>

    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        body,
        td,
        th,
        p {
            color: #333;
            font: 16px/1.6 Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #fdfdfd;
            margin: 0;
            position: relative;
        }

        h2 {
            display: inline-block;
        }

        #review-add-btn {
            padding: 0;
            font-size: 1.6em;
            cursor: pointer;
        }


        #modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            border: 1px solid #666;
            border-radius: 10px;
            opacity: 0;
            transition: all .3s;
            overflow: hidden;
            background-color: #eee;
            /* visibility: hidden; */
            display: none;
        }

        #modal.show {
            opacity: 1;
            display: flex;
        }

        .modal-overlay {
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #000;
            opacity: 0;
            transition: all .3s;
            position: fixed;
            top: 0;
            left: 0;
            display: none;
            margin: 0;
            padding: 0;
        }

        .modal-overlay.show {
            display: block;
            opacity: 0.5;
        }

        #modal .close-btn {
            align-self: flex-end;
            font-size: 1.4em;
            margin: 8px 8px 0;
            padding: 0 8px;
            cursor: pointer;
        }

        form {
            max-width: 900px;
            padding: 0 20px 20px 20px;
        }

        input,
        select,
        .rate,
        textarea,
        button {
            background: #f9f9f9;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            box-shadow: inset 0 1px 1px #e1e1e1;
            font-size: 16px;
            padding: 8px;
        }

        input[type="radio"] {
            box-shadow: none;
        }

        button {
            min-width: 48px;
            min-height: 48px;
        }

        button:hover {
            border: 1px solid #ccc;
            background-color: #fff;
        }

        button#review-add-btn,
        button.close-btn,
        button#submit-review-btn {
            min-height: 40px;
        }

        button#submit-review-btn {
            font-weight: bold;
            cursor: pointer;
            padding: 0 16px;
        }

        .fieldset {
            margin-top: 20px;
        }

        .right {
            align-self: flex-end;
        }

        #review-form-container {
            width: 100%;
            padding: 0 20px 26px;
            color: #333;
            overflow-y: auto;
        }

        #review-form-container h2 {
            margin: 0 0 0 6px;
        }

        #review-form {
            display: flex;
            flex-direction: column;
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
        }

        #review-form label,
        #review-form input {
            display: block;
        }

        #review-form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        #review-form .rate label,
        #review-form .rate input,
        #review-form .rate1 label,
        #review-form .rate1 input {
            display: inline-block;
        }

        .rate {
            height: 36px;
            display: inline-flex;
            flex-direction: row-reverse;
            align-items: flex-start;
            justify-content: flex-end;
        }

        #review-form .rate>label {
            margin-bottom: 0;
            margin-top: -5px;
            height: 30px;
        }

        .rate:not(:checked)>input {
            /* position: absolute; */
            top: -9999px;
            margin-left: -24px;
            width: 20px;
            padding-right: 14px;
            z-index: -10;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate2 {
            float: none;
        }

        .rate:not(:checked)>label::before {
            content: '★ ';
            position: relative;
            top: -10px;
            left: 2px;
        }

        .rate>input:checked~label {
            color: #ffc700;

        }

        .rate>input:checked:focus+label,
        .rate>input:focus+label {
            outline: -webkit-focus-ring-color auto 5px;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        #submit-review {
            align-self: flex-end;
        }
    </style>

    <main class="main">
        <div class="box-content">
            <div class="section-box">
                <div class="container">
                    <div class="box-heading">
                        <div class="box-heading-left">
                            <div class="box-title">
                                <h4 class="neutral-1000 mb-15">Mes commandes</h4>
                            </div>
                            <div class="box-breadcrumb">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li> <a class="icon-home" href="#">Accueil</a></li>
                                        <li><a class="icon-home" href="#">Commandes</a></li>
                                        <li><span>Liste</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">

                        <table class="table table-stripped table-mybooking">
                            <thead>
                                <tr>
                                    <th class="mw-450"><span class="sort">N°</span></th>
                                    <th class="mw-450"><span class="sort">Annonce</span></th>
                                    <th class="mw-145"><span class="sort">Poids</span></th>
                                    <th class="mw-145"><span class="sort">Prix/Kg</span></th>
                                    <th class="mw-145"><span class="sort">Prix total</span></th>
                                    <th class="mw-450"><span class="sort">Client</span></th>
                                    <th class="mw-145"><span class="sort">Status</span></th>
                                    <th class="mw-145"><span class="sort">Date</span></th>
                                    <th class="mw-76">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($commandes as $commande)
                                    <tr>
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->commande_no }}
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->annonce->title }}
                                            </span></td>
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->kg_commande }} kg</span>
                                        </td>
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->price }} €</span></td>
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->total }} €</span></td>
                                        <td> <span class="text-md-medium neutral-500"> {{ $commande->receverUser->name }}
                                                {{ $commande->receverUser->first_name }} </span>
                                        </td>

                                        @if ($commande->status == 'creee')
                                            <td> <span class="btn btn-status"> Créée </span> </td>
                                        @endif
                                        @if ($commande->status == 'accepte')
                                            <td> <span class="btn btn-status"> Acceptée </span> </td>
                                        @endif
                                        @if ($commande->status == 'expediee')
                                            <td> <span class="btn btn-status"> En Transit </span> </td>
                                        @endif
                                        @if ($commande->status == 'refuse')
                                            <td> <span class="btn btn-status pending"> Refusée </span> </td>
                                        @endif
                                        @if ($commande->status == 'annule')
                                            <td> <span class="btn btn-status pending"> Annulée </span> </td>
                                        @endif
                                        @if ($commande->status == 'livree')
                                            <td> <span class="btn btn-status"> Livrée </span> </td>
                                        @endif
                                        @if ($commande->status == 'recue')
                                            <td> <span class="btn btn-status"> Reçue </span> </td>
                                        @endif
                                        @if ($commande->status == 'terminee')
                                            <td> <span class="btn btn-status"> Terminée </span> </td>
                                        @endif
                                        <td> <span class="text-md-medium neutral-500">
                                                {{ $commande->updated_at->translatedFormat('j/m/Y') }}


                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="btn-action" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false" data-bs-display="static">
                                                    <svg width="3" height="14" viewbox="0 0 3 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.25863 11.4676C1.56383 11.4676 1.85652 11.5889 2.07232 11.8047C2.28812 12.0205 2.40936 12.3132 2.40936 12.6184C2.40936 12.9236 2.28812 13.2162 2.07232 13.432C1.85652 13.6478 1.56383 13.7691 1.25863 13.7691C0.953444 13.7691 0.660752 13.6478 0.444949 13.432C0.229147 13.2162 0.10791 12.9236 0.10791 12.6184C0.10791 12.3132 0.229147 12.0205 0.444949 11.8047C0.660752 11.5889 0.953444 11.4676 1.25863 11.4676ZM1.25863 6.09759C1.56383 6.09759 1.85652 6.21882 2.07232 6.43463C2.28812 6.65043 2.40936 6.94312 2.40936 7.24831C2.40936 7.5535 2.28812 7.84619 2.07232 8.062C1.85652 8.2778 1.56383 8.39904 1.25863 8.39904C0.953444 8.39904 0.660752 8.2778 0.444949 8.062C0.229147 7.84619 0.10791 7.5535 0.10791 7.24831C0.10791 6.94312 0.229147 6.65043 0.444949 6.43463C0.660752 6.21882 0.953444 6.09759 1.25863 6.09759ZM1.25863 0.727539C1.56383 0.727539 1.85652 0.848776 2.07232 1.06458C2.28812 1.28038 2.40936 1.57307 2.40936 1.87826C2.40936 2.18345 2.28812 2.47615 2.07232 2.69195C1.85652 2.90775 1.56383 3.02899 1.25863 3.02899C0.953444 3.02899 0.660752 2.90775 0.444949 2.69195C0.229147 2.47615 0.10791 2.18345 0.10791 1.87826C0.10791 1.57307 0.229147 1.28038 0.444949 1.06458C0.660752 0.848776 0.953444 0.727539 1.25863 0.727539Z"
                                                            fill=""></path>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end">

                                                    @if ($commande->creatorUser->id === auth()->user()->id)
                                                        @if ($commande->status == 'creee')
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="annule">
                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Annuler</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                        @if ($commande->status == 'accepte')
                                                         
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="expediee">

                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Expedier</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                             <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="annule">

                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Annuler</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            
                                                        @endif
                                                        @if ($commande->status == 'expediee')
                                                         
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="livree">

                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Livrer</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                             <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="annule">

                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Annuler</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                    
                                                            
                                                        @endif

                                                    @else
                                                        @if ($commande->status == 'creee')
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="accepte">
                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Accepter</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="refuse">
                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Refuser</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                     
                                                        @if ($commande->status == 'expediee' || $commande->status == 'livree')
                                                            <li>
                                                                <form action="{{ route('commandes.update', $commande) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status" value="recue">

                                                                    <button style="all: unset">
                                                                        <a class="dropdown-item">Reçue</a>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    @endif

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr class="col-12">
                                        <td> Aucune commande trouvée </td>
                                    </tr>


                                @endforelse


                            </tbody>
                        </table>

                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $commandes->previousPageUrl() }}"
                                    aria-label="Previous"><span aria-hidden="true">
                                        <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg></span></a></li>


                            @for ($i = 1; $i <= $commandes->lastPage(); $i++)
                                @if ($commandes->currentPage() === $i)
                                    <li class="page-item"><a class="page-link active">{{ $i }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $commandes->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            <li class="page-item"><a class="page-link" href="{{ $commandes->nextPageUrl() }}"
                                    aria-label="Next"><span aria-hidden="true">
                                        <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    {{-- <h2>Add Review</h2> --}}
    <button id="review-add-btn" aria-label="add review" title="Add Review"></button>
    <div id="modal" role="dialog" aria-modal="true" aria-labelledby="add-review-header" class="">
        <button class="close-btn" aria-label="close" title="Close">x</button>
        <div id="review-form-container">
            <h2 id="add-review-header">Notez le voyageur</h2>
            <form action="{{ route('rates.store') }}" method="POST" id="review-form">
                @csrf

                <div class="fieldsett">
                    
                </div>

                <div class="fieldset">
                    <label>Notation</label>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5"
                            onkeydown="navRadioGroup(event)" onfocus="setFocus(event)" required="">
                        <label for="star5" title="5 stars">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4"
                            onkeydown="navRadioGroup(event)">
                        <label for="star4" title="4 stars">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3"
                            onkeydown="navRadioGroup(event)">
                        <label for="star3" title="3 stars">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2"
                            onkeydown="navRadioGroup(event)">
                        <label for="star2" title="2 stars">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1"
                            onkeydown="navRadioGroup(event)" onfocus="setFocus(event)">
                        <label for="star1" title="1 star">1 star</label>
                    </div>
                </div>

                <div class="fieldset">
                    <label for="comment">Laissez un avis</label>
                    <textarea name="comment" id="comment" cols="20" rows="5" required=""></textarea>
                </div>
                <div class="fieldset">
                    <button type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-overlay"></div>

    <script>
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', e => {
                // e.preventDefault(); Désactivez temporairement cette ligne
            });
        });
    </script>
    <script src="{{ asset('assets/js/rating.js') }}"></script>
@endsection
