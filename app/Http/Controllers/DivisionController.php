<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * List all divisions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('name')->get();
        return view('divisions.list', compact('divisions'));
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
        $validated = $request->validate([
            'name' => 'required|unique:division|max:191',
            'location' => 'required|max:191',
            'isOperating' => 'required|tinyint|min:0|max:1',
        ]);
        $division = new Division();
        $division->name = $request->name;
        $division->location = $request->location;
        $division->isOperationg = $request->isOperationg;
        $division->save();
        return redirect(route('divisions.show', $request->name));
    }
    
    /**
     * Display a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::findOrFail($id);
        return view('divisions.info', compact('division'));
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
        $validated = $request->validate([
            'name' => 'required|unique:division|max:191',
            'location' => 'required|max:191',
            'isOperating' => 'required|tinyint|min:0|max:1',
        ]);
        $division = Division::findOrFail($id);
        $division->name = $request->name;
        $division->location = $request->location;
        $division->isOperationg = $request->isOperationg;
        $division->save();
        return redirect(route('divisions.show', $request->name));
    }

    /**
     * Destroy a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Division::findOrFail($id)->delete();
        return redirect(route('divisions.index'));
    }
}
