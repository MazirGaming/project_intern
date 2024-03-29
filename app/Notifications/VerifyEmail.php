<?php

declare(strict_types=1);

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
        return (new MailMessage())
        ->markdown('mail.verify_user', ['url'=> $this->verificationUrl($notifiable), 'name'=> $notifiable->name]);
    }
}
