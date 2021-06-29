<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\RawMaterial;
use Illuminate\Validation\Rule;

class IngredientController extends Controller
{
    /**
     * List all ingredients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $belowMin = $request->belowMin ?? false;
        $name = $request->name ?? '';
        $ingredientQuery = RawMaterial::query()->where('name','LIKE','%'.$name.'%');
        if ($belowMin) $ingredientQuery = $ingredientQuery->whereColumn('minimum', '>', 'quantity');
        $ingredients = $ingredientQuery->get();
        return view('ingredients.list', compact('ingredients', 'name', 'belowMin'));
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
            'name' => 'required|unique:rawMaterial|max:191',
            'price' => 'required|numeric|min:0',
            'quantity' => 'nullable|numeric|integer|min:0',
            'minimum' => 'nullable|numeric|integer|min:0',
        ]);
        $ingredient = new RawMaterial();
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        if ($request->quantity !== null) $ingredient->quantity = $request->quantity;
        if ($request->minimum !== null) $ingredient->minimum = $request->minimum;
        $ingredient->save();
        Audit::create('create-ingredient', $request, null, $ingredient->name);
        return redirect(route('ingredients.show', $request->name));
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
        $ingredient = RawMaterial::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'max:191', Rule::unique('rawMaterial', 'name')->ignore($ingredient->name, 'name')],
            'price' => 'required|numeric|min:0',
            'quantity' => 'nullable|numeric|integer|min:0',
            'minimum' => 'nullable|numeric|integer|min:0',
        ]);
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        if($request->quantity !== null) $ingredient->quantity = $request->quantity;
        if($request->minimum !== null) $ingredient->minimum = $request->minimum;
        $ingredient->save();
        Audit::create('update-ingredient', $request, null, $ingredient->name);
        return redirect(route('ingredients.show', $request->name));
    }

    /**
     * Eat an ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-ingredient', $request, null, $id);
        RawMaterial::findOrFail($id)->delete();
        return redirect(route('machines.index'));
    }
}
