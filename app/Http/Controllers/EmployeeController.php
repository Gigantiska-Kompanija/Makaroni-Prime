<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * List all employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.list');
    }

    /**
     * Summon an employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.add');
    }

    /**
     * Save an employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('employees.list');
    }
    
    /**
     * Display an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employees.info', compact('id'));
    }

    /**
     * Edit an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employees.edit', compact('id'));
    }

    /**
     * Save changes to an employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('employees.info', compact('id'));
    }

    /**
     * Kill an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('employees.list');
    }
}
