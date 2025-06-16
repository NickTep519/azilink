import Pusher from 'pusher-js';

const pusher = new Pusher('cee91ded6834f2126760', {
    cluster: 'eu',
    forceTLS: true,
    authEndpoint: '/broadcasting/auth',
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    }
});

// Pusher.logToConsole = true;

export default pusher;
