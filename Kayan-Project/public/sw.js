// service-worker.js

self.addEventListener('push', function(event) {
    const data = event.data.json();
    const title = data.title || "Notification Title";
    const options = {
        body: data.body || "Notification Body",
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});
