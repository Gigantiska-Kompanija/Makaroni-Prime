<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Machinery;
use App\Models\Division;
use Illuminate\Validation\Rule;

class MachineController extends Controller
{
    /**
     * List all machines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Machinery::select('located')->distinct()->get()->toArray();
        $serialNumber = $request->serialNumber ?? '';
        $isOperating = $request->isOperating ?? null;
        $needsMaintenance = $request->needsMaintenance ?? null;
        $machines = Machinery::query()
        ->where('serialNumber','LIKE','%'.$serialNumber.'%')
        ->where('located','LIKE',$request->location ?? '%')
        ->where('isOperating','LIKE',$isOperating ?? '%')
        ->where('needsMaintenance','LIKE',$needsMaintenance ?? '%')
        ->get();
        return view('machines.list', compact('machines', 'serialNumber', 'locations', 'isOperating', 'needsMaintenance'));
    }

    /**
     * Create a machine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Division::select('name')->get()->toArray();
        return view('machines.add', compact('locations'));
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
            'serialNumber' => 'required|unique:machinery|max:191',
            'function' => 'nullable|max:2000',
            'located' => 'required|exists:division,name|max:191',
            'model' => 'nullable|max:191',
            'isOperating' => 'nullable|numeric|boolean',
            'lastServiced' => 'nullable|date|max:now',
            'needsMaintenance' => 'nullable|numeric|boolean',
            'purchaseDate' => 'nullable|date|max:now',
            'decommissionDate' => 'nullable|date|max:now',
        ]);
        $machine = new Machinery();
        $machine->serialNumber = $request->serialNumber;
        if ($request->function !== null) $machine->function = $request->function;
        $machine->located = $request->located;
        if ($request->model !== null) $machine->model = $request->model;
        if ($request->isOperating !== null) $machine->isOperating = $request->isOperating;
        if ($request->lastServiced !== null) $machine->lastServiced = $request->lastServiced;
        if ($request->needsMaintenance !== null) $machine->needsMaintenance = $request->needsMaintenance;
        if ($request->purchaseDate !== null) $machine->purchaseDate = $request->purchaseDate;
        if ($request->decommissionDate !== null) $machine->decommissionDate = $request->decommissionDate;
        $machine->save();
        Audit::create('create-machine', $request, null, $machine->serialNumber);
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
        $machine = Machinery::findOrFail($id);
        return view('machines.info', compact('machine'));
    }

    /**
     * Edit a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Division::select('name')->get()->toArray();
        $machine = Machinery::findOrFail($id);
        return view('machines.edit', compact('machine', 'locations'));
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
        $machine = Machinery::findOrFail($id);
        $validated = $request->validate([
            'serialNumber' => ['required', 'max:191', Rule::unique('machinery', 'serialNumber')->ignore($machine->serialNumber, 'serialNumber')],
            'function' => 'nullable|max:2000',
            'located' => 'required|exists:division,name|max:191',
            'model' => 'nullable|max:191',
            'isOperating' => 'nullable|numeric|boolean',
            'lastServiced' => 'nullable|date|max:now',
            'needsMaintenance' => 'nullable|numeric|boolean',
            'purchaseDate' => 'nullable|date|max:now',
            'decommissionDate' => 'nullable|date|max:now',
        ]);
        $machine->serialNumber = $request->serialNumber;
        if ($request->function !== null) $machine->function = $request->function;
        $machine->located = $request->located;
        if ($request->model !== null) $machine->model = $request->model;
        if ($request->isOperating !== null) $machine->isOperating = $request->isOperating;
        if ($request->lastServiced !== null) $machine->lastServiced = $request->lastServiced;
        if ($request->needsMaintenance !== null) $machine->needsMaintenance = $request->needsMaintenance;
        if ($request->purchaseDate !== null) $machine->purchaseDate = $request->purchaseDate;
        if ($request->decommissionDate !== null) $machine->decommissionDate = $request->decommissionDate;
        $machine->save();
        Audit::create('update-machine', $request, null, $machine->serialNumber);
        return redirect(route('machines.show', $request->serialNumber));
    }

    /**
     * Destroy a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-machine', $request, null, $id);
        Machinery::findOrFail($id)->delete();
        return redirect(route('machines.index'));
    }
}
