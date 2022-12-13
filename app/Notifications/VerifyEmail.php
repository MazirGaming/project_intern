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

    // public function __construct()
    // {
    //     //
    // }

    // public function via($notifiable)
    // {
    //     return ['mail'];
    // }

    // change as you want
    public function toMail($notifiable)
    {
        $name = $notifiable->name;

        $url = $this->verificationUrl($notifiable);
        return (new MailMessage)
        ->markdown('mail.invoice.paid', ['url'=> $url, 'name'=>$name]);
    }
//     protected function verificationUrl($notifiable)
//    {

//       return URL::temporarySignedRoute(
//         'verification.verify',
//         Carbon::now()->addMinute(525600),
//         [
//             'id' => $notifiable->getKey(),
//             'hash' => sha1($notifiable->getEmailForVerification()),
//         ]
//             );
//    }
}
