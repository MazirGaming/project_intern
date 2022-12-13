<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Contracts\Queue\ShouldQueue;

// use Illuminate\Notifications\Notification;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\URL;

class VerifyEmail extends VerifyEmailBase implements ShouldQueue
{
    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->markdown('mail.invoice.verify', ['url'=> $this->verificationUrl($notifiable), 'name'=> $notifiable->name]);
    }
}
