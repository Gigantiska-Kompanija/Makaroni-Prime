<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Audit;
use App\Models\Makarons;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;

class MakaroniController extends Controller {
    public function __construct() {
        $this->middleware('auth:manager', ['except' => ['index', 'show', 'storeView']]);
    }

    /**
     * List all MAKARONI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shapes = Makarons::select('shape')->distinct()->get()->toArray();
        $colors = Makarons::select('color')->distinct()->get()->toArray();
        $name = $request->name ?? '';
        $makaroni = Makarons::query()
        ->where('name','LIKE','%'.$name.'%')
        ->where('shape','LIKE',$request->shape ?? '%')
        ->where('color','LIKE',$request->color ?? '%')
        ->get();
        return view('makaroni.list', compact('makaroni', 'name', 'shapes', 'colors'));
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
            'quantity' => 'nullable|numeric|integer|min:0',
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
        if ($request->quantity !== null) $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        Audit::create('create-makarons', $request, null, $makarons->name);
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
        $inCart = session()->has('makaroni') && in_array($makarons->name, session()->get('makaroni'));
        $reviews = $makarons->reviews()->orderBy('date', 'DESC')->get();
        return view('makaroni.info', compact('makarons', 'reviews', 'inCart'));
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
            'quantity' => 'nullable|numeric|integer|min:0',
            'price' => 'required|numeric',
            'shape' => 'required|max:191',
            'color' => 'required|max:191',
            'length' => 'required|numeric|integer|min:0',
            'popularity' => 'required|numeric|integer|min:0',
            'image'  => 'image|mimes:jpg|max:2048' // php.ini jānomaina post_max_size uz 100M. upload_max_filesize uz 100M.
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
        if ($request->quantity !== null) $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        Audit::create('update-makarons', $request, null, $makarons->name);
        return redirect(route('makaroni.show', $request->name));
    }

    /**
     * Destroy a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-makarons', $request, null, $id);
        Makarons::findOrFail($id)->delete();
        $old_name = $id . '.jpg';
        unlink(public_path('assets/images/' . $old_name));
        return redirect(route('makaroni.index'));
    }
}
