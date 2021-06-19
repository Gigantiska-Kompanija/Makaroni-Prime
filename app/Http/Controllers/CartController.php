<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makarons;

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
            $cartItems = Makarons::whereIn('makaroni', session()->get('makaroni'))->get();
        }
        else $cartItems = [];
        return view('cart', compact('cartItems'));
        //return view('cart');
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
    public function store($name)
    {
        //$makarons = Makarons::findOrFail($name);
        session()->push('makaroni',$name);
        return view('store');
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
