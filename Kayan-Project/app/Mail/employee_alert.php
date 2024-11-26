<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class employee_alert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
    public function build()
    {
        return $this->subject('تنبيه من مؤسسة كيان')
                    ->view('emails.Emp_alert')
                    ->with([
                        'messageContent' => $this->message, // تأكد أن هذا نص
                    ]);
    }

 
}
