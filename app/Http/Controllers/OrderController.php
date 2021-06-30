<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function show($id) {
        $order = Order::findOrFail($id);
        return view('orders.info', compact('order'));
    }
}
