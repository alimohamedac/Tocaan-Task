<?php

namespace App\Services\Payment;

interface PaymentGateway
{
    public function charge($amount, $token);
}
