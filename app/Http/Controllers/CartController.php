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
        if (!session()->has('makaroni')) {
            return redirect('/');
        }

        $request->validate([
            'cardNr' => ['required', 'regex:/(\d{4} ?){3}\d{4}/'],
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
                  ['amount' => $amount, 'price' => $makarons->price]);
            $makarons->quantity = $makarons->quantity - $amount;
            $makarons->save();
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
        
        if ($makarons && in_array($name, array_keys($makarons))){
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
