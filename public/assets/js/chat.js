document.addEventListener("DOMContentLoaded", function () {
    const conversationLinks = document.querySelectorAll("#loadConversation");
    const headBox = document.querySelector(".Chat .ChatHead");
    const messageBox = document.querySelector(".Chat .MessageContainer");
    const sendMessageContainer = document.querySelector(".Chat .SendMessage");
    const mainElement = document.getElementById("main-container");
    const createCommande = document.querySelector(".form-popup");
    const newMessageBubble = document.getElementById("newMessageBubble");


    const segments = window.location.pathname.split("/").filter(Boolean);
    const conversationId = segments.pop(); // Récupère l'ID de conversation dans l'URL

    if (!isNaN(conversationId)) { // Vérifie si c'est un nombre valide
        const linkToClick = document.querySelector(`[data-conversation-id="${conversationId}"]`) ;

        
        
        if (linkToClick) {
            linkToClick.click(); // Simule le clic sur le lien de la conversation
            console.error("Lien de conversation introuvable !");
        } else {
            console.error("Lien de conversation introuvable !");
        }
    }
    
    function isUserAtBottom(container, threshold = 100) {
        return (container.scrollHeight - container.scrollTop - container.clientHeight) < threshold;
    }

    function openConversation(url) {

        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                // Mettre à jour msg_history
                const messagesHtml = data.messages
                    .map(
                        (message) => `  
                        <div class="${
                            message.user.id ===
                            parseInt(mainElement.dataset.userId)
                                ? "message me"
                                : "message you"
                        }" data-id="${message.id}">
                            <p class="messageContent"> ${message.content} </p>
                            <div class="messageDetails">
                                <div class="messageTime"> ${
                                    message.created_at
                                } </div>
                                <i class="fa-solid fa-check"></i>
                            </div>
                        </div>
                    `
                    )
                    .join("");

                messageBox.innerHTML = messagesHtml;
                scrollToBottom(messageBox);

                // Mettre à jour l'en tête
                headBox.innerHTML = ` 
                    <li class="group">
                        <div class="back"> 
                            <i class="fa-solid fa-arrow-left"></i> 
                        </div>
                        <div class="avatar">
                            <img src="${data.headBox.avatar}" alt="">
                        </div>
                        <p class="GroupName"> ${data.headBox.name} | ${
                    data.headBox.annonceTitle
                } </p>
                    </li>
                    <div class="callGroup">
                     ${
                         data.headBox.canCreateOrder
                             ? `
                                    <button style="all: unset" class="open-button" onclick="openForm()">
                                        <i class="fa-solid fa-bell-concierge"></i> Créer une commande
                                    </button>
                                 `
                             : ""
                     }
                    </div>
                `;

                // Mise à jour du formulaire d'envoi de message
                if (data.canSendMessage) {
                    sendMessageContainer.innerHTML = ` 
                        <form id="MessageForm" action="/conversations/${
                            data.conversationId
                        }/save" method="POST">
                            <input type="hidden" name="_token" value="${
                                document.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content
                            }">
                            <input type="text" name="content" id="MessageInput" placeholder="Tapez votre message ici..." value="${
                                data.sessionMessage
                            }">
                            <button type="submit" class="Send"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    `;

                    const sendMessageForm =
                        sendMessageContainer.querySelector("form");
                    handleSendMessage(sendMessageForm, messageBox);
                } else {
                    sendMessageContainer.innerHTML =
                        "<p>Vous ne pouvez pas envoyer de messages dans cette conversation.</p>";
                }

                // Mise à jour du formulaire de commande
                createCommande.innerHTML = `
                    <form action="/commandes" method="POST" class="form-container">
                        <input type="hidden" name="_token" value="${
                            document.querySelector('meta[name="csrf-token"]')
                                .content
                        }">
                        <h3>Créer une commande</h3>
                        <label for="email"><b>Poids </b></label>
                        <input type="text" id="kg_commande" name="kg_commande" required class="form-control" placeholder="Nombre de Kilo">
                        <x-input-error :messages="$errors->get('kg_commande')" class="mt-2" />
                        <label for="psw"><b>Prix / Kg</b></label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Prix/kg">
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        <input type="hidden" name="annonce_id" value="${
                            data.annonceId
                        }">
                        <input type="hidden" name="recever_id" value="${
                            data.recipientId
                        }">
                         <input type="hidden" name="conversation_id" value="${
                            data.conversationId
                        }">
                        <button type="submit" class="btn"> Créer </button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Fermé</button>
                    </form>
                `;
            })
            .catch((error) => {
                console.error("Erreur lors du chargement des messages:", error);
            });

        // Actualiser les messages toutes les 2 secondes
        window.messageRefreshInterval = setInterval(() => {
            fetch(url)
                .then((response) => response.json())
                .then((data) => {
                    const currentMessages = messageBox.querySelectorAll('.message');
                    const lastMessage = currentMessages[currentMessages.length - 1];
                    const lastMessageId = lastMessage?.dataset?.id || null;
        
                    // Trouver les nouveaux messages
                    const newMessages = data.messages.filter(msg => {
                        return !lastMessageId || msg.id > parseInt(lastMessageId);
                    });
        
                    // Ajouter seulement les nouveaux messages
                    newMessages.forEach((message) => {
                        const messageHtml = `
                            <div class="message ${message.user.id === parseInt(mainElement.dataset.userId) ? 'me' : 'you'}" data-id="${message.id}">
                                <p class="messageContent">${message.content}</p>
                                <div class="messageDetails">
                                    <div class="messageTime">${message.created_at}</div>
                                    <i class="fa-solid fa-check"></i>
                                </div>
                            </div>
                        `;
        
                        messageBox.insertAdjacentHTML('beforeend', messageHtml);
                        
                        if (isUserAtBottom(messageBox)) {
                            // Si utilisateur en bas, scroll directement
                            messageBox.scrollTop = messageBox.scrollHeight;
                            newMessageBubble.style.display = "none";
                        } else {
                            // Sinon afficher la bulle pour prévenir
                            newMessageBubble.style.display = "block";
                        }
                    });
                    
                    // Mise en place du clic sur la bulle
                    newMessageBubble.onclick = () => {
                        messageBox.scrollTop = messageBox.scrollHeight;
                        newMessageBubble.style.display = "none";
                    };
        
                    // Scroll uniquement si on est déjà en bas
                    const isAtBottom = messageBox.scrollHeight - messageBox.scrollTop <= messageBox.clientHeight + 20;
                    if (isAtBottom && newMessages.length > 0) {
                        scrollToBottom(messageBox);
                    }
                })
                .catch((error) => {
                    console.error("Erreur lors de l'actualisation des messages:", error);
                });
        }, 2000);

    }

    // const conversationLinks = document.querySelectorAll(".conversation-link");
    conversationLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const url = this.getAttribute("data-url"); // Récupère l'URL avec l'ID de la conversation
            openConversation(url); // Ouvre la conversation
        });
    });

    function handleSendMessage(form, messageBox) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
    
            const formData = new FormData(this);
            const url = this.getAttribute("action");
    
            fetch(url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === "success") {
                        const existing = messageBox.querySelector(`[data-id="${data.message.id}"]`);
                        if (!existing) {
                            const newMessageHtml = `
                                <div class="message me" data-id="${data.message.id}">
                                    <p class="messageContent">${data.message.content}</p>
                                    <div class="messageDetails">
                                        <div class="messageTime">${data.message.created_at}</div>
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            `;
                            messageBox.insertAdjacentHTML('beforeend', newMessageHtml);
                        }
                        document.getElementById("MessageInput").value = "";
                        messageBox.scrollTop = messageBox.scrollHeight;
                    }
                })
                .catch((error) => {
                    console.error("Erreur lors de l'envoi du message:", error);
                });
        });
    }

});

