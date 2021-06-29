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
    public function order(Request $request)
    {
        $items = session()->get('makaroni');
        foreach($items as $name){
            $quantity[$name] = $request->$name;
        }
        foreach($quantity as $a=>$fuck){
            print_r($a.' '.$fuck);
        }
//        $quantity[] = 
        return view('form-order');
        //return 'pogger';
    }
    
    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        dd($request);
        $name = "Qui_ut_optio_veniam_";
        return $request->$name;
//        $items = session()->get('makaroni');
//        foreach($items as $name){
//            $quantity[$name] = $request->$name;
//        }
//        foreach($quantity as $a=>$fuck){
//            print_r($a.' '.$fuck);
//        }
//        $quantity[] = 
        return view('form-order');
        //return 'pogger';
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        if (session()->has('makaroni') && in_array($name, session()->get('makaroni'))){
            $makarons = session()->pull('makaroni');
            unset($makarons[array_search($request->name, $makarons)]);
            session()->put('makaroni', $makarons);
        }else{
            session()->push('makaroni',$name);
        }
        return redirect(route('store'));
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
