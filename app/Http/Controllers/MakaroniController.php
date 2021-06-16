<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakaroniController extends Controller
{
    /**
     * List all MAKARONI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('makaroni.list');
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
        $makarons = new Makarons();
        $makarons->name = $request->name;
        $makarons->quantity = $request->quantity;
        $makarons->price = $request->price;
        $makarons->shape = $request->shape;
        $makarons->color = $request->color;
        $makarons->length = $request->length;
        $makarons->popularity = $request->popularity;
        $makarons->save();
        return view('makaroni.list');
    }
    
    /**
     * Display a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('makaroni.info', compact('id'));
    }

    /**
     * Edit a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('makaroni.edit', compact('id'));
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
        return view('makaroni.info', compact('id'));
    }

    /**
     * Destroy a MAKARONI.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('makaroni.list');
    }
}
