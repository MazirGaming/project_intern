<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\CheckOutOderMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMailCheckoutOrder($user, $courses)
    {
        return Mail::to($user)->send(new CheckOutOderMail($courses));
    }
}
