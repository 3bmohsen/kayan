import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
Echo.channel('notifications')
    .listen('NotificationSent', (e) => {
        // هنا يمكنك إضافة كود لعرض الإشعار في واجهة المستخدم
        console.log(e.notification); // استخدم هذه البيانات لعرضها في واجهتك
        // مثال على عرض الإشعار:
        alert(e.notification); // يمكنك استخدام مكتبة مثل Toastr أو SweetAlert لجعلها أكثر جاذبية
    });

    window.Echo.channel('notifications')
    .listen('NotificationSent', (e) => {
        console.log('Notification received:', e.notification);
        // هنا يمكنك عرض الإشعار باستخدام Toastr أو أي مكتبة أخرى
        toastr.info(e.notification);
    });

