<?php

namespace App\Services\Payment;

use Stripe\Stripe;
use Stripe\Charge;

class StripeService implements PaymentGateway
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function charge($amount, $token)
    {
        return Charge::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Order Payment',
        ]);
    }
}

