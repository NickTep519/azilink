<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description"
        content="AZILINK connecte des voyageurs disposant de kilos supplémentaires dans leurs bagages avec des expéditeurs cherchant une solution d’envoi rapide et économique.">
    <meta name="keywords" content="AZILINK, voyage, transport, train, offres, demandes">
    <meta name="author" content="">

    <?php echo $__env->yieldContent('meta'); ?>


    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/imgs/template/favicon.png')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css">

    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/share.css')); ?>">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <style>
        .notif-link.unread {
            background-color: #f0fff2;
        }
    </style>

    <?php echo $__env->yieldContent('style'); ?>

</head>

<body data-user-id="<?php echo e(auth()->id()); ?>">

    <header class="header sticky-bar">
        <div class="container-fluid  background-body">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo"><a class="d-flex" href="<?php echo e(route('home')); ?>"><img class="light-mode"
                                alt="AziLink" width="360" height="80"
                                src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"><img class="dark-mode"
                                alt="AziLink" width="360" height="80"
                                src="<?php echo e(asset('assets/imgs/template/logo-azilink.jpg')); ?>"></a></div>
                    <div class="header-nav">
                        <nav class="nav-main-menu">
                            <ul class="main-menu">
                                <li class="mega-li has-children menu-parent"><a href="<?php echo e(route('offers.index')); ?>">
                                        <span style="color: blue; font-weight: 900">Trajets</span> </a>
                                    <div class="mega-menu menu-child">
                                        <div class="mega-menu-inner">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <p class="text-md-bold mb-10 neutral-1000">Commencez</p>
                                                    <h5 class="mb-45 neutral-1000">La meilleure expérience en gagnant
                                                        avec vos espaces bagages libres et en sécurisant vos colis
                                                        confiés.</h5>
                                                        <?php if(auth()->guard()->guest()): ?>
                                                        <a class="btn btn-brand-secondary btn-signin"
                                                        href="#">Connectez-vous
                                                        <svg width="16" height="16" viewbox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8 15L15 8L8 1M15 8L1 8" stroke="black"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"> </path>
                                                        </svg>
                                                        </a>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="card-home-link background-body"> <a class="card-icon"
                                                            href="<?php echo e(route('offers.index')); ?>"> <img
                                                                src="<?php echo e(asset('assets/imgs/template/icons/activity.svg')); ?>"
                                                                alt="AziLink"></a>
                                                        <div class="card-info"> <a href="<?php echo e(route('offers.index')); ?>">
                                                                <h6 class="text-md-bold">Les Offres</h6>
                                                            </a>
                                                            <p class="text-xs-medium neutral-500">Découvrez les trajets
                                                                disponibles pour expédier vos colis facilement.</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-home-link background-body"> <a class="card-icon"
                                                            href="<?php echo e(route('requests.index')); ?>"> <img
                                                                src="<?php echo e(asset('assets/imgs/template/icons/map.svg')); ?>"
                                                                alt="AziLink"></a>
                                                        <div class="card-info"> <a
                                                                href="<?php echo e(route('requests.index')); ?>">
                                                                <h6 class="text-md-bold">Les Demandes</h6>
                                                            </a>
                                                            <p class="text-xs-medium neutral-500">Découvrez les
                                                                demandes de trajets et monétisez vos espaces de bagages
                                                                libres.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <div class="col-lg-3">
                                                        <ul class="list-featured">
                                                            <li><a class="destinations"
                                                                    href="<?php echo e(route('annonces.create')); ?>">01. Publiez un
                                                                    trajet</a></li>
                                                            <li><a class="tickets"
                                                                    href="<?php echo e(route('annonces.liste')); ?>">02. Mes
                                                                    Trajets</a></li>
                                                            <li><a class="tours" href="#">03. Mes Trajets
                                                                    Archivés</a></li>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"> Blog</a> </li>
                                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                <?php if(auth()->guard()->check()): ?>
                                    <li><a href="<?php echo e(route('messenger.base')); ?>">Messages</a></li>
                                    <li><a href="<?php echo e(route('profile.edit')); ?>">Paramètre</a></li>
                                <?php endif; ?>
                            </ul>

                        </nav>
                    </div>
                </div>


                <div class="header-right">
                    

                    <?php if(auth()->guard()->check()): ?>

                        <div class="dropdown d-inline-block mr-25">
                            <button id="enableSoundBtn" style="all:unset ; cursor: pointer"></button>
                            <span class="badge-notify" id="notifCount"></span>
                            <a class="btn btn-notify position-relative" id="dropdownNotify" type="button"
                                style="color: black" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-display="static">

                                <svg width="20" height="24" viewbox="0 0 20 24" fill="black"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.81336 9.69212C2.05799 7.61607 3.05152 5.70775 4.61158 4.31725C4.92067 4.04149 4.94776 3.56761 4.67237 3.25816C4.39661 2.94871 3.92274 2.92162 3.61329 3.19738C1.77637 4.83471 0.60743 7.08287 0.322513 9.52807C0.31922 9.55699 0.317383 9.58593 0.317383 9.61486V9.62254C0.317383 10.0367 0.653195 10.3689 1.06738 10.3689C1.45558 10.3689 1.77491 10.0704 1.81336 9.69212Z"
                                        ill=""></path>
                                    <path
                                        d="M19.7013 9.53392C19.4494 7.12241 18.2601 4.72877 16.4036 3.14867C16.0882 2.88023 15.6147 2.91869 15.3463 3.23399C15.0779 3.5493 15.116 4.02281 15.4316 4.29124C16.9919 5.61806 18.0014 7.58135 18.2049 9.61485C18.2049 10.029 18.5408 10.3648 18.9549 10.3649C19.3794 10.3649 19.7461 9.96292 19.7013 9.53392Z"
                                        fill=""></path>
                                    <path
                                        d="M18.1336 17.2218C17.2283 15.6383 16.75 13.8369 16.75 12.0124C16.75 12.0124 16.75 10.5011 16.75 10.5C16.75 7.58985 14.7483 4.90612 11.9741 4.05693C12.1444 3.74034 12.25 3.38402 12.25 3C12.25 1.75927 11.2408 0.75 10 0.75C8.7593 0.75 7.75003 1.75927 7.75003 3C7.75003 3.38425 7.85582 3.74075 8.02629 4.05748C5.25586 4.93186 3.25003 7.60927 3.25003 10.7303V12.0124C3.25003 13.8369 2.77175 15.6383 1.86612 17.2222C1.38161 18.0695 1.10258 18.9553 1.63871 19.879C2.04556 20.5811 2.77322 21 3.58475 21H7.00003C7.00003 22.6542 8.34585 24 10 24C11.6542 24 13 22.6542 13 21H16.4153C17.2268 21 17.9545 20.5811 18.3613 19.879C18.8792 18.9856 18.6115 18.0588 18.1336 17.2218ZM10 2.25C10.4135 2.25 10.75 2.58655 10.75 3C10.75 3.41345 10.4135 3.75 10 3.75C9.58658 3.75 9.25003 3.41345 9.25003 3C9.25003 2.58655 9.58658 2.25 10 2.25ZM10 22.5C9.17276 22.5 8.50003 21.8273 8.50003 21H11.5C11.5 21.8273 10.8273 22.5 10 22.5ZM17.0642 19.1265C16.999 19.2385 16.8053 19.5 16.4153 19.5H3.58475C3.19479 19.5 3.00106 19.2386 2.93585 19.1265C2.69871 18.7189 2.96626 18.321 3.16873 17.9659C4.20328 16.1565 4.75003 14.0977 4.75003 12.0124C4.75003 12.0124 4.75003 10.731 4.75003 10.7303C4.75003 7.89772 7.07082 5.25041 9.99155 5.25037C12.8215 5.25033 15.25 7.67938 15.25 10.5V12.0124C15.25 14.0976 15.7968 16.1564 16.8309 17.9655C17.0413 18.3336 17.3076 18.7044 17.0642 19.1265Z"
                                        fill=""></path>
                                </svg>
                                
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end notif-list"
                                aria-labelledby="dropdownNotify" id="notifList">
                                <li class="notif-item text-center text-muted">Chargement...</li>
                            </ul>
                        </div>

                    <?php endif; ?>


                    <div class="d-xxl-inline-block">
                        
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('login')); ?>" title="Se Connecter"> <img width="30" height="30"
                                    src="<?php echo e(asset('assets/imgs/template/user-login.svg')); ?>"
                                    alt="AZILINK connexion" /></a>
                        <?php endif; ?>
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="burger-icon-2 burger-icon-white"><img
                                src="<?php echo e(asset('assets/imgs/template/icons/menu.svg')); ?>" alt="AziLink"></div>
                    <?php endif; ?>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>

                </div>
            </div>
        </div>
    </header>

    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar button-bg-2">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-logo"> <a class="d-flex" href=""><img class="light-mode"
                        alt="AziLink" src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"><img
                        class="dark-mode" alt="AziLink"
                        src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"></a>
                <div class="burger-icon burger-icon-white"></div>
            </div>
            <div class="mobile-header-top">
                <div class="box-author-profile">
                    <?php if(auth()->guard()->check()): ?>
                        <div class="card-author">
                            <div class="card-image"> <img src="<?php echo e(asset('storage/' . auth()->user()->image)); ?>"
                                    alt="AziLink"></div>
                            <div class="card-info">
                                <p class="text-md-bold neutral-1000"> <?php echo e(auth()->user()->pseudo); ?>

                                    <a href="<?php echo e(route('users.details', auth()->user()->slug)); ?>" style="all: unset"> @
                                        <?php echo e(auth()->user()->pseudo); ?></a>
                                </p>
                                <p class="text-xs neutral-1000">Membre depuis
                                    <?php echo e(auth()->user()->created_at->translatedFormat('M Y')); ?> </p>
                            </div>
                        </div>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button
                                style="background: none; border: none; padding-left: 12px; font: inherit; color: inherit;">
                                Déconnexion </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-menu-wrap mobile-header-border">
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children"><a class="active" href="#"> <span
                                            style="color: blue">Trajets</span></a>
                                    <ul class="sub-menu">
                                        <?php if(auth()->guard()->check()): ?>
                                            <li><a class="destinations" href="<?php echo e(route('annonces.create')); ?>">01. Publiez
                                                    un trajet</a></li>
                                            <li><a class="tickets" href="<?php echo e(route('annonces.liste')); ?>">02. Mes
                                                    Trajets</a></li>
                                            <li><a class="tours" href="#">03. Mes Trajets Archivés</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo e(route('offers.index')); ?>">Offres</a></li>
                                        <li><a href="<?php echo e(route('requests.index')); ?>">Demande</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Blog</a></li>

                                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                <?php if(auth()->guard()->check()): ?>
                                    <li><a href="<?php echo e(route('messenger.base')); ?>">Messages</a></li>
                                    <li><a href="<?php echo e(route('profile.edit')); ?>">Paramètre</a></li>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(auth()->guard()->check()): ?>
        <div class="sidebar-canvas-wrapper perfect-scrollbar button-bg-2">
            <div class="sidebar-canvas-container">
                <div class="sidebar-canvas-head">
                    <div class="sidebar-canvas-logo"> <a class="d-flex" href=""><img class="light-mode"
                                alt="AziLink" src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"><img
                                class="dark-mode" alt="AziLink"
                                src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"></a></div>
                    <div class="sidebar-canvas-lang">
                        <a class="close-canvas" href="#"> <img alt="AziLink"
                                src="<?php echo e(asset('assets/imgs/template/icons/close.png')); ?>"></a>
                    </div>
                </div>
                <div class="sidebar-canvas-content">
                    <div class="box-author-profile">
                        <div class="card-author">
                            <div class="card-image"> <img src="<?php echo e(asset('storage/' . auth()->user()->image)); ?>"
                                    alt="<?php echo e(auth()->user()->name); ?>"></div>
                            <div class="card-info">
                                <p class="text-md-bold neutral-1000"> <a
                                        href="<?php echo e(route('users.details', auth()->user()->slug)); ?>" style="all: unset">
                                        <?php echo e(auth()->user()->pseudo); ?> <?php echo e(auth()->user()->profileBadge()); ?> </a> </p>
                                <p class="text-xs neutral-1000"> Membre depuis
                                    <?php echo e(auth()->user()->created_at->translatedFormat('M Y')); ?> </p>
                            </div>
                        </div>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-black"> Déconnexion </button>
                        </form>
                    </div>
                    <div class="box-quicklinks">
                        <h6 class="title-quicklinks neutral-1000">Menu Utilisateur</h6>
                        <div class="box-list-quicklinks">
                            <div class="item-quicklinks">
                                <div class="item-icon"> <img src="<?php echo e(asset('assets/imgs/template/icons/notify.svg')); ?>"
                                        alt="AziLink"></div>
                                <div class="item-info"> <a href="<?php echo e(route('annonces.create')); ?>">
                                        <h6 class="text-md-bold neutral-1000">Publier un trajet</h6>
                                    </a>
                                    <p class="text-xs neutral-500">Créer vos trajets en toute simplicité</p>
                                </div>
                            </div>
                            <div class="item-quicklinks">
                                <div class="item-icon"> <img src="<?php echo e(asset('assets/imgs/template/icons/tickets.svg')); ?>"
                                        alt="AziLink"></div>
                                <div class="item-info"> <a href="<?php echo e(route('annonces.liste')); ?>">
                                        <h6 class="text-md-bold neutral-1000">Mes Trajets</h6>
                                    </a>
                                    <p class="text-xs neutral-500">Voir, Modifier et Archiver vos trajets</p>
                                </div>
                            </div>
                            <div class="item-quicklinks">
                                <div class="item-icon"> <img
                                        src="<?php echo e(asset('dash/assets/imgs/template/icons/message.svg')); ?>" alt="AziLink">
                                </div>
                                <div class="item-info"> <a href="<?php echo e(route('messenger.base')); ?>">
                                        <h6 class="text-md-bold neutral-1000">Messages</h6>
                                    </a>
                                    <p class="text-xs neutral-500">Converser avec d'autre utilisateur</p>
                                </div>
                            </div>
                            <div class="item-quicklinks">
                                <div class="item-icon"> <img src="<?php echo e(asset('assets/imgs/template/icons/settings.svg')); ?>"
                                        alt="AziLink"></div>
                                <div class="item-info"> <a href="<?php echo e(route('commandes.index')); ?>">
                                        <h6 class="text-md-bold neutral-1000">Mes Commandes</h6>
                                    </a>
                                    <p class="text-xs neutral-500">Voir, Modifier vos commandes</p>
                                </div>
                            </div>
                            <div class="item-quicklinks">
                                <div class="item-icon"> <img src="<?php echo e(asset('assets/imgs/template/icons/settings.svg')); ?>"
                                        alt="AziLink"></div>
                                <div class="item-info"> <a href="<?php echo e(route('profile.edit')); ?>">
                                        <h6 class="text-md-bold neutral-1000">Paramètres</h6>
                                    </a>
                                    <p class="text-xs neutral-500">Paramètres de compte</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('warning')): ?>
        <div class="alert alert-warning">
            <?php echo e(session('warning')); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>


    <footer class="footer footer-type-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="mb-20"><a class="d-inline-block mb-20" href="<?php echo e(route('home')); ?>"><img
                                alt="AziLink" width="220" height="60"
                                src="<?php echo e(asset('assets/imgs/template/logo-footer.png')); ?>"></a>
                        <div class="box-info-contact mt-0">
                            <p class="text-md color-white"><?php echo e(config('app.name')); ?> connecte des voyageurs disposant
                                de kilos supplémentaires dans leurs bagages avec des expéditeurs cherchant une solution
                                d’envoi rapide et économique.</p>
                            <p class="text-md neutral-400 icon-address">Partout dans le monde</p>
                            <p class="text-md neutral-400 icon-worktime">24h sur 24, 7 jours sur 7</p>
                            <p class="text-md neutral-400 icon-email">Nous contacter</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-30">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h6>Commencer</h6>
                            <ul class="menu-footer">
                                <?php if(auth()->guard()->guest()): ?>
                                <li><a href="<?php echo e(route('login')); ?>">Se Connecter</a></li>
                                <li><a href="<?php echo e(route('register')); ?>">S'inscrire</a></li>
                                <li><a class="btn-signin" href="">Créer une demande</a></li>
                                <?php endif; ?>
                                <li><a href="">Créer une offre</a></li>
                                <li><a href=""> Trouver un annonce </a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h6>Services</h6>
                            <ul class="menu-footer">
                                <li><a href="<?php echo e(route('offers.index')); ?>">Offres</a></li>
                                <li><a href="<?php echo e(route('requests.index')); ?>">Demandes</a></li>
                                <li><a href="">Blogs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-30">
                    <p class="text-lg neutral-0 mb-15">Newsletter</p>
                    <div class="d-flex align-items-center">
                        <form action="<?php echo e(route('newsletters.subscriber')); ?>" method="POST"
                            class="form-newsletter form-newsletter-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <input class="form-control" type="text" name="email"
                                placeholder="Entrez votre email">
                            <input class="btn btn-brand-secondary w-100 justify-content-center" type="submit"
                                value="Souscrire">
                            <?php if(isset($errors)): ?>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"> <?php echo e($message); ?> </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt-50">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center mb-20">
                        <p class="text-sm color-white">© 2024 <?php echo e(config('app.name')); ?> Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="popup-signin">
        <div class="popup-container">
            <div class="popup-content"> <a class="close-popup-signin"></a>
                <div class="d-flex gap-2 align-items-center"><a href=""><img
                            src="<?php echo e(asset('assets/imgs/template/popup/logo.svg')); ?>" alt="AziLink"></a>
                    <h4 class="neutral-1000">Bonjour !</h4>
                </div>

                <div class="box-button-logins">
                    <!-- Session Status -->
                    <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
                </div>

                <div class="form-login">
                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" :value="__('Email')" class="text-sm-medium">Email</label>
                            <input type="email" id="email" name="email" :value="old('email')" required
                                autofocus autocomplete="username" class="form-control email">

                        </div>


                        <!-- Password -->

                        <div class="form-group">
                            <label for="password" :value="__('Password')" class="text-sm-medium">Mot de passe</label>
                            <input type="password" id="password" name="password" required
                                autocomplete="current-password" class="form-control password" placeholder="">

                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <div class="box-remember-forgot">
                                <div class="remeber-me">
                                    <label for="remember_me" class="text-xs-medium neutral-500">
                                        <input type="checkbox" id="remember_me" name="remember"
                                            class="cb-remember">Se souvenir de moi
                                    </label>
                                </div>

                                <div class="forgotpass">
                                    <?php if(Route::has('password.request')): ?>
                                        <a class="text-xs-medium neutral-500"
                                            href="<?php echo e(route('password.request')); ?>">Mot de passe oublié ?</a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <div class="form-group mt-45 mb-30">
                            <a class="btn btn-black-lg" href=""> <button style="all: unset">Se Connecter
                                </button>
                                <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></a>
                        </div>
                        <p class="text-sm-medium neutral-500">Vous n'avez pas de compte ? <a class="neutral-1000"
                                href="<?php echo e(route('register')); ?>">Inscrivez-vous ici !</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {
            "default_language": "fr",
            "native_language_names": true,
            "detect_browser_language": true,
            "languages": ["fr", "en", "es", "de", "it"],
            "wrapper_selector": ".gtranslate_wrapper",
            "flag_style": "3d"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <!--gestion des mots de pass-->
    <script>
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;

            // Critères de validation
            const lengthCriteria = password.length >= 8;
            const uppercaseCriteria = /[A-Z]/.test(password);
            const lowercaseCriteria = /[a-z]/.test(password);
            const numberCriteria = /[0-9]/.test(password);
            const specialCriteria = /[@#$%^&*()!~_+={}:;'"<> ?,./]/.test(password);

            // Mise à jour des classes
            document.getElementById('length').className = lengthCriteria ? 'valid' : 'invalid';
            document.getElementById('uppercase').className = uppercaseCriteria ? 'valid' : 'invalid';
            document.getElementById('lowercase').className = lowercaseCriteria ? 'valid' : 'invalid';
            document.getElementById('number').className = numberCriteria ? 'valid' : 'invalid';
            document.getElementById('special').className = specialCriteria ? 'valid' : 'invalid';
        });
    </script>




    <style>
        .menu-child {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 10px;
        }

        .menu-parent {
            position: relative;
            display: inline-block;
        }
    </style>

    <script>
        document.querySelectorAll('.menu-parent').forEach(parent => {
            const child = parent.querySelector('.menu-child');

            let timeout;

            parent.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
                child.style.display = 'block';
            });

            parent.addEventListener('mouseleave', () => {
                timeout = setTimeout(() => {
                    child.style.display = 'none';
                }, 300); // Délai de 300 ms avant disparition
            });
        });
    </script>





    <!--chat-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/js/chat.js')); ?>"></script>

    <script src="<?php echo e(asset('dash/assets/js/plugins/armcharts5-script.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/charts/Animated.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/charts/xy.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/charts/index.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/jquery.circliful.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/plugins/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dash/assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>

    <!--Vendors Scripts-->
    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <!--Other-->
    <script src="<?php echo e(asset('assets/js/plugins/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.carouselTicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/masonry.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/scrollup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/dark.js')); ?>"></script>
    <!-- Count down-->
    <script src="<?php echo e(asset('assets/js/vendor/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/noUISlider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slider.js')); ?>"></script>
    <!--Custom script for this template-->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/search.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
    </script>
    <script>
        const offersUrl = "<?php echo e(route('offers.index')); ?>";
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdown = new bootstrap.Dropdown(document.getElementById("dropdownNotify"));
        });
    </script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/notification.js'); ?>

</body>

</html>
<?php /**PATH D:\projets\azilink\resources\views/base.blade.php ENDPATH**/ ?>