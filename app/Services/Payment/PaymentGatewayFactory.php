<?php

namespace App\Services\Payment;

class PaymentGatewayFactory
{
    public static function create($gateway)
    {
        return match ($gateway) {
            'stripe' => new StripeService(),
            //'paypal' => new PayPalService(),
            // and so on

            default => throw new \Exception('Invalid Payment Gateway'),
        };
    }
}
