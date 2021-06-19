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
        $ingredients = RawMaterial::orderBy('name')->get();
        return view('ingredients.list', compact('ingredients'));
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
        return redirect(route('ingrediants.show', $request->name));
    }
    
    /**
     * Display an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = RawMaterial::findOrFail($id);
        return view('ingredients.info', compact('ingredient'));
    }

    /**
     * Edit an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = RawMaterial::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
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
        $validated = $request->validate([
            'name' => 'required|unique:rawmaterial|max:191',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|integer|min:0',
            'minimum' => 'required|numeric|integer|min:0',
        ]);
        $ingredient = RawMaterial::findOrFail($id);
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        $ingredient->quantity = $request->quantity;
        $ingredient->minimum = $request->minimum;
        $ingredient->save();
        return redirect(route('ingredients.show', $request->name));
    }

    /**
     * Eat an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RawMaterial::findOrFail($id)->delete();
        return redirect(route('machines.index'));
    }
}