function scrollToBottom(element) {
    element.scrollTop = element.scrollHeight;
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    if (!searchInput) return;

    const conversationList = document.getElementById("conversationList"); // Liste principale
    const conversations = Array.from(document.querySelectorAll(".group")); // Convertir NodeList en tableau

    searchInput.addEventListener("keyup", function () {
        const searchText = this.value.toLowerCase().trim();

        // Filtrer les conversations qui correspondent à la recherche
        const matchingConversations = [];
        const nonMatchingConversations = [];

        conversations.forEach((conversation) => {
            const groupName =
                conversation.querySelector(".GroupName")?.textContent.toLowerCase() || "";
            const groupDescrp =
                conversation.querySelector(".GroupDescrp")?.textContent.toLowerCase() || "";
            const titleText =
                conversation.querySelector("#loadConversation")?.getAttribute("title").toLowerCase() || "";

            if (
                groupName.includes(searchText) ||
                groupDescrp.includes(searchText) ||
                titleText.includes(searchText)
            ) {
                conversation.style.visibility = "visible";
                conversation.style.opacity = "1";
                conversation.style.height = "auto";
                conversation.style.transform = "scale(1)";
                matchingConversations.push(conversation);
            } else {
                conversation.style.visibility = "hidden";
                conversation.style.opacity = "0";
                conversation.style.height = "0";
                conversation.style.transform = "scale(0)";
                nonMatchingConversations.push(conversation);
            }
        });

        // Réorganiser la liste : afficher les résultats trouvés en haut
        conversationList.innerHTML = "";
        matchingConversations.forEach((conv) =>
            conversationList.appendChild(conv)
        );
        nonMatchingConversations.forEach((conv) =>
            conversationList.appendChild(conv)
        );
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner l'élément sur lequel tu veux capturer le clic
});
