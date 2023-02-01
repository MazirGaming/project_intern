<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\CheckOutOderMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMailCheckoutOrder($request)
    {
        return Mail::to($request->user())->send(new CheckOutOderMail($request->all(), app(CartService::class)->getAll()));
    }
}
