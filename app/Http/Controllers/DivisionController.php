<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * List all divisions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('divisions.list');
    }
    
    /**
     * Filter divisions by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Add a division.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisions.add');
    }

    /**
     * Save a division.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = new Division();
        $division->name = $request->name;
        $division->location = $request->location;
        $division->isOperationg = $request->isOperationg;
        $division->save();
        return view('divisions.list');
    }
    
    /**
     * Display a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('divisions.info', compact('id'));
    }

    /**
     * Edit a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('divisions.edit', compact('id'));
    }

    /**
     * Save changes to a division.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('divisions.info', compact('id'));
    }

    /**
     * Destroy a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('divisions.list');
    }
}
