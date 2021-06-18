<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * List all employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->get();
        return view('employees.list', compact('employees'));
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
        $validated = $request->validate([
            'personalId' => 'required|unique:employee|max:11',
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'email' => 'required|max:191',
            'phoneNumber' => 'required|max:191',
            'position' => 'required|max:191',
            'pay' => 'required|decimal(8,2)',
            'joinDate' => '',
            'leaveDate' => '',
        ]);
        $employee = new Employee();
        $employee->personalId = $request->personalId;
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->email;
        $employee->phoneNumber = $request->phoneNumber;
        $employee->position = $request->position;
        $employee->pay = $request->pay;
        $employee->joinDate = $request->joinDate;
        $employee->leaveDate = $request->leaveDate;
        $employee->save();
        return $this->index();
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
        $validated = $request->validate([
            'personalId' => 'required|unique:employee|max:11',
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'email' => 'required|max:191',
            'phoneNumber' => 'required|max:191',
            'position' => 'required|max:191',
            'pay' => 'required|decimal(8,2)',
            'joinDate' => '',
            'leaveDate' => '',
        ]);
        $employee = Employee::findOrFail($id);
        $employee->personalId = $request->personalId;
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->email;
        $employee->phoneNumber = $request->phoneNumber;
        $employee->position = $request->position;
        $employee->pay = $request->pay;
        $employee->joinDate = $request->joinDate;
        $employee->leaveDate = $request->leaveDate;
        $employee->save();
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
        Employee::findOrFail($id)->delete();
        return $this->index();
    }
}
