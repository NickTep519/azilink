<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">

    <title>Messenger - 2.2.0</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="messenger_assets/img/favicon/favicon.ico" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Template CSS -->
    <link class="css-lt" rel="stylesheet" href="messenger_assets/css/template.bundle.css"
        media="(prefers-color-scheme: light)">
    <link class="css-dk" rel="stylesheet" href="messenger_assets/css/template.dark.bundle.css"
        media="(prefers-color-scheme: dark)">

    <!-- Theme mode -->
    <script>
        if (localStorage.getItem('color-scheme')) {
            let scheme = localStorage.getItem('color-scheme');

            const LTCSS = document.querySelectorAll('link[class=css-lt]');
            const DKCSS = document.querySelectorAll('link[class=css-dk]');

            [...LTCSS].forEach((link) => {
                link.media = (scheme === 'light') ? 'all' : 'not all';
            });

            [...DKCSS].forEach((link) => {
                link.media = (scheme === 'dark') ? 'all' : 'not all';
            });
        }
    </script>
</head>

<body data-user-id="{{ auth()->id() }}">


    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
        <!-- Container wrapper -->
        <div class="container-fluid">

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                {{-- <div class="me-5" style="margin-right: 5rem;">
                    <a class="navbar-brand p-0 m-0"" href="#">
                        <img width="200" height="80" src="{{ asset('assets/imgs/template/logo-footer.png') }}"
                            alt="MDB Logo" loading="lazy" />
                    </a>
                </div> --}}

                <!-- Left links -->
                {{-- <ul class="navbar-nav me-auto lg-0">
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#"
                            id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            Trajets
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Les Offres</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Les Demandes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Paramètre</a>
                    </li>

                </ul> --}}
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- Layout -->
    <div class="layout overflow-hidden">
        <!-- Navigation -->
        <nav class="navigation d-flex flex-column text-center navbar navbar-light hide-scrollbar">
            <!-- Brand -->
            {{-- <a href="#" title="Messenger" class="d-none d-xl-block mb-6">
                <svg version="1.1" width="46px" height="46px" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46"
                    enable-background="new 0 0 46 46" xml:space="preserve">
                    <polygon opacity="0.7" points="45,11 36,11 35.5,1 " />
                    <polygon points="35.5,1 25.4,14.1 39,21 " />
                    <polygon opacity="0.4" points="17,9.8 39,21 17,26 " />
                    <polygon opacity="0.7" points="2,12 17,26 17,9.8 " />
                    <polygon opacity="0.7" points="17,26 39,21 28,36 " />
                    <polygon points="28,36 4.5,44 17,26 " />
                    <polygon points="17,26 1,26 10.8,20.1 " />
                </svg>

            </a> --}}

            <!-- Nav items -->
            <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center align-items-center w-100 py-4 py-lg-2 px-lg-3"
                role="tablist">
                <!-- Invisible item to center nav vertically -->
                {{-- <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                    <a class="nav-link py-0 py-lg-8" href="#" title="">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- New chat -->
                {{-- <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-create-chat" href="#tab-content-create-chat"
                        title="Create chat" data-bs-toggle="tab" role="tab">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Friends -->
                {{-- <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends"
                        title="Friends" data-bs-toggle="tab" role="tab">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Chats -->
                <li class="nav-item">
                    <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats"
                        data-bs-toggle="tab" role="tab">
                        <div class="icon icon-xl icon-badged">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-message-square">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <div class="badge badge-circle bg-primary">
                                <span>{{ $totalUnread }}</span>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- Notification -->
                {{-- <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-notifications"
                        href="#tab-content-notifications" title="Notifications" data-bs-toggle="tab"
                        role="tab">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Support -->
                {{-- <li class="nav-item d-none d-xl-block flex-xl-grow-1">
                    <a class="nav-link py-0 py-lg-8" id="tab-support" href="#tab-content-support"
                        title="Support" data-bs-toggle="tab" role="tab">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                </rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Switcher -->
                {{-- <li class="nav-item d-none d-xl-block">
                    <a class="switcher-btn nav-link py-0 py-lg-8" href="#" title="Themes">
                        <div class="switcher-icon switcher-icon-dark icon icon-xl d-none" data-theme-mode="dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                        </div>
                        <div class="switcher-icon switcher-icon-light icon icon-xl d-none" data-theme-mode="light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun">
                                <circle cx="12" cy="12" r="5"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Settings -->
                {{-- <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-settings" href="#tab-content-settings"
                        title="Settings" data-bs-toggle="tab" role="tab">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                        </div>
                    </a>
                </li> --}}

                <!-- Profile -->
                {{-- <li class="nav-item d-none d-xl-block">
                    <a href="#" class="nav-link p-0 mt-lg-2" data-bs-toggle="modal"
                        data-bs-target="#modal-profile">
                        <div class="avatar avatar-online mx-auto">
                            <img class="avatar-img" src="messenger_assets/img/avatars/1.jpg" alt="">
                        </div>
                    </a>
                </li> --}}
            </ul>
        </nav>

        <!-- Navigation -->

        <!-- Sidebar -->
        <aside class="sidebar bg-light">
            <div class="tab-content h-100" role="tablist">

                <!-- Chats -->
                <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
                    <div class="d-flex flex-column h-100 position-relative">
                        <div class="hide-scrollbar">

                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Chats</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0"
                                                placeholder="Rechercher une conversation..." id="searchConversations"
                                                aria-label="Rechercher une conversation...">
                                        </div>
                                    </form>
                                </div>

                                <!-- Chats -->
                                <div class="card-list">
                                    <!-- Card -->
                                    {{-- <a href="#" class="card border-0 text-reset">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online">
                                                        <img src="messenger_assets/img/avatars/7.jpg" alt="#"
                                                            class="avatar-img">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">William Wright</h5>
                                                        <span class="text-muted extra-small ms-2">12:45 PM</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            Hello! Yeah, I'm going to meet my friend of mine at the
                                                            departments stores now.
                                                        </div>

                                                        <div class="badge badge-circle bg-primary ms-5">
                                                            <span>3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->

                                        <div class="card-footer">
                                            <div class="row align-items-center gx-4">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/bootstrap.svg"
                                                            alt="Bootstrap Community">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <h6 class="mb-0">Bootstrap Community</h6>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar-group">
                                                        <div class="avatar avatar-xs">
                                                            <img src="messenger_assets/img/avatars/12.jpg"
                                                                alt="#" class="avatar-img">
                                                        </div>

                                                        <div class="avatar avatar-xs">
                                                            <img src="messenger_assets/img/avatars/11.jpg"
                                                                alt="#" class="avatar-img">
                                                        </div>

                                                        <div class="avatar avatar-xs">
                                                            <img src="messenger_assets/img/avatars/9.jpg"
                                                                alt="#" class="avatar-img">
                                                        </div>

                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-text">+5</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .row -->
                                        </div><!-- .card-footer -->
                                    </a> --}}
                                    <!-- Card -->

                                    @forelse ($conversations as $conversation)
                                        <!-- Card -->
                                        <div id="conversation-list">
                                            <a href="#" style="all: unset;" class="card border-0 text-reset conversation-item"
                                                id="loadConversation"
                                                data-id="{{ $conversation->id }}" 
                                                data-url="{{ route('messenger.index', $conversation->id) }}"
                                                data-conversation-id="{{ $conversation->id }}">

                                                <div class="card-body" id="conversation-{{ $conversation->id }}">
                                                    <div class="row gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">
                                                                
                                                                <img src="/storage/{{ $conversation->users->except(auth()->id())->first()->image }}"
                                                                    alt="#" class="avatar-img">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <h5 class="me-auto mb-0">
                                                                    {{ $conversation->users->except(auth()->id())->pluck('pseudo')->join(', ') }} |
                                                                {{-- <a href="{{ $conversation->annonce->type ? route('offers.show', [$conversation->annonce->slug(), $conversation->annonce]) : route('requests.show', [$conversation->annonce->slug(), $conversation->annonce]) }}" style="all: unset" >{!! Str::limit($conversation->annonce->title, 40) !!}</a> --}}
                                                                </h5>
                                                                <span class="text-muted extra-small ms-2">
                                                                    {{ $conversation->messages->last()->created_at->translatedFormat('H:i') }}
                                                                </span>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="line-clamp me-auto"
                                                                    id="last-message-{{ $conversation->id }}">
                                                                    {{-- {{ optional($conversation->messages->last())->content }} --}}
                                                                    {!! Str::limit(optional($conversation->messages->last())->content, 90) !!}
                                                                </div>

                                                                @if ($conversation->unread_messages_count > 0)
                                                                    <div class="badge badge-circle bg-primary ms-5"
                                                                        id="unread-count-{{ $conversation->id }}">
                                                                        <span>
                                                                            {{ $conversation->unread_messages_count }}
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-body -->
                                            </a>
                                        </div>
                                        <!-- Card -->
                                    @empty
                                    @endforelse

                                    <!-- Card -->
                                    {{-- <a href="chat-empty.html" class="card border-0 text-reset">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online">
                                                        <img src="messenger_assets/img/avatars/8.jpg" alt="#"
                                                            class="avatar-img">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">Elise Dennis</h5>
                                                        <span class="text-muted extra-small ms-2">08:35 PM</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            is typing<span
                                                                class='typing-dots'><span>.</span><span>.</span><span>.</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->
                                    </a> --}}
                                    <!-- Card -->

                                    <!-- Card -->
                                    {{-- <a href="#" class="card border-0 text-reset">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar-group-trigon avatar-group-trigon-sm">
                                                        <div class="avatar avatar-sm">
                                                            <img class="avatar-img"
                                                                src="messenger_assets/img/avatars/7.jpg"
                                                                alt="#">
                                                        </div>

                                                        <div class="avatar avatar-sm">
                                                            <img class="avatar-img"
                                                                src="messenger_assets/img/avatars/9.jpg"
                                                                alt="#">
                                                        </div>

                                                        <div class="avatar avatar-sm">
                                                            <span class="avatar-text bg-primary">D</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">Don Knight</h5>
                                                        <span class="text-muted extra-small ms-2">08:35 PM</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            I'm going to meet my friend of mine at the departments
                                                            stores as soon as possible.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->
                                    </a> --}}
                                    <!-- Card -->

                                    <!-- Card -->
                                    {{-- <a href="#" class="card border-0 text-reset">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online">
                                                        <span class="avatar-text">M</span>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">Marshall Wallaker</h5>
                                                        <span class="text-muted extra-small ms-2">12:18 PM</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            Hello! Yeah, I'm going to meet my friend of mine at the
                                                            departments stores as soon as possible.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->
                                    </a> --}}
                                    <!-- Card -->
                                </div>
                                <!-- Chats -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Create -->
                {{-- <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">

                            <div class="container py-8">

                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Create chat</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <div class="mb-5">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-search">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65"
                                                                y2="16.65"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0"
                                                    placeholder="Search messages or users"
                                                    aria-label="Search for messages or users...">
                                            </div>
                                        </form>
                                    </div>

                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="pill"
                                                href="#create-chat-info" role="tab"
                                                aria-controls="create-chat-info" aria-selected="true">
                                                Details
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill"
                                                href="#create-chat-members" role="tab"
                                                aria-controls="create-chat-members" aria-selected="true">
                                                People
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tabs content -->
                                <div class="tab-content" role="tablist">
                                    <div class="tab-pane fade show active" id="create-chat-info" role="tabpanel">

                                        <div class="card border-0">
                                            <div class="profile">
                                                <div class="profile-img text-primary rounded-top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 400 140.74">
                                                        <defs>
                                                            <style>
                                                                .cls-2 {
                                                                    fill: #fff;
                                                                    opacity: 0.1;
                                                                }
                                                            </style>
                                                        </defs>
                                                        <g>
                                                            <g>
                                                                <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                                                <path class="cls-2"
                                                                    d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                                                <path class="cls-2"
                                                                    d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                                                <circle class="cls-2" cx="94.5" cy="57.5"
                                                                    r="22.5" />
                                                                <path class="cls-2"
                                                                    d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>

                                                <div class="profile-body p-0">
                                                    <div class="avatar avatar-lg">
                                                        <span class="avatar-text bg-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-image">
                                                                <rect x="3" y="3" width="18" height="18"
                                                                    rx="2" ry="2"></rect>
                                                                <circle cx="8.5" cy="8.5" r="1.5">
                                                                </circle>
                                                                <polyline points="21 15 16 10 5 21"></polyline>
                                                            </svg>
                                                        </span>

                                                        <div
                                                            class="badge badge-lg badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12"
                                                                    y2="19"></line>
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                            </svg>
                                                        </div>

                                                        <input id="upload-chat-img" class="d-none" type="file">
                                                        <label class="stretched-label mb-0"
                                                            for="upload-chat-img"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <form autocomplete="off">
                                                    <div class="row gy-6">
                                                        <div class="col-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="floatingInput"
                                                                    placeholder="Enter a chat name">
                                                                <label for="floatingInput">Enter group name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea" rows="8" data-autosize="true"
                                                                    style="min-height: 100px;"></textarea>
                                                                <label for="floatingTextarea">What's your
                                                                    purpose?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mt-4 px-6">
                                            <small class="text-muted me-auto">Enter chat name and add an optional
                                                photo.</small>
                                        </div>

                                        <!-- Options -->
                                        <div class="mt-8">
                                            <div class="d-flex align-items-center mb-4 px-6">
                                                <small class="text-muted me-auto">Options</small>
                                            </div>

                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row gx-5">
                                                        <div class="col-auto">
                                                            <div class="btn btn-sm btn-icon btn-dark">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-lock">
                                                                    <rect x="3" y="11" width="18" height="11"
                                                                        rx="2" ry="2"></rect>
                                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Make Private</h5>
                                                            <p>Can only be viewed by invites</p>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            <div class="form-check form-switch ps-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="new-chat-options-1">
                                                                <label class="form-check-label"
                                                                    for="new-chat-options-1"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Members -->
                                    <div class="tab-pane fade" id="create-chat-members" role="tabpanel">
                                        <nav>
                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">B</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar ">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/6.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Bill Marrow</h5>
                                                            <p>last seen 3 days ago</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-1">
                                                                <label class="form-check-label"
                                                                    for="id-member-1"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-1"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->

                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">D</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar ">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/5.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Damian Binder</h5>
                                                            <p>last seen within a week</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-2">
                                                                <label class="form-check-label"
                                                                    for="id-member-2"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-2"></label>
                                                </div>
                                            </div>
                                            <!-- Card --><!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">


                                                                <span class="avatar-text">D</span>

                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Don Knight</h5>
                                                            <p>online</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-3">
                                                                <label class="form-check-label"
                                                                    for="id-member-3"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-3"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->

                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">E</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/8.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Elise Dennis</h5>
                                                            <p>online</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-4">
                                                                <label class="form-check-label"
                                                                    for="id-member-4"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-4"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->

                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">M</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar ">


                                                                <span class="avatar-text">M</span>

                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Marshall Wallaker</h5>
                                                            <p>last seen within a month</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-6">
                                                                <label class="form-check-label"
                                                                    for="id-member-6"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-6"></label>
                                                </div>
                                            </div>
                                            <!-- Card --><!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar ">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/11.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Mila White</h5>
                                                            <p>last seen a long time ago</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-5">
                                                                <label class="form-check-label"
                                                                    for="id-member-5"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-5"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->

                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">O</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">


                                                                <span class="avatar-text">O</span>

                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Ollie Chandler</h5>
                                                            <p>online</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-7">
                                                                <label class="form-check-label"
                                                                    for="id-member-7"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-7"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->

                                            <div class="my-5">
                                                <small class="text-uppercase text-muted">W</small>
                                            </div>

                                            <!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar ">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/4.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>Warren White</h5>
                                                            <p>last seen recently</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-8">
                                                                <label class="form-check-label"
                                                                    for="id-member-8"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-8"></label>
                                                </div>
                                            </div>
                                            <!-- Card --><!-- Card -->
                                            <div class="card border-0 mt-5">
                                                <div class="card-body">

                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">

                                                                <img class="avatar-img"
                                                                    src="messenger_assets/img/avatars/7.jpg"
                                                                    alt="">


                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5>William Wright</h5>
                                                            <p>online</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="id-member-9">
                                                                <label class="form-check-label"
                                                                    for="id-member-9"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="stretched-label" for="id-member-9"></label>
                                                </div>
                                            </div>
                                            <!-- Card -->
                                        </nav>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="container mt-n4 mb-8 position-relative">
                            <button class="btn btn-lg btn-primary w-100 d-flex align-items-center" type="button">
                                Start chat
                                <span class="icon ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <!-- Button -->
                    </div>
                </div> --}}

                <!-- Friends -->
                {{-- <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">

                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Friends</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0"
                                                placeholder="Search messages or users"
                                                aria-label="Search for messages or users...">
                                        </div>
                                    </form>

                                    <!-- Invite button -->
                                    <div class="mt-5">
                                        <a href="#"
                                            class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#modal-invite">
                                            Find Friends

                                            <span class="icon ms-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user-plus">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <line x1="20" y1="8" x2="20"
                                                        y2="14"></line>
                                                    <line x1="23" y1="11" x2="17"
                                                        y2="11"></line>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <!-- List -->
                                <div class="card-list">
                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">B</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar ">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/6.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Bill Marrow</a></h5>
                                                    <p>last seen 3 days ago</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">D</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar ">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/5.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Damian Binder</a></h5>
                                                    <p>last seen within a week</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card --><!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar avatar-online">


                                                        <span class="avatar-text">D</span>

                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Don Knight</a></h5>
                                                    <p>online</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">E</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar avatar-online">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/8.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Elise Dennis</a></h5>
                                                    <p>online</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">M</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar ">


                                                        <span class="avatar-text">M</span>

                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Marshall Wallaker</a></h5>
                                                    <p>last seen within a month</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card --><!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar ">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/11.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Mila White</a></h5>
                                                    <p>last seen a long time ago</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">O</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar avatar-online">


                                                        <span class="avatar-text">O</span>

                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Ollie Chandler</a></h5>
                                                    <p>online</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="19" r="1">
                                                                </circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <div class="my-5">
                                        <small class="text-uppercase text-muted">W</small>
                                    </div>

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar ">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/4.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">Warren White</a></h5>
                                                    <p>last seen recently</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="19" r="1">
                                                                </circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card --><!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <a href="#" class="avatar avatar-online">

                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/7.jpg" alt="">


                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <h5><a href="#">William Wright</a></h5>
                                                    <p>online</p>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="19" r="1">
                                                                </circle>
                                                            </svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">New
                                                                    message</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit
                                                                    contact</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block user</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Notifications - Notices -->
                {{-- <div class="tab-pane fade h-100" id="tab-content-notifications" role="tabpanel">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">

                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Notifications</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0"
                                                placeholder="Search messages or users"
                                                aria-label="Search for messages or users...">
                                        </div>
                                    </form>
                                </div>

                                <!-- Today -->
                                <div class="card-list">
                                    <!-- Title -->
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Today</small>

                                        <a href="#" class="text-muted small">Clear all</a>
                                    </div>
                                    <!-- Title -->

                                    <!-- Card -->
                                    <div class="card border-0 mb-5">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar">
                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/11.jpg"
                                                            alt="">

                                                        <div
                                                            class="badge badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-user">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                </path>
                                                                <circle cx="12" cy="7" r="4">
                                                                </circle>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">
                                                            <a href="#">Mila White</a>
                                                        </h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="me-auto">Send you a friend request.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row gx-4">
                                                <div class="col">
                                                    <a href="#"
                                                        class="btn btn-sm btn-soft-primary w-100">Hide</a>
                                                </div>
                                                <div class="col">
                                                    <a href="#"
                                                        class="btn btn-sm btn-primary w-100">Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <!-- Card -->
                                    <div class="card border-0 mb-5">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar">
                                                        <span class="avatar-text bg-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-star">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg>
                                                        </span>

                                                        <div
                                                            class="badge badge-circle bg-warning border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-gift">
                                                                <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                                                <rect x="2" y="7" width="20" height="5">
                                                                </rect>
                                                                <line x1="12" y1="22" x2="12"
                                                                    y2="7"></line>
                                                                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z">
                                                                </path>
                                                                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">
                                                            <a href="#">Congratulations!</a>
                                                        </h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="me-auto">You win 5GB free disk space.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                                <!-- Today -->

                                <!-- Yesterday -->
                                <div class="card-list mt-8">
                                    <!-- Title -->
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Yesterday</small>

                                        <a href="#" class="text-muted small">Clear all</a>
                                    </div>
                                    <!-- Title -->

                                    <!-- Card -->
                                    <div class="card border-0 mb-5">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <div class="avatar">
                                                        <span class="avatar-text bg-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-lock">
                                                                <rect x="3" y="11" width="18" height="11"
                                                                    rx="2" ry="2"></rect>
                                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                            </svg>
                                                        </span>

                                                        <div
                                                            class="badge badge-circle bg-success border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-refresh-ccw">
                                                                <polyline points="1 4 1 10 7 10"></polyline>
                                                                <polyline points="23 20 23 14 17 14"></polyline>
                                                                <path
                                                                    d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">Password Changed</h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="me-auto">Your password has been <br> updated
                                                            successfully.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                                <!-- Yesterday -->

                                <!-- Previous -->
                                <div class="card-list mt-8">

                                    <!-- Title -->
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Previous</small>

                                        <a href="#" class="text-muted small">Clear all</a>
                                    </div>
                                    <!-- Title -->

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar">
                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/7.jpg" alt="">

                                                        <div
                                                            class="badge badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-image">
                                                                <rect x="3" y="3" width="18" height="18"
                                                                    rx="2" ry="2"></rect>
                                                                <circle cx="8.5" cy="8.5" r="1.5">
                                                                </circle>
                                                                <polyline points="21 15 16 10 5 21"></polyline>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">
                                                            <a href="#">William Wright</a>
                                                        </h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="me-auto">Updated profile picture.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar">
                                                        <img class="avatar-img"
                                                            src="messenger_assets/img/avatars/9.jpg" alt="">

                                                        <div
                                                            class="badge badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-message-circle">
                                                                <path
                                                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">
                                                            <a href="#">Don Knight</a>
                                                        </h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <!-- <div class="me-auto">Removed you from the chat <a href="#" class="text-reset">Bootstrap Community</a>.</div> -->
                                                        <div class="me-auto">Send you a private message.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Card -->

                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#tab-settings" class="avatar avatar-badged"
                                                        data-theme-toggle="tab">
                                                        <span class="avatar-text bg-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-bell">
                                                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9">
                                                                </path>
                                                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                            </svg>
                                                        </span>

                                                        <div
                                                            class="badge badge-circle bg-danger border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-power">
                                                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                                                <line x1="12" y1="2" x2="12"
                                                                    y2="12"></line>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="me-auto mb-0">
                                                            <a href="#tab-settings"
                                                                data-theme-toggle="tab">
                                                                Notifications
                                                            </a>
                                                        </h5>
                                                        <span class="extra-small text-muted ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="me-auto">Please turn on notifications.</div>

                                                        <div class="dropdown ms-5">
                                                            <a class="icon text-muted" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Show
                                                                        less often</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="#">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Support -->
                {{-- <div class="tab-pane fade h-100" id="tab-content-support" role="tabpanel">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">

                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Support</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0"
                                                placeholder="Search messages or users"
                                                aria-label="Search for messages or users...">
                                        </div>
                                    </form>
                                </div>

                                <!-- Docs -->
                                <div class="card border-0">
                                    <div class="card-body">

                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto text-primary">
                                                <svg version="1.1" width="46px" height="46px"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 46 46" enable-background="new 0 0 46 46"
                                                    xml:space="preserve">
                                                    <polygon opacity="0.7" points="45,11 36,11 35.5,1 " />
                                                    <polygon points="35.5,1 25.4,14.1 39,21 " />
                                                    <polygon opacity="0.4" points="17,9.8 39,21 17,26 " />
                                                    <polygon opacity="0.7" points="2,12 17,26 17,9.8 " />
                                                    <polygon opacity="0.7" points="17,26 39,21 28,36 " />
                                                    <polygon points="28,36 4.5,44 17,26 " />
                                                    <polygon points="17,26 1,26 10.8,20.1 " />
                                                </svg>

                                            </div>

                                            <div class="col">
                                                <h4 class="mb-1">Documentation</h4>
                                                <p>Setup and build tools</p>
                                            </div>

                                            <div class="col-auto">
                                                <a href="docs/"
                                                    class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-chevron-right">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Docs -->

                                <!-- Account Pages -->
                                <div class="card-list mt-8">
                                    <div class="d-flex align-items-center mb-4 px-6">
                                        <small class="text-muted me-auto">Pages</small>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-0">
                                                <div class="col">
                                                    <h4 class="mb-1">Sign In</h4>
                                                    <p>Sign in Page</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="signin.html"
                                                        class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-0">
                                                <div class="col">
                                                    <h4 class="mb-1">Sign Up</h4>
                                                    <p>Sign Up Page</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="signup.html"
                                                        class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-0">
                                                <div class="col">
                                                    <h4 class="mb-1">Password Reset</h4>
                                                    <p>Password Reset Page</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="password-reset.html"
                                                        class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-0">
                                                <div class="col">
                                                    <h4 class="mb-1">Lock screen</h4>
                                                    <p>Lock screen Page</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="lockscreen.html"
                                                        class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Account Pages -->
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Settings -->
                {{-- <div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">

                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Settings</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0"
                                                placeholder="Search messages or users"
                                                aria-label="Search for messages or users...">
                                        </div>
                                    </form>
                                </div>

                                <!-- Profile -->
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <img src="messenger_assets/img/avatars/1.jpg" alt="#"
                                                        class="avatar-img">

                                                    <div
                                                        class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-image">
                                                            <rect x="3" y="3" width="18" height="18"
                                                                rx="2" ry="2"></rect>
                                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                            <polyline points="21 15 16 10 5 21"></polyline>
                                                        </svg>
                                                    </div>
                                                    <input id="upload-profile-photo" class="d-none"
                                                        type="file">
                                                    <label class="stretched-label mb-0"
                                                        for="upload-profile-photo"></label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5>William Pearson</h5>
                                                <p>wright@studio.com</p>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="text-muted">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-log-out">
                                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                            <polyline points="16 17 21 12 16 7"></polyline>
                                                            <line x1="21" y1="12" x2="9"
                                                                y2="12"></line>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Profile -->

                                <!-- Account -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center mb-4 px-6">
                                        <small class="text-muted me-auto">Account</small>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-flush" id="accordion-profile">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-profile-1">
                                                        <a href="#"
                                                            class="accordion-button text-reset collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#accordion-profile-body-1"
                                                            aria-expanded="false"
                                                            aria-controls="accordion-profile-body-1">
                                                            <div>
                                                                <h5>Profile settings</h5>
                                                                <p>Change your profile settings</p>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div id="accordion-profile-body-1"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="accordion-profile-1"
                                                        data-parent="#accordion-profile">
                                                        <div class="accordion-body">
                                                            <div class="form-floating mb-6">
                                                                <input type="text" class="form-control"
                                                                    id="profile-name" placeholder="Name">
                                                                <label for="profile-name">Name</label>
                                                            </div>

                                                            <div class="form-floating mb-6">
                                                                <input type="email" class="form-control"
                                                                    id="profile-email" placeholder="Email address">
                                                                <label for="profile-email">Email</label>
                                                            </div>

                                                            <div class="form-floating mb-6">
                                                                <input type="text" class="form-control"
                                                                    id="profile-phone" placeholder="Phone">
                                                                <label for="profile-phone">Phone</label>
                                                            </div>

                                                            <div class="form-floating mb-6">
                                                                <textarea class="form-control" placeholder="Bio" id="profile-bio" data-autosize="true"
                                                                    style="min-height: 120px;"></textarea>
                                                                <label for="profile-bio">Bio</label>
                                                            </div>

                                                            <button type="button"
                                                                class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-profile-2">
                                                        <a href="#"
                                                            class="accordion-button text-reset collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#accordion-profile-body-2"
                                                            aria-expanded="false"
                                                            aria-controls="accordion-profile-body-2">
                                                            <div>
                                                                <h5>Connected accounts</h5>
                                                                <p>Connect with your accounts</p>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div id="accordion-profile-body-2"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="accordion-profile-2"
                                                        data-parent="#accordion-profile">
                                                        <div class="accordion-body">
                                                            <div class="form-floating mb-6">
                                                                <input type="text" class="form-control"
                                                                    id="profile-twitter" placeholder="Twitter">
                                                                <label for="profile-twitter">Twitter</label>
                                                            </div>

                                                            <div class="form-floating mb-6">
                                                                <input type="text" class="form-control"
                                                                    id="profile-facebook" placeholder="Facebook">
                                                                <label for="profile-facebook">Facebook</label>
                                                            </div>

                                                            <div class="form-floating mb-6">
                                                                <input type="text" class="form-control"
                                                                    id="profile-instagram" placeholder="Instagram">
                                                                <label for="profile-instagram">Instagram</label>
                                                            </div>

                                                            <button type="button"
                                                                class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Switch -->
                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Appearance</h5>
                                                                <p>Choose light or dark theme</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a class="switcher-btn text-reset"
                                                                    href="#!" title="Themes">
                                                                    <div class="switcher-icon switcher-icon-dark icon icon-lg d-none"
                                                                        data-theme-mode="dark">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-moon">
                                                                            <path
                                                                                d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="switcher-icon switcher-icon-light icon icon-lg d-none"
                                                                        data-theme-mode="light">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-sun">
                                                                            <circle cx="12" cy="12"
                                                                                r="5"></circle>
                                                                            <line x1="12" y1="1"
                                                                                x2="12" y2="3">
                                                                            </line>
                                                                            <line x1="12" y1="21"
                                                                                x2="12" y2="23">
                                                                            </line>
                                                                            <line x1="4.22" y1="4.22"
                                                                                x2="5.64" y2="5.64">
                                                                            </line>
                                                                            <line x1="18.36" y1="18.36"
                                                                                x2="19.78" y2="19.78">
                                                                            </line>
                                                                            <line x1="1" y1="12"
                                                                                x2="3" y2="12">
                                                                            </line>
                                                                            <line x1="21" y1="12"
                                                                                x2="23" y2="12">
                                                                            </line>
                                                                            <line x1="4.22" y1="19.78"
                                                                                x2="5.64" y2="18.36">
                                                                            </line>
                                                                            <line x1="18.36" y1="5.64"
                                                                                x2="19.78" y2="4.22">
                                                                            </line>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Account -->

                                <!-- Security -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Security</small>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-flush" id="accordion-security">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-security-1">
                                                        <a href="#"
                                                            class="accordion-button text-reset collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#accordion-security-body-1"
                                                            aria-expanded="false"
                                                            aria-controls="accordion-security-body-1">
                                                            <div>
                                                                <h5>Password</h5>
                                                                <p>Change your password</p>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div id="accordion-security-body-1"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="accordion-security-1"
                                                        data-parent="#accordion-security">
                                                        <div class="accordion-body">
                                                            <form action="#" autocomplete="on">
                                                                <div class="form-floating mb-6">
                                                                    <input type="password" class="form-control"
                                                                        id="profile-current-password"
                                                                        placeholder="Current Password"
                                                                        autocomplete="">
                                                                    <label for="profile-current-password">Current
                                                                        Password</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="password" class="form-control"
                                                                        id="profile-new-password"
                                                                        placeholder="New password" autocomplete="">
                                                                    <label for="profile-new-password">New
                                                                        password</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="password" class="form-control"
                                                                        id="profile-verify-password"
                                                                        placeholder="Verify Password"
                                                                        autocomplete="">
                                                                    <label for="profile-verify-password">Verify
                                                                        Password</label>
                                                                </div>
                                                            </form>
                                                            <button type="button"
                                                                class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Switch -->
                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Two-step verifications</h5>
                                                                <p>Enable two-step verifications</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="accordion-security-check-1">
                                                                    <label class="form-check-label"
                                                                        for="accordion-security-check-1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Security -->

                                <!-- Storage -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Storage</small>

                                        <div class="flex align-items-center text-muted">
                                            <a href="#" class="text-muted small">Clear storage</a>

                                            <div class="icon icon-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-bar-chart-2">
                                                    <line x1="18" y1="20" x2="18"
                                                        y2="10"></line>
                                                    <line x1="12" y1="20" x2="12"
                                                        y2="4"></line>
                                                    <line x1="6" y1="20" x2="6"
                                                        y2="14"></line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-flush" id="accordion-storage">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-storage-1">
                                                        <a href="#"
                                                            class="accordion-button text-reset collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#accordion-storage-body-1"
                                                            aria-expanded="false"
                                                            aria-controls="accordion-storage-body-1">
                                                            <div>
                                                                <h5>Cache</h5>
                                                                <p>Maximum cache size</p>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div id="accordion-storage-body-1"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="accordion-storage-1"
                                                        data-parent="#accordion-storage">
                                                        <div class="accordion-body">
                                                            <div class="row justify-content-between mb-4">
                                                                <div class="col-auto">
                                                                    <small>2 GB</small>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <small>4 GB</small>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <small>6 GB</small>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <small>8 GB</small>
                                                                </div>
                                                            </div>
                                                            <input type="range" class="form-range"
                                                                min="1" max="4" step="1"
                                                                id="custom-range-1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Keep media</h5>
                                                                <p>Photos, videos and other files</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="accordion-storage-check-1">
                                                                    <label class="form-check-label"
                                                                        for="accordion-storage-check-1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Storage -->

                                <!-- Notifications -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Notifications</small>
                                    </div>

                                    <!-- Accordion -->
                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <div class="accordion accordion-flush" id="accordion-notifications">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-notifications-1">
                                                        <a href="#"
                                                            class="accordion-button text-reset collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#accordion-notifications-body-1"
                                                            aria-expanded="false"
                                                            aria-controls="accordion-notifications-body-1">
                                                            <div>
                                                                <h5>Message</h5>
                                                                <p>Set custom notifications for users</p>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div id="accordion-notifications-body-1"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="accordion-notifications-1"
                                                        data-parent="#accordion-notifications">
                                                        <div class="accordion-body">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Text</h5>
                                                                    <p>Show text in notifications</p>
                                                                </div>

                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox"
                                                                            id="accordion-notifications-check-1">
                                                                        <label class="form-check-label"
                                                                            for="accordion-notifications-check-1"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Sound</h5>
                                                                <p>Enable sound notifications</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="accordion-notifications-check-3">
                                                                    <label class="form-check-label"
                                                                        for="accordion-notifications-check-3"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Browser notifications</h5>
                                                                <p>Enable browser notifications</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="accordion-notifications-check-2" checked>
                                                                    <label class="form-check-label"
                                                                        for="accordion-notifications-check-2"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Notifications -->

                                <!-- Devices -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Devices</small>

                                        <div class="flex align-items-center text-muted">
                                            <a href="#" class="text-muted small">End all sessions</a>

                                            <div class="icon icon-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-log-out">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9"
                                                        y2="12"></line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body py-3">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h5>Windows ⋅ USA, Houston</h5>
                                                            <p>Today at 2:48 pm ⋅ Browser: Chrome</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <span class="text-primary extra-small">active</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h5>iPhone ⋅ USA, Houston</h5>
                                                            <p>Yesterday at 2:48 pm ⋅ Browser: Chrome</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                                <!-- Devices -->

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </aside>
        <!-- Sidebar -->

        <!-- Chat -->
        <main class="main">
            <div class="container h-100" id="messages">

                <div class="d-flex flex-column h-100 justify-content-center text-center">
                    <div class="mb-6">
                        <span class="icon icon-xl text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-message-square">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </span>
                    </div>

                    <p class="text-muted">Choisissez une personne dans le menu de gauche, <br> et démarrez votre
                        conversation.</p>
                </div>

            </div>
        </main>
        <!-- Chat -->

        <!-- Chat -->
        {{-- <main class="main is-visible" data-dropzone-area="">
                <div class="container h-100" id="messages">

                    <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <div class="chat-header border-bottom py-4 py-lg-7">
                            <div class="row align-items-center">

                                <!-- Mobile: close -->
                                <div class="col-2 d-xl-none">
                                    <a class="icon icon-lg text-muted" href="##" data-toggle-chat="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </a>
                                </div>
                                <!-- Mobile: close -->

                                <!-- Content -->
                                <div class="col-8 col-xl-12">
                                    <div class="row align-items-center text-center text-xl-start">
                                        <!-- Title -->
                                        <div class="col-12 col-xl-6">
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online d-none d-xl-inline-block">
                                                        <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <h5 class="text-truncate">Ollie Chandler</h5>
                                                    <p class="text-truncate">is typing<span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Title -->

                                        <!-- Toolbar -->
                                        <div class="col-xl-6 d-none d-xl-block">
                                            <div class="row align-items-center justify-content-end gx-6">
                                                <div class="col-auto">
                                                    <a href="##" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                    </a>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar-group">
                                                        <a href="##" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="#">
                                                        </a>

                                                        <a href="##" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-profile">
                                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="#">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Toolbar -->
                                    </div>
                                </div>
                                <!-- Content -->

                                <!-- Mobile: more -->
                                <div class="col-2 d-xl-none text-end">
                                    <a href="##" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </a>
                                </div>
                                <!-- Mobile: more -->

                            </div>
                        </div>
                        <!-- Chat: Header -->

                        <!-- Chat: Content -->
                        <div class="chat-body hide-scrollbar flex-1 h-100">
                            <div class="chat-body-inner">
                                <div class="py-6 py-lg-12">

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Send me the files please.</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <blockquote class="blockquote overflow-hidden">
                                                            <h6 class="text-reset text-truncate">William Wright</h6>
                                                            <p class="small text-truncate">Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                        </blockquote>
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="message-content">
                                                    <div class="message-text">

                                                        <div class="row align-items-center gx-4">
                                                            <div class="col-auto">
                                                                <a href="##" class="avatar avatar-sm">
                                                                    <div class="avatar-text bg-white text-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col overflow-hidden">
                                                                <h6 class="text-truncate text-reset">
                                                                    <a href="##" class="text-reset">filename.json</a>
                                                                </h6>
                                                                <ul class="list-inline text-uppercase extra-small opacity-75 mb-0">
                                                                    <li class="list-inline-item">79.2 KB</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="message-divider">
                                        <small class="text-muted">Monday, Sep 16</small>
                                    </div>

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-gallery">
                                                        <div class="row gx-3">
                                                            <div class="col">
                                                                <img class="img-fluid rounded" src="assets/img/chat/1.jpg" data-action="zoom" alt="">
                                                            </div>
                                                            <div class="col">
                                                                <img class="img-fluid rounded" src="assets/img/chat/2.jpg" data-action="zoom" alt="">
                                                            </div>
                                                            <div class="col">
                                                                <img class="img-fluid rounded" src="assets/img/chat/3.jpg" data-action="zoom" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="message-divider">
                                        <small class="text-muted">Friday, Sep 20</small>
                                    </div>

                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Send me the files please</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple? 😂</p>
                                                    </div>

                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="##" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Edit</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="##">
                                                                        <span class="me-auto">Reply</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="##">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted">08:45 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="message">
                                        <a href="##" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p>Chandler is typing<span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Chat: Content -->

                        <!-- Chat: Footer -->
                        <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                            <!-- Chat: Files -->
                            <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                            </div>
                            <!-- Chat: Files -->

                            <!-- Chat: Form -->
                            <form class="chat-form rounded-pill bg-dark" data-emoji-form="">
                                <div class="row align-items-center gx-0">
                                    <div class="col-auto">
                                        <a href="##" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea class="form-control px-0" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea>

                                            <a href="##" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button class="btn btn-icon btn-primary rounded-circle ms-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Chat: Form -->
                        </div>
                        <!-- Chat: Footer -->
                    </div>

                </div>
            </main> --}}
        <!-- Chat -->

    </div>
    <!-- Layout -->

    <!-- Modal: Invite -->
    <div class="modal fade" id="modal-invite" tabindex="-1" aria-labelledby="modal-invite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Body -->
                {{-- <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                                <defs>
                                    <style>
                                        .cls-2 {
                                            fill: #fff;
                                            opacity: 0.1;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <g>
                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                        <path class="cls-2"
                                            d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                        <path class="cls-2"
                                            d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                        <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                        <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                    </g>
                                </g>
                            </svg>

                            <div class="position-absolute top-0 start-0 p-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="profile-body">
                            <div class="avatar avatar-lg">
                                <span class="avatar-text bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user-plus">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14">
                                        </line>
                                        <line x1="23" y1="11" x2="17" y2="11">
                                        </line>
                                    </svg>
                                </span>
                            </div>

                            <h4 class="fw-bold mb-1">Invite your friends</h4>
                            <p style="font-size: 16px;">Send invitation links to your friends</p>
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- Form -->
                    <div class="modal-py">
                        <form class="row gy-6">
                            <div class="col-12">
                                <label for="invite-email" class="form-label text-muted">E-mail</label>
                                <input type="email" class="form-control form-control-lg" id="invite-email"
                                    placeholder="name@example.com">
                            </div>

                            <div class="col-12">
                                <label for="invite-message" class="form-label text-muted">Message</label>
                                <textarea class="form-control form-control-lg" id="invite-message" rows="3" placeholder="Custom message"></textarea>
                            </div>
                        </form>
                    </div>
                    <!-- Form -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- Button -->
                    <div class="modal-py">
                        <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#invite-modal">
                            Send

                            <span class="icon ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <!-- Button -->
                </div> --}}
                <!-- Modal: Body -->

            </div>
        </div>
    </div>

    <!-- Modal: Profile -->
    <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal body -->
                {{-- <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                                <defs>
                                    <style>
                                        .cls-2 {
                                            fill: #fff;
                                            opacity: 0.1;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <g>
                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                        <path class="cls-2"
                                            d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                        <path class="cls-2"
                                            d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                        <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                        <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                    </g>
                                </g>
                            </svg>

                            <div class="position-absolute top-0 start-0 py-6 px-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="messenger_assets/img/avatars/1.jpg" alt="#">
                            </div>

                            <h4 class="mb-1">William Wright</h4>
                            <p>last seen 5 minutes ago</p>
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Location</h5>
                                    <p>USA, Houston</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12">
                                            </line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>E-mail</h5>
                                    <p>william@studio.com</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p>1-800-275-2273</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-phone-call">
                                            <path
                                                d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List  -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Active status</h5>
                                    <p>Show when you're active.</p>
                                </div>

                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="profile-status"
                                            checked>
                                        <label class="form-check-label" for="profile-status"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-danger">Logout</a>
                        </li>
                    </ul>
                    <!-- List -->
                </div> --}}
                <!-- Modal body -->

            </div>
        </div>
    </div>

    <!-- Modal: User profile -->
    <div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        {{-- <div class="profile-img text-primary rounded-top-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                                <defs>
                                    <style>
                                        .cls-2 {
                                            fill: #fff;
                                            opacity: 0.1;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <g>
                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                        <path class="cls-2"
                                            d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                        <path class="cls-2"
                                            d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                        <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                        <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                    </g>
                                </g>
                            </svg>

                            <div class="position-absolute top-0 start-0 p-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div> --}}

                        {{-- <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="messenger_assets/img/avatars/9.jpg" alt="#">

                                <a href="#"
                                    class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19">
                                        </line>
                                        <line x1="5" y1="12" x2="19" y2="12">
                                        </line>
                                    </svg>
                                </a>
                            </div>

                            <h4 class="mb-1">William Wright</h4>
                            <p>last seen 5 minutes ago</p>
                        </div> --}}
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <div id="modal-commande">
                        <!-- form commande -->
                    </div>

                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    {{-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Notifications</h5>
                                    <p>Enable sound notifications</p>
                                </div>

                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"
                                            id="user-notification-check">
                                        <label class="form-check-label" for="user-notification-check"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    {{-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-reset">Send Message</a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="text-danger">Block User</a>
                        </li>
                    </ul> --}}
                    <!-- List -->
                </div>
                <!-- Modal body -->

            </div>
        </div>
    </div>

    <!-- Modal: Media Preview -->
    <div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div>
                        <!-- Dropdown -->
                        <div class="dropdown">
                            {{-- <a class="icon text-muted" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </a> --}}

                            {{-- <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Download
                                        <div class="icon ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-download-cloud">
                                                <polyline points="8 17 12 21 16 17"></polyline>
                                                <line x1="12" y1="12" x2="12"
                                                    y2="21"></line>
                                                <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share
                                        <div class="icon ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-share-2">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <line x1="8.59" y1="13.51" x2="15.42"
                                                    y2="17.49"></line>
                                                <line x1="15.41" y1="6.51" x2="8.59"
                                                    y2="10.49"></line>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger"
                                        href="#">
                                        <span class="me-auto">Delete</span>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10"
                                                    y2="17"></line>
                                                <line x1="14" y1="11" x2="14"
                                                    y2="17"></line>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                        <!-- Dropdown -->
                    </div>
                </div>
                <!-- Modal: Header -->

                <!-- Modal: Body -->
                {{-- <div class="modal-body p-0">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <img class="img-fluid modal-preview-url" src="#" alt="#">
                    </div>
                </div> --}}
                <!-- Modal: Body -->

                <!-- Modal: Footer -->
                {{-- <div class="modal-footer">
                    <div class="w-100 text-center">
                        <h6><a href="#">Marshall Wallaker</a></h6>
                        <p class="small">Today at 14:43</p>
                    </div>
                </div> --}}
                <!-- Modal: Footer -->
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="messenger_assets/js/vendor.js"></script>
    <script src="messenger_assets/js/template.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @vite('resources/js/app.js')
    @vite('resources/js/filterConvers.js')
 
</body>

</html>
