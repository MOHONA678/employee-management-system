<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        $validatedData = $request->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|max:19',
            // Add validation rules for other fields
        ]);
    
        // Save the employee record
        $employee = new Employee();
        $employee->fill($validatedData);
        $employee->save();
    
        return back()->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        return view('admin.employee.edit',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
        $employee->firstname = $request->input('firstname');
    $employee->lastname = $request->input('lastname'); // Update other fields accordingly
    $employee->email = $request->input('email');
    $employee->phone = $request->input('phone');
    $employee->address = $request->input('address');
    $employee->dob = $request->input('dob');
    $employee->gender = $request->input('gender');
    $employee->save();

    return back()->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee-> delete();
        return back()->with('success','Employee deleted successfully');
    }
}
