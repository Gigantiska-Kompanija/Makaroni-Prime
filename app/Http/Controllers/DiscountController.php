<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * List all discounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discounts.list');
    }
    
    /**
     * Filter discounts by code.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Add a discount.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discounts.add');
    }

    /**
     * Save a discount.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->code = $request->code;
        $discount->amount = $request->amount;
        $discount->startDate = $request->startDate;
        $discount->endDate = $request->endDate;
        $discount->save();
        return view('discounts.list');
    }
    
    /**
     * Display a discount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('discounts.info', compact('id'));
    }

    /**
     * Edit a discount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('discounts.edit', compact('id'));
    }

    /**
     * Save changes to a discount.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('discounts.info', compact('id'));
    }

    /**
     * Destroy a discount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('discounts.list');
    }
}
