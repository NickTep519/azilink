
<link rel="stylesheet" href="<?php echo e(asset('assets/css/chat.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/order.css')); ?>">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="contenttt">
    <main id="main-container" data-user-id="<?php echo e(auth()->id()); ?>">

        <div class="sideNav1">
            
        </div>

        <div class="sideNav2">
            <div class="SideNavhead">
                <h2>Messagerie</h2>
                <!--<i class="fa-solid fa-filter"></i>-->
            </div>
            <div class="SearchInputHolder">
                <input class="searchInput" id="searchInput" placeholder="Rechercher une conversation..."  class="search-bar">
                <hr>
            </div>


            <ul id="conversationList">
                <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $otherUser = $conversation->users->where('id', '!=', auth()->user()->id)->first();
                    ?>
                    <li class="group">
                        <div class="avatar">
                            <img src="<?php echo e(asset('storage/' . ($otherUser->image ?? 'default.png'))); ?>" alt="Photo de l'Utilisateur">
                        </div>
                        <div>
                            <p class="GroupName">
                                <a href="#" id="loadConversation" data-conversation-id="<?php echo e($conversation->id); ?>"
                                    data-url="<?php echo e(route('conversations.fetchMessages', $conversation)); ?>" style="all: unset" title="<?php echo e($otherUser->name ?? 'Utilisateur inconnu'); ?> | <?php echo e(Str::limit($conversation->title)); ?>">
                                    <?php echo e($otherUser->name ?? 'Utilisateur inconnu'); ?> |
                                    <?php echo e(Str::limit($conversation->title, 15)); ?>

                                </a>
                            </p>
                            <p class="GroupDescrp"><?php echo e(Str::limit($conversation->lastMessage->content ?? 'Aucun message', 20)); ?></p>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </div>

        <div id="noChat">
            <p style="margin-top: 1rem;text-align: center;">Aucune conversation sélectionnée.</p>
        </div>
        
        <section class="Chat">
            <div class="ChatHead">

            </div>

            <div class="MessageContainer">

            </div>
            
            <div id="newMessageBubble" style="
                display: none;
                position: absolute;
                bottom: 60px;
                left: 50%;
                transform: translateX(-50%);
                background: #007bff;
                color: white;
                padding: 8px 12px;
                border-radius: 20px;
                cursor: pointer;
                box-shadow: 0 2px 6px rgba(0,0,0,0.3);
                z-index: 1000;
                font-size: 14px;
                user-select: none;
            ">
                Un nouveau message
            </div>



            <div class="SendMessage">

            </div>
        </section>
    </main>

</div>

<!-- The form -->
<div class="form-popup" id="myForm">

</div>


<script>
    const liGroups = document.querySelectorAll('li.group');
    const noChat = document.querySelector('#noChat');
    const chatContent = document.querySelector('.Chat');
    const sendMessageForm = document?.querySelector('form.SendMessage');
    
    if(!sendMessageForm) {
        chatContent.style.display = 'none';
    }
    
    document.getElementById('conversationList').addEventListener('click', function(e) {
        const activeBtn = e.target.closest('#loadConversation');
        
        if(!activeBtn) {
            return;
        }
        
        liGroups.forEach((group) => {
            group.classList.remove('active');
        })
        
        e.target.closest('li.group').classList.add('active');
        chatContent.style.display = 'flex';
        if (window.innerWidth <= 868 && isMobileDevice()) { // seuil typique pour mobile
            chatContent.scrollIntoView({behavior: 'smooth', block: 'start'})
        }
        noChat.style.display = 'none';
    })
    
    // Définition de la fonction
    function isMobileDevice() {
        return /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    }

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>


<script src="<?php echo e(asset('assets/js/chat.js')); ?>"></script>
<?php /**PATH /home/u217000542/domains/atlasinvest-limited.com/public_html/azilink/resources/views/conversations/iframeindex.blade.php ENDPATH**/ ?>