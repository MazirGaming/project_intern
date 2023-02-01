<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class CheckOutOderMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $courses;

    public function __construct($courses)
    {
        $this->courses = $courses;
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.check_out',
            with: [
                'listCourse' => $this->courses
            ],
        );
    }
}
