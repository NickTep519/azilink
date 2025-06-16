<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Chitchat - chat messenger html templlete</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Chitchat">
    <meta name="keywords" content="Chitchat">
    <meta name="author" content="Chitchat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/1.0.1/css/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="{{asset('../asset/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/css/style.css')}}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/css/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/skins/moono-lisa/editor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/plugins/scayt/skins/moono-lisa/scayt.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/plugins/scayt/dialogs/dialog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/plugins/tableselection/styles/tableselection.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/plugins/wsc/skins/moono-lisa/wsc.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../asset/js/ckeditor/plugins/copyformatting/styles/copyformatting.css')}}">

</head>

<body class="sidebar-active">

    {{-- <div class="chitchat-loader">
      <div><img src="../asset/images/logo/logo_big.png" alt=""/>
        <h3>Simple, secure messaging for fast connect to world..!</h3>
      </div>
    </div> --}}

    <div class="chitchat-container sidebar-toggle">

        <nav class="main-nav on custom-scroll">
            <div class="logo-warpper"><a href="#"><img src="../asset/images/logo/logo.png" alt="logo" /></a>
            </div>
            <div class="sidebar-main">
                <ul class="sidebar-top">
         
                    <li>
                        <div class="dot-btn dot-danger grow"><a class="icon-btn btn-light button-effect"
                                href="https://themes.pixelstrap.com/chitchat/pages/notification"
                                data-tippy-content="Notification"> <i class="fa fa-bell"></i></a></div>
                    </li>

                </ul>

                <ul class="sidebar-bottom">
                    <li><a class="icon-btn btn-light button-effect mode" href="#"
                            data-tippy-content="Theme Mode" data-intro="Change mode"><i class="fa fa-moon-o"></i></a>
                    </li>
                    <li><a class="icon-btn btn-light" href="{{ route('login') }}" data-tippy-content=" SignOut"> <i
                                class="fa fa-power-off"> </i></a></li>
                </ul>
            </div>
        </nav>


        <aside class="chitchat-left-sidebar left-disp">

            <div class="recent-default dynemic-sidebar active">
                <div class="chat custom-scroll">

                    <ul class="chat-cont-setting">
                        <li> <a href="#" data-bs-toggle="modal" data-bs-target="#msgchatModal"><span>new
                                    chat</span>
                                <div class="icon-btn btn-outline-primary button-effect btn-sm"><i
                                        data-feather="message-square"></i></div>
                            </a>
                        </li>
                    </ul>

                    <div class="theme-title">
                        <div class="d-flex">
                            <div>
                                <h2>Messagerie</h2>
                                <h4>Démarrer une conversation</h4>
                            </div>
                            <div class="flex-grow-1"><a
                                    class="icon-btn btn-outline-light btn-sm search contact-search"
                                    href="#"> <i data-feather="search"></i></a>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input class="form-control-plaintext" type="search"
                                            placeholder="Search.." />
                                        <div class="icon-close close-search"> <i data-feather="x"> </i></div>
                                    </div>
                                </form><a class="icon-btn btn-primary btn-fix chat-cont-toggle outside"
                                    href="#"><i data-feather="plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="theme-tab tab-sm chat-tabs">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item" data-to="chat-content"><a class="nav-link button-effect active"
                                    id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab"
                                    aria-controls="chat" aria-selected="true" data-intro="Start chat"><i
                                        data-feather="message-square"> </i>Chat</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">


                            <!-- start conversations list -->
                            <div class="tab-pane fade show active" id="chat" role="tabpanel"
                                aria-labelledby="chat-tab">
                                <div class="theme-tab">
                                    <div class="tab-content" id="myTabContent1">
                                        <div class="tab-pane fade show active" id="direct" role="tabpanel"
                                            aria-labelledby="direct-tab">
                                            <ul class="chat-main">

                                                @foreach ($conversations as $conversation)

                                                <li data-to="blank">
                                                    <a href=""  class="loadConversation"
                                                                data-url="{{ route('conversations.fetchMessages', $conversation) }}" >
                                                    <div class="chat-box">
                                                        <div class="profile offline"><img class="bg-img"
                                                                src="../asset/images/contact/1.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5 data-conversation-id="{{$conversation->id}}" > {{ $conversation->users->where('id', '!=', auth()->user()->id)->first()->name }}  | {{ Str::limit($conversation->title, 15)  }} </h5>

                                                            <h6> {{ $conversation->lastMessage?->content ?? '' }} </h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6> {{ $conversation->lastMessage?->created_at?->diffForHumans() ?? '' }} </h6>
                                                            <h6 class="font-success status"> Seen </h6>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </li>
                                              
                                                @endforeach

                                                <li class="active" data-to="chating">
                                                    <div class="chat-box">
                                                        <div class="profile online"><img class="bg-img"
                                                                src="../assets/images/contact/2.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5>Jony Lynetin</h5>
                                                            <h6>Typing................</h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6>30/11/23</h6>
                                                            <div class="badge badge-primary sm">8</div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li data-to="blank">
                                                    <div class="chat-box">
                                                        <div class="profile unreachable"><img class="bg-img"
                                                                src="../assets/images/contact/3.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5>Sufiya Elija</h5>
                                                            <h6>I need job, please help me.</h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6>15/06/23</h6>
                                                            <h6 class="font-dark status"> Sending</h6>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li data-to="blank">
                                                    <div class="chat-box">
                                                        <div class="profile busy"><img class="bg-img"
                                                                src="../assets/images/contact/4.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5>Mukrani Pabelo</h5>
                                                            <h6>Hi, i am josephin. How are you.. ! There are many
                                                                variations of passages.</h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6>04/06/23</h6>
                                                            <h6 class="font-danger status"> Failed</h6>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li data-to="blank">
                                                    <div class="chat-box">
                                                        <div class="profile busy"><img class="bg-img"
                                                                src="../assets/images/contact/2.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5>Jhon Deo</h5>
                                                            <h6>Hi, i am josephin. How are you.. ! There are many
                                                                variations of passages.</h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6>04/06/23</h6>
                                                            <h6 class="font-danger status"> Failed</h6>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li data-to="blank">
                                                    <div class="chat-box">
                                                        <div class="profile busy"><img class="bg-img"
                                                                src="../assets/images/contact/1.jpg" alt="Avatar" />
                                                        </div>
                                                        <div class="details">
                                                            <h5>Pabelo Mukrani</h5>
                                                            <h6>Hi, i am josephin. How are you.. ! There are many
                                                                variations of passages.</h6>
                                                        </div>
                                                        <div class="date-status"><i class="ti-pin2"></i>
                                                            <h6>04/06/23</h6>
                                                            <h6 class="font-danger status"> Failed</h6>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end conversations list -->

                        </div>
                    </div>
                </div>
            </div>

             <!-- start notification list -->
            <div class="notification-tab dynemic-sidebar custom-scroll" id="notification">
                <div class="theme-title">
                    <div class="d-flex">
                        <div>
                            <h2>Notification</h2>
                            <h4>List of notification</h4>
                        </div>
                        <div class="flex-grow-1"> <a class="icon-btn btn-outline-light btn-sm close-panel"
                                href="#"><i data-feather="x"></i></a></div>
                    </div>
                </div>
                <ul class="chat-main">
                    <li>
                        <div class="chat-box notification">
                            <div class="profile offline"><img class="bg-img" src="../assets/images/contact/1.jpg"
                                    alt="Avatar" /></div>
                            <div class="details"><span>Josephin water</span>
                                <h5>Upload New Photos</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                            <div class="date-status">
                                <h6>Now</h6>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="chat-box notification">
                            <div class="profile bg-success offline"><span>J</span></div>
                            <div class="details"><span>Jony Today Birthday</span>
                                <h5>Upload New Photos</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                            <div class="date-status">
                                <h6>1 hour ago</h6>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="chat-box notification">
                            <div class="profile offline"><img class="bg-img" src="../assets/images/contact/2.jpg"
                                    alt="Avatar" /></div>
                            <div class="details"><span>Sufiya Elija</span>
                                <h5>Comment On your Photo</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                            <div class="date-status">
                                <h6>5 hour ago</h6>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="chat-box notification">
                            <div class="profile unreachable"><img class="bg-img"
                                    src="../assets/images/contact/3.jpg" alt="Avatar" /></div>
                            <div class="details"><span>Pabelo Mukrani</span>
                                <h5>Invite Your New Friend</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                            <div class="date-status">
                                <h6>6 hour ago</h6>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="chat-box notification">
                            <div class="profile bg-success offline"><span>PM</span></div>
                            <div class="details"><span>Pabelo Mukrani</span>
                                <h5>Update Profile Picture</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                            <div class="date-status">
                                <h6>6 hour ago</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end notification list -->
      
        </aside>

        <!-- start show messages -->
        <div class="chitchat-main small-sidebar" id="content">
            <div class="chat-content tabto active">
                <div class="messages custom-scroll active" id="chating">

                    <div class="contact-details">
                        <div class="row">
                        
                            <div class="col-7">
                                <div class="d-flex left message-box">
                                    <div  class="head-box">

                                    </div>
                                </div>
                            </div>

                            <div class="col px-0">
                                <ul class="calls text-end">
                                    <li><a class="icon-btn btn-light button-effect apps-toggle"
                                            href="#" data-tippy-content="All Apps"><i
                                                class="ti-layout-grid2"></i></a></li>
                                    <li class="chat-friend-toggle"><a
                                            class="icon-btn btn-light bg-transparent button-effect outside"
                                            href="#" data-tippy-content="Quick action"><i
                                                data-feather="more-vertical"></i></a>
                                        <div class="chat-frind-content">
                                            <ul>
                                                <li><a class="icon-btn btn-outline-primary button-effect btn-sm"
                                                        href="#"><i data-feather="user"></i></a>
                                                    <h5>Profile</h5>
                                                </li>
                                                <li><a class="icon-btn btn-outline-success button-effect btn-sm"
                                                        href="#"><i
                                                            data-feather="plus-circle"></i></a>
                                                    <h5>Archive</h5>
                                                </li>
                                                <li><a class="icon-btn btn-outline-danger button-effect btn-sm"
                                                        href="#"><i data-feather="trash-2"></i></a>
                                                    <h5>Delete</h5>
                                                </li>
                                                <li><a class="icon-btn btn-outline-light button-effect btn-sm"
                                                        href="#"><i data-feather="slash"></i></a>
                                                    <h5>Block</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="contact-chat">
                        <ul class="chatappend">

                           <div>AZILINK</div>
            
                        </ul>
                    </div>

                </div>

                <div class="message-input">

                   
                    
                </div>
            </div>
        </div>
        <!-- end show messages -->

    </div>

    <script src="{{asset('../asset/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('../asset/js/owl.carousel.js')}}"></script>
    <script src="{{asset('../asset/js/popper.min.js')}}"></script>
    <script src="{{asset('../asset/js/tippy-bundle.iife.min.js')}}"></script>
    <script src="{{asset('../asset/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('../asset/js/switchery.js')}}"></script>
    <script src="{{asset('../asset/js/easytimer.min.js')}}"></script>
    <script src="{{asset('../asset/js/index.js')}}"></script>
    <script src="{{asset('../asset/js/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('../asset/js/feather-icon/feather-icon.js')}}"></script>
    <script src="{{asset('../asset/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('../asset/js/ckeditor/styles.js')}}"></script>
    <script src="{{asset('../asset/js/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('../asset/js/ckeditor/ckeditor.custom.js')}}"></script>
    <script src="{{asset('../asset/js/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('../asset/js/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('../asset/js/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('../asset/js/tour/intro.js')}}"></script>
    <script src="{{asset('../asset/js/tour/intro-init.js')}}"></script>
    <script src="{{asset('../asset/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('../asset/js/zoom-gallery.js')}}"></script>
    <script src="{{asset('../asset/js/script.js')}}"></script>

    <script>
        window.User = {
            id : {{ optional(auth()->user())->id }} 
        }
    </script>
    <script src="{{asset('../asset/js/chat.js')}}" ></script>
</body>

</html>
