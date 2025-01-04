<?php

namespace PYB\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailToUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    public function attachments(): array
    {
        return [];
    }
    public  function build()
    {
         return $this->markdown('User::mail.send-email-to-user-mail');
    }
}
