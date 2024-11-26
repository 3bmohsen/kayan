<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifications', function ($user) {
    return true; // أو تحقق من إذن المستخدم إذا لزم الأمر
});

