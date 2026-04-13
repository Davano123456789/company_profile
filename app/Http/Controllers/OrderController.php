<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::with('service')->where('user_id', auth()->id())->latest()->get();
        return view('dashboard.client_index', compact('orders'));
    }

    public function create()
    {
        $services = \App\Models\Service::all();
        return view('contact', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'address' => 'required|string|max:500',
            'receipt' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('receipt')->store('receipts', 'public');

        \App\Models\Order::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'address' => $request->address,
            'receipt_image' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Pesanan berhasil dibuat, menunggu konfirmasi admin.');
    }

    public function complete(\App\Models\Order $order)
    {
        if ($order->user_id !== auth()->id() || $order->status !== 'in_progress') {
            abort(403);
        }

        $order->update(['status' => 'completed']);
        return back()->with('success', 'Pesanan telah diselesaikan.');
    }
}
