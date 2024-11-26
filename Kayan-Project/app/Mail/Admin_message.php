<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Admin_message extends Mailable
{    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
    public function build()
    {
        return $this->subject('إشعار من مدير مؤسسة كيان')
                    ->view('emails.Admin_message')
                    ->with([
                        'messageContent' => $this->message, // تأكد أن هذا نص
                    ]);
    }
}
