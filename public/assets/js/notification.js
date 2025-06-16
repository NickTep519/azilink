document.addEventListener('DOMContentLoaded', function () {
    const notifBtn = document.getElementById('dropdownNotify');
    const notifList = document.getElementById('notifList');
    const notifCount = document.getElementById('notifCount');
    let audio = new Audio('assets/notifications/azilink-notification.wav');
    let soundAllowed = false;

    document.getElementById('enableSoundBtn').addEventListener('click', () => {
        soundAllowed = true;
        audio.play(); // Pour débloquer l'autoplay
        console.log("Le son est maintenant activé !");
        // document.getElementById('enableSoundBtn').style.display = "none";
    });

    document.getElementById('dropdownNotify').addEventListener('click', () => {
        markNotificationsAsRead();

    });

    function markNotificationsAsRead() {
        fetch('/notifications/mark-as-read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log("✅ Notifications marquées comme lues !");
            // Optionnel : mettre le compteur à 0
            document.querySelector('.badge-notify span').textContent = '';
        })
        .catch(err => {
            console.error("Erreur lors du marquage des notifications :", err);
        });
    }

    function playNotificationSound() {
        if (soundAllowed) {
            audio.play().catch(err => {
                console.warn("Impossible de jouer le son :", err);
            });
        }
    }

    function updateBadge(count) {
        const badge = document.querySelector('#dropdownNotify .badge-notify');
        if (count > 0) {
            if (!badge) {
                const newBadge = document.createElement('span');
                newBadge.classList.add('badge-notify');
                newBadge.textContent = count;
                notifBtn.appendChild(newBadge);
            } else {
                badge.textContent = count;
            }
        } else if (badge) {
            badge.remove();
        }
    }

    function triggerVibration() {
        if (navigator.vibrate) {
            navigator.vibrate(200); // Vibration de 200ms
        }
    }
      

    function loadNotifications() {
        fetch('/notifications')
            .then(res => res.json())
            .then(data => {
                notifList.innerHTML = '';
                let newNotifCount = data.unreadNotifications.length;

                if (data.notifications.length === 0) {
                    notifList.innerHTML = '<li class="notif-item text-center text-muted">Aucune notification</li>';
                } else {
                    data.notifications.forEach(notif => {
                        const li = document.createElement('li');
                        li.classList.add('notif-item');
                        li.innerHTML = `
                            <div class="notif-content">
                                <strong>${notif.title}</strong><br>
                                <small>${notif.time}</small>
                            </div>
                        `;
                        li.addEventListener('click', () => {
                            window.location.href = notif.url;
                        });
                        notifList.appendChild(li);
                    });
                    
                    // newNotifCount++;
                };
                

                updateBadge(newNotifCount); // Mis à jour du badge
                triggerVibration();  // vibration
                if (data.unreadNotifications.length !== 0) {
                    playNotificationSound();  // Joue le son     
                }
               
            })
            .catch(err => {
                console.error('Erreur de chargement des notifications', err);
                notifList.innerHTML = '<li class="notif-item text-danger text-center">Erreur de chargement</li>';
            });
    }

    notifBtn.addEventListener('click', loadNotifications);
    setInterval(loadNotifications, 3000); // Rechargement automatique toutes les 3 secondes
    loadNotifications(); // Charger les notifications dès le début
    playNotificationSound();  // Joue le son

});
