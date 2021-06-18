<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makarons;

class MakaroniController extends Controller
{
    /**
     * List all MAKARONI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makaroni = Makarons::orderBy('name')->get();
        return view('makaroni.list', compact('makaroni'));
    }

    /**
     * List all MAKARONI.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeView()
    {
        $makaroni = Makarons::orderBy('popularity')->get();
        return view('store', compact('makaroni'));
    }
    
    /**
     * Filter MAKARONI by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Create a MAKARONI.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makaroni.add');
    }

    /**
     * Save a MAKARONI.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:makarons|max:191',
            'quantity' => 'required|numeric|integer|min:0',
            'price' => 'required|numeric',
            'shape' => 'required|max:191',
            'color' => 'required|max:191',
            'length' => 'required|numeric|integer|min:0',
            'popularity' => 'required|numeric|integer|min:0',
        ]);
        $makarons = new Makarons();
        $makarons->name = $request->name;
        $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        return $this->index();
    }
    
    /**
     * Display a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $makarons = Makarons::findOrFail($id);
        return view('makaroni.info', compact('makarons'));
    }

    /**
     * Edit a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makarons = Makarons::findOrFail($id);
        return view('makaroni.edit', compact('makarons'));
    }

    /**
     * Save changes to a MAKARONI.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:makarons|max:191',
            'quantity' => 'required|numeric|integer|min:0',
            'price' => 'required|numeric',
            'shape' => 'required|max:191',
            'color' => 'required|max:191',
            'length' => 'required|numeric|integer|min:0',
            'popularity' => 'required|numeric|integer|min:0',
        ]);
        $makarons = Makarons::findOrFail($id);
        $makarons->name = $request->name;
        $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        return $this->index();
    }

    /**
     * Destroy a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Makarons::findOrFail($id)->delete();
        return $this->index();
    }
}
