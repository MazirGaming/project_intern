<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Email;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        $url = $this->verificationUrl($notifiable);
        return (new MailMessage)
        
        ->greeting('alo')
        ->action('Xác thực Email', $this->verificationUrl($notifiable))
        ->line('Thank you for using our application!')
        ->view('auth.verify',['url'=> $this->verificationUrl($notifiable)]);
    }
}