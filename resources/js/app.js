import "./bootstrap";
import pusher from "./pusherClient";

const currentUserId = parseInt(document.body.dataset.userId);

// Abonnement Pusher à toutes les conversations visibles
document.querySelectorAll(".conversation-item").forEach((item) => {
    const conversationId = item.dataset.conversationId;

    // const channel = pusher.subscribe(`private-conversation${conversationId}`);

    if (pusher.channel(`private-conversation${conversationId}`)) {
        pusher.unsubscribe(`private-conversation${conversationId}`);
    }
    const channel = pusher.subscribe(`private-conversation${conversationId}`);

    channel.bind("received", (data) => {
        const message = data.content;
        const convId = data.conversation_id;

        // 1. Mettre à jour le dernier message
        const lastMessageEl = document.getElementById(`last-message-${convId}`);
        if (lastMessageEl) {
            lastMessageEl.innerHTML = data.content.slice(0, 90); // update preview
        }

        // 2. Mettre à jour le badge
        const isOpen =
            parseInt(document.getElementById("conversation_id")?.value) ===
            convId;
        if (!isOpen && message.user_id !== currentUserId) {
            const badge = document.getElementById(`unread-count-${convId}`);
            if (badge) {
                let count = parseInt(badge.textContent) || 0;
                badge.textContent = count + 1;
            } else {
                // si le badge n’existe pas encore
                const badgeHtml = `
                    <div class="badge badge-circle bg-primary ms-5" id="unread-count-${convId}">
                        <span>1</span>
                    </div>
                `;
                item.querySelector(
                    ".d-flex.align-items-center"
                ).insertAdjacentHTML("beforeend", badgeHtml);
            }
        }

        // 3. Remonter la conversation en haut
        const container = document.getElementById("conversation-list");
        const conversationElement = document.getElementById(
            `conversation-${convId}`
        );
        if (container && conversationElement) {
            container.prepend(
                conversationElement.closest(".conversation-item")
            );
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const conversationLinks = document.querySelectorAll("#loadConversation");
    const mainContainer = document.querySelector(".main");

    conversationLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            const conversationId = this.dataset.id;

            // Supprime la classe active de toutes les conversations
            document.querySelectorAll(".conversation-row").forEach((row) => {
                row.classList.remove("active-conversation");
            });

            const activeRow = document.getElementById(
                `conversation-row-${conversationId}`
            );
            if (activeRow) {
                activeRow.classList.add("active-conversation");
            }

            const url = this.getAttribute("data-url");

            fetch(url)
                .then((response) => response.json())
                .then((data) => {
                    displayConversation(data);

                    // Afficher la box contenant les détails d'une conversation
                    mainContainer.classList.add("is-visible");

                    const conversationId =
                        document.getElementById("conversation_id").value;
                    const contentMessage = document.getElementById("content");
                    const submitMessage =
                        document.getElementById("submitMessage");

                    // Quand l'utilisateur clique sur une conversation, réinitialise le compteur de non-lus

                    const unreadBadge = document.getElementById(
                        `unread-count-${conversationId}`
                    );
                    if (unreadBadge) {
                        unreadBadge.textContent = "";
                    }

                    // Pusher

                    if (
                        pusher.channel(`private-conversation${conversationId}`)
                    ) {
                        pusher.unsubscribe(
                            `private-conversation${conversationId}`
                        );
                    }
                    const channel = pusher.subscribe(
                        `private-conversation${conversationId}`
                    );

                    channel.bind("received", function (data) {
                        console.log("🔥 Nouveau message :", data);

                        const conversationId = data.conversation_id;
                        const messageBody = data.content;
                        const senderId = data.user.id;

                        const isCurrentConversation =
                            conversationId ==
                            parseInt(
                                document.getElementById("conversation_id").value
                            );

                        const messagesContainer =
                            document.querySelector("#messages .py-6");

                        if (!messagesContainer) return;

                        const currentUserId = parseInt(
                            document.body.dataset.userId
                        );

                        if (isCurrentConversation) {
                            const html = renderMessage(data, currentUserId);

                            messagesContainer.insertAdjacentHTML(
                                "beforeend",
                                html
                            );
                        }

                        // 1. Mettre à jour le dernier message dans la liste
                        const lastMessageElement = document.getElementById(
                            `last-message-${conversationId}`
                        );
                        if (lastMessageElement) {
                            lastMessageElement.textContent = messageBody;
                        }

                        // 2. Incrémenter le compteur de messages non lus si ce n’est pas la conversation active
                        if (
                            !isCurrentConversation &&
                            senderId !== currentUserId
                        ) {
                            const unreadBadge = document.getElementById(
                                `unread-count-${conversationId}`
                            );
                            if (unreadBadge) {
                                let current =
                                    parseInt(unreadBadge.textContent) || 0;
                                unreadBadge.textContent = current + 1;
                            }
                        }

                        const messagContainer =
                            document.getElementById("messages");
                        const chatBody =
                            messagContainer.querySelector(".chat-body");

                        if (chatBody) {
                            chatBody.scrollTop = chatBody.scrollHeight;
                        }
                    });

                    submitMessage.addEventListener("click", async () => {
                        const content = contentMessage.value.trim();

                        if (!content) {
                            alert("⛔️ Le message ne peut pas être vide.");
                            return;
                        }

                        submitMessage.disabled = true;
                        submitMessage.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;

                        try {
                            const response = await fetch("/messenger", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]'
                                    )?.content,
                                },
                                body: JSON.stringify({
                                    conversation_id: conversationId,
                                    content: content,
                                }),
                            });

                            if (!response.ok) {
                                throw new Error(
                                    "Erreur lors de l'envoi du message."
                                );
                            }

                            console.log("📤 Message envoyé");
                            contentMessage.value = "";
                        } catch (error) {
                            alert(
                                "❌ Une erreur s’est produite lors de l’envoi du message."
                            );
                            console.error(error);
                        } finally {
                            submitMessage.disabled = false;
                            submitMessage.innerHTML = `
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            `;
                        }
                    });

                    /******************** */

                    // check message lus/message non lus
                    // pusher
                    //     .subscribe(`private-conversation${conversationId}`)
                    //     .bind("MessageReadEvent", function (data) {
                    //         const iconContainer = document.getElementById(
                    //             `read-status-${data.message_id}`
                    //         );
                    //         if (iconContainer) {
                    //             iconContainer.innerHTML = `<i class="bi bi-check2-all text-primary"></i>`;
                    //         }
                    //     });

                    // <span
                    //     class="extra-small text-muted read-status"
                    //     id="read-status-${message.id}"
                    // >
                    //     <i class="bi bi-check2-all text-primary"></i>
                    //     <i class="bi bi-check text-muted"></i>
                    // </span>;

                    /******************** */
                })
                .catch((error) => {
                    console.error(
                        "Erreur lors de la récupération des messages :",
                        error
                    );
                });
        });
    });
});

