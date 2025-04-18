<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        $orders = Order::where('user_id', Auth::id())
            ->when($request->status, fn($q, $status) => $q->where('status', $status))
            ->paginate(10);

        return OrderResource::collection($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $total = collect($data['items'])->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'user_id' => Auth::id(),
            'items' => $data['items'],
            'total' => $total,
            'status' => 'pending',
        ]);

       // Log::info($order);
        return new OrderResource($order);
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        if ($order->payments()->exists()) {
            return response()->json(['message' => trans('cannot_update_paid_order')], 400);
        }

        $order->update($request->validated());
        return new OrderResource($order);
    }

    public function destroy(Order $order)
    {
        if ($order->payments()->exists()) {
            return response()->json(['message' => trans('cannot_delete_paid_order')], 400);
        }

        $order->delete();
        return response()->json(['message' => trans('order_deleted')]);
    }

}
