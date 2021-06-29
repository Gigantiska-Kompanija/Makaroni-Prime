<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Division;
use Illuminate\Validation\Rule;

class DivisionController extends Controller
{
    /**
     * List all divisions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isOperating = $request->isOperating ?? null;
        $name = $request->name ?? '';
        $location = $request->location ?? '';
        $divisions = Division::query()
        ->where('name','LIKE','%'.$name.'%')
        ->where('location','LIKE','%'.$location.'%')
        ->where('isOperating','LIKE',$isOperating ?? '%')
        ->get();
        return view('divisions.list', compact('divisions', 'name', 'location', 'isOperating'));
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
            'isOperating' => 'nullable|numeric|integer|min:0|max:1',
        ]);
        $division = new Division();
        $division->name = $request->name;
        $division->location = $request->location;
        if ($request->isOperating !== null) $division->isOperating = $request->isOperating;
        $division->save();
        Audit::create('create-division', $request, null, $division->name);
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
        $division = Division::findOrFail($id);
        return view('divisions.edit', compact('division'));
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
        $division = Division::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'max:191', Rule::unique('division', 'name')->ignore($division->name, 'name')],
            'location' => 'required|max:191',
            'isOperating' => 'nullable|numeric|integer|min:0|max:1',
        ]);
        $division->name = $request->name;
        $division->location = $request->location;
        if ($request->isOperating !== null) $division->isOperating = $request->isOperating;
        $division->save();
        Audit::create('update-division', $request, null, $division->name);
        return redirect(route('divisions.show', $request->name));
    }

    /**
     * Destroy a division.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Division::findOrFail($id)->delete();
        Audit::create('destroy-division', $request, null, $id);
        return redirect(route('divisions.index'));
    }
}
