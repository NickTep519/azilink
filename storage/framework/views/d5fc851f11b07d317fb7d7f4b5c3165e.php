

<?php $__env->startSection('title', config('app.name') . ' | Messages'); ?>

<?php $__env->startSection('style'); ?>
    <style>
        /**********************************	Pop Up ********************************************/
        .modal-box {
            font-family: 'Poppins', sans-serif;
        }

        .show-modal {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #49a6fd);
            font-size: 18px;
            font-weight: 600;
            text-transform: capitalize;
            padding: 10px 15px;
            margin: 200px auto 0;
            border: none;
            outline: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: block;
            transition: all 0.3s ease 0s;
        }

        .show-modal:hover,
        .show-modal:focus {
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            outline: none;
        }

        .modal-dialog {
            width: 400px;
            margin: 70px auto 0;
        }

        .modal-dialog {
            transform: scale(0.5);
        }

        .modal-dialog {
            transform: scale(1);
        }

        .modal-dialog .modal-content {
            text-align: center;
            border: none;
        }

        .modal-content .close {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #4cd5ff);
            font-size: 25px;
            font-weight: 400;
            text-shadow: none;
            line-height: 27px;
            height: 25px;
            width: 25px;
            border-radius: 50%;
            overflow: hidden;
            opacity: 1;
            position: absolute;
            left: auto;
            right: 8px;
            top: 8px;
            z-index: 1;
            transition: all 0.3s;
        }

        .modal-content .close:hover {
            color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .close:focus {
            outline: none;
        }

        .modal-body {
            padding: 60px 40px 40px !important;
        }

        .modal-body .title {
            color: #026fd4;
            font-size: 33px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0 0 10px;
        }

        .modal-body .description {
            color: #9A9EA9;
            font-size: 16px;
            margin: 0 0 20px;
        }

        .modal-body .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        .modal-body .input-icon {
            color: #777;
            font-size: 18px;
            transform: translateY(-50%);
            position: absolute;
            top: 50%;
            left: 20px;
        }

        .modal-body .form-control {
            font-size: 17px;
            height: 45px;
            width: 100%;
            padding: 6px 0 6px 50px;
            margin: 0 auto;
            border: 2px solid #eee;
            border-radius: 5px;
            box-shadow: none;
            outline: none;
        }

        .form-control::placeholder {
            color: #AEAFB1;
        }

        .form-group.checkbox {
            width: 130px;
            margin-top: 0;
            display: inline-block;
        }

        .form-group.checkbox label {
            color: #9A9EA9;
            font-weight: normal;
        }

        .form-group.checkbox input[type=checkbox] {
            margin-left: 0;
        }

        .modal-body .forgot-pass {
            color: #7F7FD5;
            font-size: 13px;
            text-align: right;
            width: calc(100% - 135px);
            margin: 2px 0;
            display: inline-block;
            vertical-align: top;
            transition: all 0.3s ease 0s;
        }

        .forgot-pass:hover {
            color: #9A9EA9;
            text-decoration: underline;
        }

        .modal-content .modal-body .btn {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #4cd5ff);
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 38px;
            width: 100%;
            height: 40px;
            padding: 0;
            border: none;
            border-radius: 5px;
            border: none;
            display: inline-block;
            transition: all 0.6s ease 0s;
        }

        .modal-content .modal-body .btn:hover {
            color: #fff;
            letter-spacing: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .modal-content .modal-body .btn:focus {
            outline: none;
        }

        @media only screen and (max-width: 480px) {
            .modal-dialog {
                width: 95% !important;
            }

            .modal-content .modal-body {
                padding: 60px 20px 40px !important;
            }
        }


        /**********************************Message ********************************************/

        ::-webkit-scrollbar {
            width: 2px;
        }


        ::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 5px;
        }

        .chat-list-box {
            display: inline-block;
            width: 100%;
            background: #fff;
            box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        }

        .full-height {
            height: 100% !important;
        }

        .flat-icon li {
            display: inline-block;
            padding: 0px 8px;
            vertical-align: middle;
            position: relative;
            top: 7px;
        }

        .flat-icon a img {
            width: 22px;
            border-radius: unset !important;
        }

        ul.list-inline.text-left.d-inline-block.float-left {
            margin-bottom: 0;
        }

        .chat-list-box ul li img {
            border-radius: 50px;
        }

        .message-box {
            display: inline-block;
            width: 100%;
            background: #fff;
            box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        }

        .msg-box li {
            display: inline-block;
            padding-left: 10px;
        }

        .msg-box img {
            border-radius: 50px;
        }

        .msg-box li span {
            padding-left: 8px;
            color: #545454;
            font-weight: 550;
        }

        .head-box {
            display: flow-root;
            padding: 10px;
            background: #f6f6f6;
        }

        .chat-person-list {
            padding: 10px;
        }

        .chat-person-list ul li img {
            width: 30px;
            border-radius: 50px;
        }

        .chat-person-list ul li span {
            padding-left: 20px;
        }

        .chat-person-list ul li {
            line-height: 55px;
        }

        span.chat-time {
            float: right;
            font-size: 12px;
        }

        .head-box-1 {
            display: flow-root;
            padding: 10px;
            background: #f6f6f6;
        }

        .msg_history {
            padding: 10px;
            height: 280px;
            overflow: overlay;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg {
            width: 57%;
        }

        .received_withd_msg p {
            background: rgba(0, 123, 255, .5) none repeat scroll 0 0;
            border-radius: 3px;
            color: #ffffff;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 22px;
            width: 100%;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .incoming_msg_img img {
            width: 100%;
            border-radius: 50px;
            float: left;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 10px 0 10px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .sent_msg p {
            background: #ddd;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #333;
            padding: 5px 10px 5px 22px;
            width: 100%;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
        }

        .chat-person-list ul li a {
            color: #545454;
            text-decoration: none;
        }

        .attachement {
            background: #777;
            position: absolute;
            width: 220px;
            right: 30%;
            top: 42px;
            display: none;
        }

        .attachement ul li {
            display: -webkit-inline-box;
            margin: 0px 19px 15px 20px;
        }

        .attachement ul li a {
            color: #fff;
        }

        .setting-drop {
            display: none;
            position: absolute;
            width: 130px;
            height: 148px;
            right: 0;
            top: 42px;
            background: #ffffff;
            color: #545454;
            box-shadow: 1px 1px 15px 1px #0000001f;
        }

        .send-message {
            padding: 15px;
            background: #f5f5f5;
            height: 85px;
        }

        .send-message textarea:focus {
            box-shadow: none;
            outline: none;
            border-color: #ddd;
        }

        .send-message ul li {
            display: -webkit-inline-box;
            padding-left: 15px;
        }

        .send-message ul li i {
            color: #0056b3;
        }

        .send-message ul li a {
            color: #0056b3;
        }

        .send-message ul {
            position: absolute;
            right: 45px;
            top: 88%;
            border-left: 1px solid #9c9a9a;
        }

        @media only screen and (max-width: 800px) {
            .message-box {
                display: none;
                position: relative;
                top: -100%;
            }
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 2000px !important;

            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <main class="main">
        <div class="box-content">
            <div class="section-box">
                <div class="container">
                    <div class="box-heading">
                        <div class="box-heading-left">
                            <div class="box-title">
                                <h4 class="neutral-1000 mb-15">Messages</h4>
                            </div>
                            <div class="box-breadcrumb">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li> <a class="icon-home" href="#">Accueil</a></li>
                                        <li><a class="icon-home" href="#">Utilisateur</a></li>
                                        <li><span>Messages</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="chat-list-box">
                                <div class="head-box">
                                    <ul class="list-inline text-left d-inline-block float-left">
                                        <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px">
                                        </li>
                                    </ul>
                                    <ul class="flat-icon list-inline text-right d-inline-block float-right">
                                        <li> <a href="#"> <i class="fas fa-search"></i> </a> </li>
                                        <li> <a href="#"> <i class="fas fa-ellipsis-v"></i> </a> </li>
                                    </ul>
                                </div>

                                <div class="chat-person-list">
                                    <ul class="list-inline">
                                        <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li> 
                                                <a href="#" id="loadConversation"
                                                    data-url="<?php echo e(route('conversations.fetchMessages', $conversation)); ?>"
                                                    class="flip"> 
                                                        <img src="https://i.ibb.co/6JpcfrK/p4.png" alt=""> 
                                                        <span> 
                                                            <?php echo e($conversation->users->where('id', '!=', auth()->user()->id)->first()->name); ?> | <?php echo e(Str::limit($conversation->title, 15)); ?>

                                                        </span> 
                                                        <span class="chat-time"> 
                                                            <?php echo e($conversation->lastMessage?->created_at?->diffForHumans() ?? ''); ?>

                                                        </span> 
                                                </a> 
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- col-md-4 closed -->

                        <div class="col-md-8">
                            <div class="message-box">

                                <div class="head-box-1">
                                </div>

                                <div class="msg_history">
                                </div>

                                <div class="send-message">
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modal-box">
                                            <!-- Modal -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const conversationLinks = document.querySelectorAll('#loadConversation');
            const headBox = document.querySelector('.message-box .head-box-1');
            const messageBox = document.querySelector('.message-box .msg_history') ;
            const sendMessageContainer = document.querySelector('.send-message') ;
            const createCommande = document.querySelector('.modal-box') ;


            conversationLinks.forEach(link => {
                
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    const url = this.getAttribute('data-url') ;
                    
                    fetch(url)
                        .then(response => response.json()) 
                        .then(data => { 

                            // Mettre à jour msg_history
                            const messagesHtml = data.messages.map(message => `
								<div class="${message.user.id === parseInt(document.body.dataset.userId) ? 'outgoing_msg' : 'incoming_msg'}">
									<div class="${message.user.id === parseInt(document.body.dataset.userId) ? 'sent_msg' : 'received_msg'}">
										<div class="${message.user.id === parseInt(document.body.dataset.userId) ? '' : 'received_withd_msg'}" >
											<p>${message.content}</p>
											<span class="time_date">${message.created_at}</span>
										</div>
									</div>
								</div>
							`).join('') ;

                            messageBox.innerHTML = messagesHtml ;

                            // Mettre à jour head-box-1
                            headBox.innerHTML = `
								<ul class="msg-box list-inline text-left d-inline-block float-left">
									<li> <i class="fas fa-arrow-left" id="back"></i> </li> 
									<li> 
										<img src="${data.headBox.avatar}" alt="" width="40px"> 
										<span>${data.headBox.name}</span> 
									</li> 
								</ul>
								<ul class="flat-icon list-inline text-right d-inline-block float-right">
									${data.headBox.canCreateOrder ? `
    										<li>
    											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    												Créer une commande
    											</button> 
    										</li>
    									` : ''}
									<li> <a href="#"> <i class="fas fa-camera"></i> </a> </li> 
								</ul>
							`;

                            // Mise à jour du formulaire d'envoi de message
                            if (data.canSendMessage) {
                                sendMessageContainer.innerHTML = `
									<form action="/conversations/${data.conversationId}/save" method="POST">
										<input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
										<textarea name="content" cols="10" rows="4" class="form-control" placeholder="Tapez votre message ici..."> ${data.sessionMessage} </textarea>
										<ul class="list-inline">
											<button type="submit" style="all: unset"><li><i class="fas fa-paper-plane"></i></li></button>
										</ul>
									</form>
								`;



                                const sendMessageForm = sendMessageContainer.querySelector(
                                    'form') ;
                                handleSendMessage(sendMessageForm, messageBox) ;


                                // Mise à jour du formulaire de commande

                                createCommande.innerHTML = `
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content clearfix">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
												<form action="/commandes" method="POST" >
												<?php echo csrf_field(); ?>

													<div class="modal-body">
														<h3 class="title">Créer une commande</h3>
														<p class="description">Veillez remplir attentivement le formulaire</p>

											
														<div class="form-group">
															<input type="text" id="kg_commande" name="kg_commande"  value="<?php echo e(old('kg_commande')); ?>" required  class="form-control" placeholder="Nombre de Kilo">
															<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('kg_commande'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('kg_commande')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
														</div>

														<div class="form-group">
															<input type="text" id="price" name="price"  value="<?php echo e(old('price')); ?>" class="form-control" placeholder="Prix/kg">
															<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('price'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('price')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
														</div>

														<div class="form-group checkbox">
															<input type="hidden" name="annonce_id" value="${data.annonceId}" >
															<input type="hidden" name="recever_id" value="${data.recipientId}" >
														</div>

														<a href="" class="forgot-pass"></a>
														<button class="btn">Créer</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								`;



                            } else {
                                sendMessageContainer.innerHTML =
                                    '<p>Vous ne pouvez pas envoyer de messages dans cette conversation.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Erreur lors du chargement des messages:', error);
                        });
                });
            });

            function handleSendMessage(form, messageBox) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);
                    const url = this.getAttribute('action');

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Ajouter le nouveau message à l'interface
                                const newMessageHtml = `
									<div class="outgoing_msg">
										<div class="sent_msg">
											<p>${data.message.content}</p>
											<span class="time_date">${data.message.created_at}</span>
										</div>
									</div>
								`;
                                messageBox.innerHTML += newMessageHtml;

                                // Vider le champ de texte
                                this.querySelector('textarea').value = '';
                                messageBox.scrollTop = messageBox.scrollHeight; // Scroller vers le bas
                            }
                        })
                        .catch(error => {
                            console.error('Erreur lors de l\'envoi du message:', error);
                        });
                });
            }
        });


        function scrollToBottom(element) {
            element.scrollTop = element.scrollHeight;
        }

        // Appelez cette fonction après avoir mis à jour les messages
        scrollToBottom(messageBox);
    </script>
    <script>
        $("#attach").click(function() {
            $(".attachement").toggle();
        });
    </script>
    <script>
        $("#dset").click(function() {
            $(".setting-drop").toggle('1000');
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".flip").click(function() {
                $(".message-box").show("slide", {
                    direction: "right"
                }, 10000);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#back").click(function() {
                $(".message-box").hide("slide", {
                    direction: "left"
                }, 10000);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views\conversations\index.blade.php ENDPATH**/ ?>