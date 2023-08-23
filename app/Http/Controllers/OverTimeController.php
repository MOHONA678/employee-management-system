<?php

namespace App\Http\Controllers;

use App\Models\OverTime;
use Illuminate\Http\Request;
use App\Models\Employee;
use DateTime;


class OverTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('admin.attendance.overtime', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OverTime $overTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OverTime $overTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OverTime $overTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OverTime $overTime)
    {
        //
    }

     public static function overTime(Employee $employee)
    {
        $current_t = new DateTime(date('H:i:s'));
        $start_t = new DateTime($employee->schedules->first()->time_out);
        $difference = $start_t->diff($current_t)->format('%H:%I:%S');

        $overtime = new Overtime();
        $overtime->emp_id = $employee->id;
        $overtime->duration = $difference;
        $overtime->overtime_date = date('Y-m-d');
        $overtime->save();
    }
}
