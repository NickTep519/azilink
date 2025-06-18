import{p as u}from"./pusherClient-4ab91934.js";const k=parseInt(document.body.dataset.userId);document.querySelectorAll(".conversation-item").forEach(e=>{const n=e.dataset.conversationId;u.channel(`private-conversation${n}`)&&u.unsubscribe(`private-conversation${n}`),u.subscribe(`private-conversation${n}`).bind("received",d=>{var s;const r=d.content,t=d.conversation_id,a=document.getElementById(`last-message-${t}`);if(a&&(a.innerHTML=d.content.slice(0,90)),!(parseInt((s=document.getElementById("conversation_id"))==null?void 0:s.value)===t)&&r.user_id!==k){const o=document.getElementById(`unread-count-${t}`);if(o){let c=parseInt(o.textContent)||0;o.textContent=c+1}else{const c=`
                    <div class="badge badge-circle bg-primary ms-5" id="unread-count-${t}">
                        <span>1</span>
                    </div>
                `;e.querySelector(".d-flex.align-items-center").insertAdjacentHTML("beforeend",c)}}const l=document.getElementById("conversation-list"),m=document.getElementById(`conversation-${t}`);l&&m&&l.prepend(m.closest(".conversation-item"))})});document.addEventListener("DOMContentLoaded",function(){document.querySelectorAll("#loadConversation").forEach(n=>{n.addEventListener("click",function(v){v.preventDefault();const d=this.getAttribute("data-url");fetch(d).then(r=>r.json()).then(r=>{$(r);const t=document.getElementById("conversation_id").value,a=document.getElementById("content"),i=document.getElementById("submitMessage"),l=document.getElementById(`unread-count-${t}`);l&&(l.textContent=""),u.channel(`private-conversation${t}`)&&u.unsubscribe(`private-conversation${t}`),u.subscribe(`private-conversation${t}`).bind("received",function(s){console.log("🔥 Nouveau message :",s);const o=s.conversation_id,c=s.content,b=s.user.id,x=o===parseInt(document.getElementById("conversation_id").value),h=document.querySelector("#messages .py-6");if(!h)return;const f=parseInt(document.body.dataset.userId),w=M(s,f);h.insertAdjacentHTML("beforeend",w);const y=document.getElementById(`last-message-${o}`);if(y&&(y.textContent=c),!x&&b!==f){const p=document.getElementById(`unread-count-${o}`);if(p){let C=parseInt(p.textContent)||0;p.textContent=C+1}}const g=document.getElementById("messages").querySelector(".chat-body");g&&(g.scrollTop=g.scrollHeight)}),i.addEventListener("click",async()=>{var o;const s=a.value.trim();if(!s){alert("⛔️ Le message ne peut pas être vide.");return}i.disabled=!0,i.innerHTML='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';try{if(!(await fetch("/messenger",{method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":(o=document.querySelector('meta[name="csrf-token"]'))==null?void 0:o.content},body:JSON.stringify({conversation_id:t,content:s})})).ok)throw new Error("Erreur lors de l'envoi du message.");console.log("📤 Message envoyé"),a.value=""}catch(c){alert("❌ Une erreur s’est produite lors de l’envoi du message."),console.error(c)}finally{i.disabled=!1,i.innerHTML=`
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            `}})}).catch(r=>{console.error("Erreur lors de la récupération des messages :",r)})})})});function I(e){return e.replace(/[&<>"']/g,n=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#039;"})[n])}function $(e){const n=document.getElementById("messages"),v=document.getElementById("modal-commande"),d=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),r=t=>{const a=new Date(t),i=new Date,l=new Date;l.setDate(i.getDate()-1);const m=(s,o)=>s.getFullYear()===o.getFullYear()&&s.getMonth()===o.getMonth()&&s.getDate()===o.getDate();return m(a,i)?"Aujourd’hui":m(a,l)?"Hier":a.toLocaleDateString("fr-FR",{weekday:"long",day:"numeric",month:"long",year:"numeric"})};v.innerHTML="",v.innerHTML=`

          <form action="/commandes" method="POST">
                <input type="hidden" name="_token" value="${d}">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <h2>Créer une commande</h2>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <h5>Poids</h5>
                                            <div class="form-group">
                                                <input type="text" id="kg_commande" name="kg_commande"
                                                    required class="form-control"
                                                    placeholder="Nombre de Kilo">
                                                <x-input-error :messages="$errors->get('kg_commande')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <h5>Prix/Kg</h5>
                                            <div class="form-group">
                                                <input type="text" id="price" name="price"
                                                    class="form-control"
                                                    placeholder="Prix/kg">
                                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <input type="hidden" name="annonce_id" value="${e.annonce.id}">
                                <input type="hidden" name="recever_id" value="${e.recipient.id}">
                                <input type="hidden" name="conversation_id" value="${e.id}">
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg">Créer</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
    
    `,n.innerHTML="",n.innerHTML=`
                <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <div class="chat-header border-bottom py-4 py-lg-7">
                            <div class="row align-items-center">

                                <!-- Mobile: close -->
                                <div class="col-2 d-xl-none">
                                    <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
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
                                                        <img class="avatar-img" src="${e.users.length>1?"":"storage/"+e.users[0].image}" alt="">
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <h5 class="text-truncate"> ${e.users.length>1?e.title:e.users[0].pseudo} | ${e.annonce.title} 
                                                    </h5>
                                                    <p class="text-truncate"><span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Title -->

                                        <!-- Toolbar -->
                                        <div class="col-xl-6 d-none d-xl-block">
                                            <div class="row align-items-center justify-content-end gx-6">
                                                <div class="col-auto">
                                                  
                                                </div>

                                                <div class="col-auto"> ${parseInt(document.body.dataset.userId)===e.recipient.id?"":`
                                                    
                                                    <div class="avatar-group">
                                                        <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.49-.402L1.61 3.607 1.11 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 6h8.17l1.2-5.6H3.102z"/>
                                                                    <path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                            </svg>

                                                        </a>

                                                    </div>
                                                    `}
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Toolbar -->
                                    </div>
                                </div>
                                <!-- Content -->

                                <!-- Mobile: more -->
                                <div class="col-2 d-xl-none text-end">
                                    <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
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

                                    ${e.messages.map(t=>`
                                    <!-- Message -->
                                    <div class="${t.user.id===parseInt(document.body.dataset.userId)?"message message-out":"message"}">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="storage/${t.user.image}" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">

                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p> ${t.content} </p>
                                                    </div>
                                      
                                                </div>

                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted"> ${r(t.created_at)} </span>

                                            </div>
                                        </div>
                                    </div>

                                    `).join("")}

                                    <!-- Divider -->
                                    <div class="message-divider">
                                      
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
                            <div id="myForm"  class="chat-form rounded-pill bg-dark" >
                             
                                <div class="row align-items-center gx-0">
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea id="content" name="content" class="form-control px-0" placeholder="Tapez votre message..." rows="1" > ${e.session} </textarea>
                                        </div>
                                    </div>

                                    <input id="conversation_id" type="hidden" name="conversation_id" value="${e.id}" >

                                    <div class="col-auto">
                                        <button id="submitMessage" type="submit" class="btn btn-icon btn-primary rounded-circle ms-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat: Form -->
                        </div>
                        <!-- Chat: Footer -->
                    </div>
    `,requestAnimationFrame(()=>{const t=n.querySelector(".chat-body");if(!t)return;const a=n.querySelector(".chat-footer"),i=a?a.offsetHeight:0;t.scrollTop=t.scrollHeight-i})}function M(e,n){return`
        <div class="last-message ${e.user.id===n?"message message-out":"message"}">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                <img class="avatar-img" src="storage/${e.user.image}" alt="">
            </a>

            <div class="message-inner">
                <div class="message-body">
                    <div class="message-content">
                        <div class="message-text">
                            <p>${I(e.content)}</p>
                        </div>
                    </div>
                </div>

                <div class="message-footer">
                    <span class="extra-small text-muted">${new Date(e.created_at).toLocaleTimeString("fr-FR",{hour:"2-digit",minute:"2-digit"})}</span>
                </div>
            </div>
        </div>
        <div class="message-divider">
                                      
        </div>
    `}
