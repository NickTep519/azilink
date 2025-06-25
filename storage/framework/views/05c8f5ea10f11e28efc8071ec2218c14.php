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

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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

<body data-user-id="<?php echo e(auth()->id()); ?>">


    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
        <!-- Container wrapper -->
        <div class="container-fluid">

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                

                <!-- Left links -->
                
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
            

            <!-- Nav items -->
            <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center align-items-center w-100 py-4 py-lg-2 px-lg-3"
                role="tablist">
                <!-- Invisible item to center nav vertically -->
                

                <!-- New chat -->
                

                <!-- Friends -->
                

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
                                <span><?php echo e($totalUnread); ?></span>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- Notification -->
                

                <!-- Support -->
                

                <!-- Switcher -->
                

                <!-- Settings -->
                

                <!-- Profile -->
                
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
                                    
                                    <!-- Card -->

                                    <?php $__empty_1 = true; $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <!-- Card -->
                                        <div id="conversation-list">
                                            <a href="#" style="all: unset;" class="card border-0 text-reset conversation-item"
                                                id="loadConversation"
                                                data-id="<?php echo e($conversation->id); ?>" 
                                                data-url="<?php echo e(route('messenger.index', $conversation->id)); ?>"
                                                data-conversation-id="<?php echo e($conversation->id); ?>">

                                                <div class="card-body" id="conversation-<?php echo e($conversation->id); ?>">
                                                    <div class="row gx-5">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-online">
                                                                
                                                                <img src="/storage/<?php echo e($conversation->users->except(auth()->id())->first()->image); ?>"
                                                                    alt="#" class="avatar-img">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <h5 class="me-auto mb-0">
                                                                    <?php echo e($conversation->users->except(auth()->id())->pluck('pseudo')->join(', ')); ?> |
                                                                
                                                                </h5>
                                                                <span class="text-muted extra-small ms-2">
                                                                    <?php echo e($conversation->messages->last()->created_at->translatedFormat('H:i')); ?>

                                                                </span>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="line-clamp me-auto"
                                                                    id="last-message-<?php echo e($conversation->id); ?>">
                                                                    
                                                                    <?php echo Str::limit(optional($conversation->messages->last())->content, 90); ?>

                                                                </div>

                                                                <?php if($conversation->unread_messages_count > 0): ?>
                                                                    <div class="badge badge-circle bg-primary ms-5"
                                                                        id="unread-count-<?php echo e($conversation->id); ?>">
                                                                        <span>
                                                                            <?php echo e($conversation->unread_messages_count); ?>

                                                                        </span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-body -->
                                            </a>
                                        </div>
                                        <!-- Card -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>

                                    <!-- Card -->
                                    
                                    <!-- Card -->

                                    <!-- Card -->
                                    
                                    <!-- Card -->

                                    <!-- Card -->
                                    
                                    <!-- Card -->
                                </div>
                                <!-- Chats -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Create -->
                

                <!-- Friends -->
                

                <!-- Notifications - Notices -->
                

                <!-- Support -->
                

                <!-- Settings -->
                
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
        
        <!-- Chat -->

    </div>
    <!-- Layout -->

    <!-- Modal: Invite -->
    <div class="modal fade" id="modal-invite" tabindex="-1" aria-labelledby="modal-invite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Body -->
                
                <!-- Modal: Body -->

            </div>
        </div>
    </div>

    <!-- Modal: Profile -->
    <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal body -->
                
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
                    
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    
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
                            

                            
                        </div>
                        <!-- Dropdown -->
                    </div>
                </div>
                <!-- Modal: Header -->

                <!-- Modal: Body -->
                
                <!-- Modal: Body -->

                <!-- Modal: Footer -->
                
                <!-- Modal: Footer -->
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="messenger_assets/js/vendor.js"></script>
    <script src="messenger_assets/js/template.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/filterConvers.js'); ?>
 
</body>

</html>
<?php /**PATH D:\projets\taffe\azilink\resources\views\messenger\showw.blade.php ENDPATH**/ ?>