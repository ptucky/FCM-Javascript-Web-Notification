// [START initialize_firebase_in_sw]
importScripts('https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js');

// messagingSenderId.
firebase.initializeApp({
  'messagingSenderId': '223623084549'
});

// messages.
const messaging = firebase.messaging();
// [END initialize_firebase_in_sw]

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  /*   
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.'
    }; 
  */

  // Customize notification here
  const notificationTitle = payLoad.notification.title;
  const notificationOptions = {
    body: payLoad.notification.body,
    icon: payLoad.notification.icon,
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
// [END background_handler]