<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
        ]);

        $subtotal = $request->quantity * $request->price;

        $orderItem = OrderItem::create([
            'order_id' => $request->order_id,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'subtotal' => $subtotal,
        ]);

        $order = $orderItem->order;
        $order->total_amount = $order->items->sum('subtotal');
        $order->save();

        return redirect()->route('orders.show', $order)->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(OrderItem $orderItem)
    {
        $order = $orderItem->order;
        return view('order-items.edit', compact('orderItem', 'order'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
        ]);

        $orderItem->update([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'subtotal' => $request->quantity * $request->price,
        ]);

        $order = $orderItem->order;
        $order->total_amount = $order->items->sum('subtotal');
        $order->save();

        return redirect()->route('orders.show', $order)->with('success', 'Item berhasil diupdate.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        $order = $orderItem->order;
        $order->total_amount = $order->items->sum('subtotal');
        $order->save();

        return redirect()->route('orders.show', $order)->with('success', 'Item berhasil dihapus.');
    }
}
