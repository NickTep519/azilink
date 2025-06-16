
<link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="contenttt">
    <main id="main-container" data-user-id="{{ auth()->id() }}">

        <div class="sideNav1">
            <li class="active"><i class="fa-regular fa-comment-dots"></i></li>
            {{-- <li><i class="fa-solid fa-phone"></i></li>
            <li><i class="fa-solid fa-gear"></i></li>
            <li><i class="fa-solid fa-trash-can"></i></li>
            <li><i class="fa-regular fa-star"></i></li>
            <li><i class="fa-solid fa-address-book"></i></li> --}}
        </div>

        <div class="sideNav2">

            <div class="SideNavhead">
                <h2>Messagerie</h2>
                <i class="fa-solid fa-filter"></i>
                <i class="fa-solid fa-user-plus"></i>

            </div>
            <div class="SearchInputHolder">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="searchInput" id="searchInput" placeholder="Rechercher une conversation..."
                    class="search-bar">
                <hr>
            </div>


            <ul id="conversationList">
                @foreach ($conversations as $conversation)
                    <li class="group">
                        <div class="avatar">
                            <img src="{{ asset('storage/' . $conversation->users->where('id', '!=', auth()->user()->id)->first()->image) }}"
                                alt="">
                        </div>
                        <p class="GroupName">
                            <a href="#" id="loadConversation" data-conversation-id="{{$conversation->id}}"
                                data-url="{{ route('conversations.fetchMessages', $conversation) }}" style="all: unset">
                                {{ $conversation->users->where('id', '!=', auth()->user()->id)->first()->name }} |
                                {{ Str::limit($conversation->title, 15) }}
                            </a>
                        </p>
                        <p class="GroupDescrp">{{ Str::limit($conversation?->lastMessage?->content ?? '', 20) }}</p>
                    </li>
                @endforeach

                <li class="group">
                    <div class="avatar"><img src="imgs/Asset 1.svg" alt=""></div>
                    <p class="GroupName">Nick</p>
                    <p class="GroupDescrp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earujdsajf djf df
                        dfjdkj
                        dlkjfl.kjl dlkjf lkjlkdjfm, sequi.</p>
                </li>
                <li class="group">
                    <div class="avatar"><img src="imgs/Asset 1.svg" alt=""></div>
                    <p class="GroupName">Gloriours</p>
                    <p class="GroupDescrp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earujdsajf djf df
                        dfjdkj
                        dlkjfl.kjl dlkjf lkjlkdjfm, sequi.</p>
                </li>
            </ul>


            <li class="group">
                <div class="avatar"><img src="imgs/Asset 1.svg" alt=""></div>
                <p class="GroupName">David Johnson</p>
                <p class="GroupDescrp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earujdsajf djf df dfjdkj
                    dlkjfl.kjl dlkjf lkjlkdjfm, sequi.</p>
            </li>

        </div>

        <section class="Chat">

            <div class="ChatHead">


            </div>

            <div class="MessageContainer">

                {{-- <span></span>
                <div class="messageSeperator">Yesterday</div>
                <div class="message me">
                    <p class="messageContent">Hello!</p>
                    <div class="messageDetails">
                        <div class="messageTime">3:21 PM</div>
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div> --}}

            </div>

            <div class="SendMessage">

            </div>

        </section>
    </main>

</div>



<!-- A button to open the popup form -->


<!-- The form -->
<div class="form-popup" id="myForm">

</div>


<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>


<script src="{{ asset('assets/js/chat.js') }}"></script>
