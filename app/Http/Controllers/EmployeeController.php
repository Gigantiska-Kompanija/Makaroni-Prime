<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * List all employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('personalId')->get();
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
            'email' => 'required|unique:employee|max:191',
            'phoneNumber' => 'required|unique:employee|max:191',
            'position' => 'nullable|string|max:191',
            'pay' => 'nullable|numeric',
            'joinDate' => 'nullable|date',
            'leaveDate' => 'nullable|date',
        ]);
        $employee = new Employee();
        $employee->personalId = $request->personalId;
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->email;
        $employee->phoneNumber = $request->phoneNumber;
        if ($request->position !== null) $employee->position = $request->position;
        if ($request->pay !== null) $employee->pay = $request->pay;
        if ($request->joinDate !== null) $employee->joinDate = $request->joinDate;
        if ($request->leaveDate !== null) $employee->leaveDate = $request->leaveDate;
        $employee->save();
        return redirect(route('employees.show', $request->personalId));
    }

    /**
     * Display an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.info', compact('employee'));
    }

    /**
     * Edit an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
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
        $employee = Employee::findOrFail($id);
        $validated = $request->validate([
            'personalId' => ['required', Rule::unique('employee', 'personalId')->ignore($employee->personalId, 'personalId')],
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'email' => ['required', 'max:191', Rule::unique('employee', 'email')->ignore($employee->personalId, 'email')],
            'phoneNumber' => ['required', 'max:191', Rule::unique('employee', 'phoneNumber')->ignore($employee->personalId, 'phoneNumber')],
            'position' => 'nullable|string|max:191',
            'pay' => 'nullable|numeric',
            'joinDate' => 'nullable|date',
            'leaveDate' => 'nullable|date',
        ]);
        $employee->personalId = $request->personalId;
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->email;
        $employee->phoneNumber = $request->phoneNumber;
        if ($request->position !== null) $employee->position = $request->position;
        if ($request->pay !== null) $employee->pay = $request->pay;
        if ($request->joinDate !== null) $employee->joinDate = $request->joinDate;
        if ($request->leaveDate !== null) $employee->leaveDate = $request->leaveDate;
        $employee->save();
        return redirect(route('employees.show', $request->personalId));
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
        return redirect(route('employees.index'));
    }
}
