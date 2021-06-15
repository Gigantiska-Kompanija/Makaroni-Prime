<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * List all machines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('machines.list');
    }
    
    /**
     * Filter machines by name or serial number.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
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
        return view('machines.list');
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
        return view('machines.info', compact('id'));
    }

    /**
     * Destroy a machine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('machines.list');
    }
}
