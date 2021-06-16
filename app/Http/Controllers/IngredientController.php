<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawMaterial;

class IngredientController extends Controller
{
    /**
     * List all ingredients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingredients.list');
    }
    
    /**
     * Filter ingredients by name and amount.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Add an ingredient
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.add');
    }

    /**
     * Save an ingredient.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:rawmaterial|max:191',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|integer|min:0',
            'minimum' => 'required|numeric|integer|min:0',
        ]);
        $ingredient = new RawMaterial();
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        $ingredient->quantity = $request->quantity;
        $ingredient->minimum = $request->minimum;
        $ingredient->save();
        return view('ingredients.list');
    }
    
    /**
     * Display an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ingredients.info', compact('id'));
    }

    /**
     * Edit an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ingredients.edit', compact('id'));
    }

    /**
     * Save changes to an ingredient.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('ingredients.info', compact('id'));
    }

    /**
     * Eat an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('ingredients.list');
    }
}
