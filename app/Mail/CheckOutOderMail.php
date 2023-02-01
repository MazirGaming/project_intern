<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;

class CheckOutOderMail extends Mailable implements ShouldQueue
{
    use Queueable;

    public $mailData;
    public $cart;

    public function __construct($mailData, $cart)
    {
        $this->mailData = $mailData;
        $this->cart = $cart;
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.check_out',
            with: [
                'total' => $this->mailData['total'],
                'listCourse' => $this->cart
            ],
        );
    }
}
