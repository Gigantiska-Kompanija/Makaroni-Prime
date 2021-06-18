<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machinery;

class MachineController extends Controller
{
    /**
     * List all machines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machinery::orderBy('serialNumber')->get();
        return view('machines.list', compact('machines'));
    }

    /**
     * Create a machine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machines.add');
    }

    /**
     * Save a machine.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'serialNumber' => 'required|unique:machine|max:191',
            'function' => 'max:191',
            'located' => 'required|max:191',
            'model' => 'required|max:191',
            'isOperating' => 'required|tinyint|min:0|max:1',
            'lastServiced' => '',
            'needsMaintenance' => 'required|tinyint|min:0|max:1',
            'purchaseDate' => '',
            'decommissionDate' => '',
        ]);
        $machine = new Machinery();
        $machine->serialNumber = $request->serialNumber;
        $machine->function = $request->function;
        $machine->located = $request->located;
        $machine->model = $request->model;
        $machine->isOperating = $request->isOperating;
        $machine->lastServiced = $request->lastServiced;
        $machine->needsMaintenance = $request->needsMaintenance;
        $machine->purchaseDate = $request->purchaseDate;
        $machine->decommissionDate = $request->decommissionDate;
        $machine->save();
        return redirect(route('machines.show', $request->serialNumber));
    }
    
    /**
     * Display a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('machines.info', compact('id'));
    }

    /**
     * Edit a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('machines.edit', compact('id'));
    }

    /**
     * Save changes to a machine.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'serialNumber' => 'required|unique:machine|max:191',
            'function' => 'max:191',
            'located' => 'required|max:191',
            'model' => 'required|max:191',
            'isOperating' => 'required|tinyint|min:0|max:1',
            'lastServiced' => '',
            'needsMaintenance' => 'required|tinyint|min:0|max:1',
            'purchaseDate' => '',
            'decommissionDate' => '',
        ]);
        $machine = Machinery::findOrFail($id);
        $machine->serialNumber = $request->serialNumber;
        $machine->function = $request->function;
        $machine->located = $request->located;
        $machine->model = $request->model;
        $machine->isOperating = $request->isOperating;
        $machine->lastServiced = $request->lastServiced;
        $machine->needsMaintenance = $request->needsMaintenance;
        $machine->purchaseDate = $request->purchaseDate;
        $machine->decommissionDate = $request->decommissionDate;
        $machine->save();
        return redirect(route('machines.show', $request->serialNumber));
    }

    /**
     * Destroy a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Machinery::findOrFail($id)->delete();
        return redirect(route('machines.index'));
    }
}
