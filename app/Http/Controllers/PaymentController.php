<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\StripeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        if ($order->status !== 'confirmed') {
            return response()->json(['message' => trans('Payments are allowed only for confirmed orders')], 400);
        }

        $paymentService = new StripeService();
        $payment = $paymentService->charge($order->total, $request->token);

        Payment::create([
            'order_id' => $order->id,
            'payment_id' => $payment['id'],
            'status' => 'successful',
            'method' => 'stripe',
        ]);

        return response()->json(['message' => trans('Payment successful')]);
    }

    public function index(Order $order)
    {
        return response()->json($order->payments);
    }
}
