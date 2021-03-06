<?php

namespace App\Http\Controllers;

use App\Models\Audit;
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
    public function index(Request $request)
    {
        $positions = Employee::select('position')->distinct()->get()->toArray();
        $positions = array_filter($positions, function($el) {return $el['position'];});
        $personalId = $request->personalId ?? '';
        $employees = Employee::query()->where('personalId','LIKE','%'.$personalId.'%');
        $employees = $employees->where('position','LIKE',$request->position);
        if(!$request->position) $employees = $employees->orWhereNull('position');
        $employees = $employees->get();
        return view('employees.list', compact('employees', 'personalId', 'positions'));
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
            'email' => 'required|email|unique:employee|max:191',
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
        Audit::create('create-employee', $request, null, $employee->personalId);
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
            'email' => ['required', 'email', 'max:191', Rule::unique('employee', 'email')->ignore($employee->email, 'email')],
            'phoneNumber' => ['required', 'max:191', Rule::unique('employee', 'phoneNumber')->ignore($employee->phoneNumber, 'phoneNumber')],
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
        Audit::create('update-employee', $request, null, $employee->personalId);
        return redirect(route('employees.show', $request->personalId));
    }

    /**
     * Kill an employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-employee', $request, null, $id);
        Employee::findOrFail($id)->delete();
        return redirect(route('employees.index'));
    }
}
