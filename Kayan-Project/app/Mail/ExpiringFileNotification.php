<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiringFileNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $notificationMessage;

    public function __construct($message)
    {
        $this->notificationMessage = (string) $message;
    }

    public function build()
    {
        return $this->subject('File Expiration Notification')
                    ->view('emails.expiring_file_notification')
                    ->with(['notificationMessage' => $this->notificationMessage]);
    }
}
