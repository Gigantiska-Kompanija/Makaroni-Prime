<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    /**
     * List all discounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::orderBy('code')->get();
        return view('discounts.list', compact('discounts'));
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
        $validated = $request->validate([
            'code' => 'required|unique:discount|max:191',
            'amount' => 'required|numeric',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        $discount = new Discount();
        $discount->code = $request->code;
        $discount->amount = $request->amount;
        $discount->startDate = $request->startDate;
        $discount->endDate = $request->endDate;
        $discount->save();
        return redirect(route('discounts.show', $request->code));
    }
    
    /**
     * Display a discount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = Discount::findOrFail($id);
        return view('discounts.info', compact('discount'));
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
        $validated = $request->validate([
            'code' => 'required|unique:discount|max:191',
            'amount' => 'required|numeric',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        $discount = Discount::findOrFail($id);
        $discount->code = $request->code;
        $discount->amount = $request->amount;
        $discount->startDate = $request->startDate;
        $discount->endDate = $request->endDate;
        $discount->save();
        return redirect(route('discounts.show', $request->code));
    }

    /**
     * Destroy a discount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::findOrFail($id)->delete();
        return redirect(route('discounts.index'));
    }
}
