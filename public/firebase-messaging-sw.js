/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
        apiKey: "AIzaSyAGPqYuvoom0xuXuGsPDDkvUjo6dy2divk",
        authDomain: "management-779ec.firebaseapp.com",
        projectId: "management-779ec",
        storageBucket: "management-779ec.appspot.com",
        messagingSenderId: "479176157552",
        appId: "1:479176157552:web:26c642a398c673788907b5",
        measurementId: "G-QJRPBX9YHP"
        });

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(payload);
    const notification = JSON.parse(payload);
    const notificationOptions = {
        body: notification.body,
        icon: notification.icon
    }
    const options = {
        time_to_live: payload.time_to_live
    }

    return self.registration.showNotification(
        payload.notification.title,
        notificationOptions,
        options
    );
});


