<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller {

    public function show($id) {
        $order = Order::findOrFail($id);
        if (!Auth::guard('manager')->check()) {
            if ($order->clientID != Auth::user()->id) {
                throw new NotFoundHttpException();
            }
        }
        return view('orders.info', compact('order'));
    }
}
