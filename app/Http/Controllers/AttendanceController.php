<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Employee;

class AttendanceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $attendances = Attendance::all();
        return view('admin.attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees = Employee::all();
        return view('admin.attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
        Attendance::create($request->all());
        return back()->with('success', 'user crated successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
        $employees = Employee::all();
        return view('admin.attendance.edit', compact(['employees', 'attendance']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
        $attendance->update($request->all());
        return back()->with('success', 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
        // $attendance->delete();
        // return back()->with('success', 'user deleted successfully');
    }
}
