<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Makarons;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
            'image'  => 'image|mimes:jpg|max:2048'
        ]);
        $image = $request->file('image');
        if($image) {
            $new_name = $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $new_name);
        }
        $makarons = new Makarons();
        $makarons->name = $request->name;
        $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        return redirect(route('makaroni.show', $request->name));
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
        $reviews = $makarons->reviews()->orderBy('date', 'DESC')->get();
        return view('makaroni.info', compact('makarons', 'reviews'));
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
        $makarons = Makarons::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'max:191', Rule::unique('makarons', 'name')->ignore($makarons->name, 'name')],
            'quantity' => 'required|numeric|integer|min:0',
            'price' => 'required|numeric',
            'shape' => 'required|max:191',
            'color' => 'required|max:191',
            'length' => 'required|numeric|integer|min:0',
            'popularity' => 'required|numeric|integer|min:0',
            'image'  => 'image|mimes:jpg|max:2048'
        ]);
        $image = $request->file('image');
        $old_name = $makarons->name . '.jpg';
        $new_name = $request->name . '.jpg';
        if($image){
            if($old_name != $new_name) {
                unlink(public_path('assets/images/' . $old_name));
            }
            $image->move(public_path('assets/images'), $new_name);
        } else if(file_exists(public_path('assets/images/' . $old_name))) {
            rename(public_path('assets/images/' . $old_name), public_path('assets/images/' . $new_name));
        }
        $makarons->name = $request->name;
        $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        return redirect(route('makaroni.show', $request->name));
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
        $old_name = $id . '.jpg';
        unlink(public_path('assets/images/' . $old_name));
        return redirect(route('makaroni.index'));
    }
}
