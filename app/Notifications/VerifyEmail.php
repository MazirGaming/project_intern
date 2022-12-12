<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends VerifyEmailBase implements ShouldQueue
{
    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        $name = $notifiable->name;
        $url = $this->verificationUrl($notifiable);
        return (new MailMessage)
        ->markdown('mail.invoice.paid', ['url'=> $url, 'name'=>$name]);
    }
}
