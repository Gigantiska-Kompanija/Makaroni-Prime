<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Makarons;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('makaroni')){
            $cartItems = Makarons::whereIn('name', array_keys(session()->get('makaroni')))->get();
        }
        else $cartItems = [];
        $amounts = session()->get('makaroni');
        return view('cart', compact('cartItems', 'amounts'));
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $items = session()->get('makaroni');
        $total = 0;
        foreach ($items as $name => $amount) {
            $total += $amount * (float) Makarons::find($name)->price;
        }
        return view('form-order', compact('total'));
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        $request->validate([
            'cardNr' => ['required', 'regex:/(^4[0-9]{12}(?:[0-9]{3})?$)|(^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$)|(3[47][0-9]{13})|(^3(?:0[0-5]|[68][0-9])[0-9]{11}$)|(^6(?:011|5[0-9]{2})[0-9]{12}$)|(^(?:2131|1800|35\d{3})\d{11}$)/gm'],
            'expireMM' => 'required',
            'expireYY' => 'required',
            'code' => 'required|string|min:3|max:3',
        ]);


        $items = session()->pull('makaroni');
        $total = 0;
        foreach ($items as $name => $amount) {
            $total += $amount * (float) Makarons::find($name)->price;
        }
        $order = new Order();
        $order->clientID = Auth::user()->id;
        $order->total = $total;
        $order->save();

        foreach ($items as $name => $amount) {
            $makarons = Makarons::find($name);
            $order->makaroni()->attach($makarons,
                  ['amount' => $amount, 'price' => $amount * $makarons->price]);
        }
        return redirect('/');
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $makarons = session()->pull('makaroni');

        if (session()->has('makaroni') && in_array($name, session()->get('makaroni'))){
            unset($makarons[$request->name]);
        }else{
            $makarons[$request->name] = 1;
        }
        session()->put('makaroni', $makarons);
    }

    public function amounts(Request $request) {
        $makarons = session()->pull('makaroni');
        $makarons[$request->name] = (int) $request->amount;
        session()->put('makaroni', $makarons);
        dump(\session()->all());
    }

    /**
     * Create a cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Edit a cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Save changes to cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Destroy a cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
