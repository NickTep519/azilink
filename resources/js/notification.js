import "./bootstrap";
import pusher from "./pusherClient";

const currentUserId = parseInt(document.body.dataset.userId);

const notifList = document.getElementById("notifList");
const notifSound = new Audio("/sounds/notification.mp3");
const dropdownBtn = document.getElementById("dropdownNotify");

// Supprimer l'ancien abonnement si besoin
if (pusher.channel(`private-App.Models.User.${currentUserId}`)) {
    pusher.unsubscribe(`private-App.Models.User.${currentUserId}`);
}

const channel = pusher.subscribe(`private-App.Models.User.${currentUserId}`);

// Ajoute une nouvelle notif dans la dropdown
function appendNotification(data, fromDb = false) {
    const li = document.createElement("li");
    li.classList.add("notif-item", "border-bottom");

    // ⚠️ handle source differences
    const message = fromDb ? data.data.message : data.message;
    const url = fromDb ? data.data.url : data.url;
    const notifId = fromDb ? data.id : data.id;

    const createdAt = fromDb ? data.data.created_at : data.created_at;

    const isRead = fromDb ? data.read_at !== null : false;

    li.innerHTML = `
    <a href="${
        url || "#"
    }" class="d-block text-dark text-decoration-none p-2 notif-link ${
        isRead ? "read" : "unread"
    }" data-id="${notifId}">
        <div class="fw-bold">${message}</div>
        <small class="text-muted">${new Date(
            data.created_at || Date.now()
        ).toLocaleString()}</small>
    </a>
`;

    // Nettoyage "Chargement..."
    const firstItem = notifList.querySelector(".notif-item");
    if (firstItem && firstItem.textContent.includes("Chargement")) {
        notifList.innerHTML = "";
    }

    notifList.prepend(li);
}

const notifCount = document.getElementById("notifCount");
let count = 0;

function updateNotifCount() {
    count++;
    notifCount.textContent = count;
    notifCount.style.display = "inline-block";
}


window.addEventListener("DOMContentLoaded", () => {
    fetch("/notifications")
        .then((response) => response.json())
        .then(({ notifications, unread_count }) => {
            notifList.innerHTML = "";
            notifications.forEach((n) => appendNotification(n, true));
            setNotifCount(unread_count);
            count = unread_count; // 🧠 important pour rester synchro
        });
});

function setNotifCount(count) {
    if (count > 0) {
        notifCount.textContent = count;
        notifCount.style.display = "inline-block";
    } else {
        notifCount.textContent = "";
        notifCount.style.display = "none";
    }
}

channel.bind(
    "Illuminate\\Notifications\\Events\\BroadcastNotificationCreated",
    function (data) {
        appendNotification(data);

        // Son si activé
        const enableSound = localStorage.getItem("notifSoundEnabled");
        if (enableSound === "true") {
            notifSound
                .play()
                .catch((err) => console.error("Erreur audio :", err));
        }

        // Incrémenter
        count++;
        setNotifCount(count);
    }
);

// Quand une notif est reçue depuis Laravel
// channel.bind(
//     "Illuminate\\Notifications\\Events\\BroadcastNotificationCreated",
//     function (data) {
//         console.log("Notif reçue :", data);
//         appendNotification(data);

//         // Son si activé
//         const enableSound = localStorage.getItem("notifSoundEnabled");
//         if (enableSound === "true") {
//             notifSound
//                 .play()
//                 .catch((err) => console.error("Erreur audio :", err));
//         }

//         updateNotifCount();

//         // (Facultatif) badge, vibration, changement visuel, etc.
//     }
// );

dropdownBtn.addEventListener("click", () => {
    fetch("/notifications/read-all", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                "meta[name='csrf-token']"
            ).content,
            Accept: "application/json",
        },
    }).then(() => {
        setNotifCount(0);
    });
});

notifList.addEventListener("click", function (e) {
    const target = e.target.closest(".notif-link");
    if (!target) return;

    const notifId = target.dataset.id;
    const href = target.getAttribute("href");

    if (notifId) {
        fetch(`/notifications/read/${notifId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    "meta[name='csrf-token']"
                ).content,
                Accept: "application/json",
            },
        }).then(() => {});
    }

    // Rediriger
    if (href && href !== "#") {
        window.location.href = href;
    }

    e.preventDefault();
});
