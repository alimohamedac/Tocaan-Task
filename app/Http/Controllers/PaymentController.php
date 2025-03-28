<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\Payment\PaymentGatewayFactory;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        if ($order->status !== 'confirmed') {
            return response()->json(['message' => trans('order_not_confirmed')], 400);
        }

        try {
            $gateway = PaymentGatewayFactory::create(env('PAYMENT_GATEWAY', 'stripe'));
            $payment = $gateway->charge($order->total, $request->token);

            Payment::create([
                'order_id' => $order->id,
                'payment_id' => $payment['id'],
                'status' => 'successful',
                'method' => env('PAYMENT_GATEWAY', 'stripe'),
            ]);

            return response()->json(['message' => trans('payment_successful')]);
        } catch (\Exception $e) {
            return response()->json(['message' => trans('payment_failed'), 'error' => $e->getMessage()], 400);
        }
    }

    public function index(Order $order)
    {
        return response()->json($order->payments);
    }

    public function show(Payment $payment)
    {
        return response()->json($payment);
    }
}
