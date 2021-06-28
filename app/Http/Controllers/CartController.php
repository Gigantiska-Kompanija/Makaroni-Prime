<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makarons;
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
            $cartItems = Makarons::whereIn('name', session()->get('makaroni'))->get();
        }
        else $cartItems = [];
        return view('cart', compact('cartItems'));
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        return view('form-order');
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $makarons = Makarons::findOrFail($name);
        session()->push('makaroni',$makarons);
        return redirect(route('store'));
        //return 'pogger';
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
