<?php

namespace PYB\User\Listeners;

use Illuminate\Support\Facades\Mail;
use PYB\User\Mail\SendEmailToUserMail;

class SendEmailToUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event)
    {
        $email = new SendEmailToUserMail();
        Mail::to($event->email)->send($email);

    }
}
