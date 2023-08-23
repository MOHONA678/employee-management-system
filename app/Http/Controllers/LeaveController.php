<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $leaves = Leave::all();
        return view('admin.leave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees = Employee::all(); // Assuming 'Employee' is your model name
    
        return view('admin.leave.create', compact('employees'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequest $request)
    {
        //
        Leave::create($request->all());
        return back()->with('success', 'Leave added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
        return view('admin.employee.show',compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
        $employees =Employee::all();
        $leave = Leave::all();
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        //
        $leave = Leave::all();
        // return redirect()->route('admin.leave.index')->with('success', 'Leave record updated successfully.');
        return back()->with('success', 'Leave record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return back()->with('success','Leave deleted successfully');
    }
}