function escapeHTML(str) {
    return str.replace(
        /[&<>"']/g,
        (match) =>
            ({
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#039;",
            }[match])
    );
}

function displayConversation(conversation) {
    const messagesContainer = document.getElementById("messages");
    const commandeContainer = document.getElementById("modal-commande");

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const formatDate = (isoString) => {
        const date = new Date(isoString);
        const today = new Date();
        const yesterday = new Date();
        yesterday.setDate(today.getDate() - 1);

        const isSameDay = (d1, d2) =>
            d1.getFullYear() === d2.getFullYear() &&
            d1.getMonth() === d2.getMonth() &&
            d1.getDate() === d2.getDate();

        if (isSameDay(date, today)) return "Aujourd’hui";
        if (isSameDay(date, yesterday)) return "Hier";

        return date.toLocaleDateString("fr-FR", {
            weekday: "long",
            day: "numeric",
            month: "long",
            year: "numeric",
        });
    };

    commandeContainer.innerHTML = "";

    commandeContainer.innerHTML = `

          <form action="/commandes" method="POST">
                <input type="hidden" name="_token" value="${csrfToken}">
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
                                <input type="hidden" name="annonce_id" value="${conversation.annonce.id}">
                                <input type="hidden" name="recever_id" value="${conversation.recipient.id}">
                                <input type="hidden" name="conversation_id" value="${conversation.id}">
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

    `;

    messagesContainer.innerHTML = ""; // Vide le conteneur avant de remplir

    messagesContainer.innerHTML = `
                <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <div class="chat-header border-bottom py-4 py-lg-7">
                            <div class="row align-items-center">

                                <!-- Mobile: close -->
                                <div class="col-2 d-xl-none">
                                    <button type="button" id="closeConversation" class="border-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </button>
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
                                                        <img class="avatar-img" src="${
                                                            conversation.users
                                                                .length > 1
                                                                ? ""
                                                                : "storage/" +
                                                                  conversation
                                                                      .users[0]
                                                                      .image
                                                        }" alt="">
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <h5 class="text-truncate"> ${
                                                        conversation.users
                                                            .length > 1
                                                            ? conversation.title
                                                            : conversation
                                                                  .users[0]
                                                                  .pseudo
                                                    } | ${
        conversation.annonce.title
    }
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

                                                <div class="col-auto"> ${
                                                    parseInt(
                                                        document.body.dataset
                                                            .userId
                                                    ) ===
                                                    conversation.recipient.id
                                                        ? ""
                                                        : `

                                                    <div class="avatar-group">
                                                        <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.49-.402L1.61 3.607 1.11 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 6h8.17l1.2-5.6H3.102z"/>
                                                                    <path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                            </svg>

                                                        </a>

                                                    </div>
                                                    `
                                                }

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Toolbar -->
                                    </div>
                                </div>
                                <!-- Content -->

                                <!-- Mobile: more -->
                                <div class="col-2 d-xl-none text-end">
                                    <div class="row align-items-center justify-content-end gx-6">
                                        <div class="col-auto">

                                        </div>

                                        <div class="col-auto"> ${
                                            parseInt(
                                                document.body.dataset.userId
                                            ) === conversation.recipient.id
                                                ? ""
                                                : `

                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.49-.402L1.61 3.607 1.11 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 6h8.17l1.2-5.6H3.102z"/>
                                                            <path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>

                                                </a>

                                            </div>
                                            `
                                        }

                                        </div>
                                    </div>
                                </div>
                                <!-- Mobile: more -->

                            </div>
                        </div>
                        <!-- Chat: Header -->

                        <!-- Chat: Content -->
                        <div class="chat-body hide-scrollbar flex-1 h-100">
                            <div class="chat-body-inner py-9 py-lg-0">
                                <div class="py-6 py-lg-12">

                                    ${conversation.messages
                                        .map(
                                            (message) => `
                                    <!-- Message -->
                                    <div class="${
                                        message.user.id ===
                                        parseInt(document.body.dataset.userId)
                                            ? "message message-out"
                                            : "message"
                                    }">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="storage/${
                                                message.user.image
                                            }" alt="">
                                        </a>

                                        <div class="message-inner">
                                            <div class="message-body">

                                                <div class="message-content">
                                                    <div class="message-text">
                                                        <p> ${
                                                            message.content
                                                        } </p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="message-footer">
                                                <span class="extra-small text-muted"> ${formatDate(
                                                    message.created_at
                                                )} </span>

                                            </div>
                                        </div>
                                    </div>

                                    `
                                        )
                                        .join("")}

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

                                    <input id="conversation_id" type="hidden" name="conversation_id" value="${
                                        conversation.id
                                    }" >

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea id="content" name="content" class="form-control px-0" placeholder="Tapez votre message..." rows="1" > ${
                                                conversation.session
                                            } </textarea>
                                        </div>
                                    </div>

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
    `;

    requestAnimationFrame(() => {
        const body = messagesContainer.querySelector(".chat-body");
        if (!body) return;

        const footer = messagesContainer.querySelector(".chat-footer");
        const footerHeight = footer ? footer.offsetHeight : 0;

        body.scrollTop = body.scrollHeight - footerHeight;
    });

    // Button permettant de fermer la conversation sur mobile
    const closeConversationBtn = document.getElementById("closeConversation");
    const mainContainer = document.querySelector(".main");

    closeConversationBtn?.addEventListener("click", function () {
        mainContainer?.classList.contains("is-visible") &&
            mainContainer?.classList.remove("is-visible");
    });
}

function renderMessage(message, userId) {
    const isMine = message.user.id === userId;

    return `
        <div class="last-message ${isMine ? "message message-out" : "message"}">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                <img class="avatar-img" src="storage/${
                    message.user.image
                }" alt="">
            </a>

            <div class="message-inner">
                <div class="message-body">
                    <div class="message-content">
                        <div class="message-text">
                            <p>${escapeHTML(message.content)}</p>
                        </div>
                    </div>
                </div>

                <div class="message-footer">
                    <span class="extra-small text-muted">${new Date(
                        message.created_at
                    ).toLocaleTimeString("fr-FR", {
                        hour: "2-digit",
                        minute: "2-digit",
                    })}</span>
                </div>
            </div>
        </div>
        <div class="message-divider">

        </div>
    `;
}
