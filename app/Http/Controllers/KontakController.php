<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    public function index()
    {
        $menus = Menu::active()->get();

        return view('kontak', compact('menus'));
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $menu = Menu::findOrFail($validated['menu_id']);
        $subtotal = $menu->price * $validated['quantity'];

        DB::transaction(function () use ($validated, $menu, $subtotal) {
            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'] ?? null,
                'event_date' => $validated['event_date'],
                'event_address' => $validated['event_address'],
                'notes' => $validated['notes'] ?? null,
                'total_price' => $subtotal,
                'status' => 'pending',
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $validated['quantity'],
                'price' => $menu->price,
                'subtotal' => $subtotal,
            ]);
        });

        return back()->with('success', 'Pesanan berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }
}
