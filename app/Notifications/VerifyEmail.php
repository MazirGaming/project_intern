<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        $url = $this->verificationUrl($notifiable);
        return (new MailMessage)
        ->salutation('')
        ->with('')
        ->markdown('mail.invoice.paid', ['url'=> $url]);
    }
}
