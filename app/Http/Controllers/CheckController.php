<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Check;
use App\Models\Depart;
use App\Models\Employee;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Check $check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Check $check)
    {
        //
    }

    
    

    public function CheckStore(Request $request)
    {
        if (isset($request->attd)) {
            foreach ($request->attd as $keys => $values) {
                foreach ($values as $key => $value) {
                    if ($employee = Employee::whereId(request('employee_id'))->first()) {

                        $isFriday = \Carbon\Carbon::createFromFormat('Y-m-d', $keys)->isFriday();

                        // $checkboxValue = isset($value) ? 1 : 0;
                        // $checkboxValue = $request->has("attd.$keys.$key") ? 1 : ($isFriday ? null : 0);
                        $checkboxValue = $request->has("attd.$keys.$key") ? 1 : 0;
                        if (
                            !Attendance::whereAttendance_date($keys)
                                ->whereEmployee_id($key)
                                ->whereType(0)
                                // ->whereStatus(NULL)
                                ->first()
                        ) {
                            $data = new Attendance();
                            
                            $data->employee_id = $key;
                            $emp_req = Employee::whereId($data->employee_id)->first();
                            $data->attendance_time = date('H:i:s', strtotime($emp_req->schedule->first()->time_in));
                            $data->attendance_date = $keys;

                            // if ($emp_req->schedule->first()->time_in <= $data->attendance_time) {
                            //     $data->status = 1; // On time or late
                            // } else {
                            //     $data->status = 0; // Early or missed
                            // }
                            // $data->status = $checkboxValue;
                            $data->status = $isFriday && $checkboxValue === 0 ? null : $checkboxValue;

                            $data->save();
                        }
                    }
                }
            }
        }
        if (isset($request->depart)) {
            foreach ($request->depart as $keys => $values) {
                foreach ($values as $key => $value) {
                    if ($employee = Employee::whereId(request('employee_id'))->first()) {
                        if (
                            !Depart::whereDepart_date($keys)
                                ->whereEmployee_id($key)
                                ->whereType(1)
                                ->first()
                        ) {
                            $data = new Depart();
                            $data->employee_id = $key;
                            $emp_req = Employee::whereId($data->employee_id)->first();
                            $data->depart_time = $emp_req->schedule->first()->time_out;
                            $data->depart_date = $keys;
                            // if ($employee->schedule->first()->time_out <= $data->depart_time) {
                            //     $data->status = 1;
                                
                            // }
                            if ($employee->schedule->first()->time_out <= $data->depart_time) {
                                $data->status = 1;
                            } else {
                                $data->status = null; // Set to null when not met
    
                            }
                            
                            $data->save();
                        }
                    }
                }
            }
        }
        // flash()->success('Success', 'You have successfully submited the attendance !');
        return back();
    }
    public function sheetReport()
    {

    return view('admin.attendance.report')->with(['employees' => Employee::all()]);
    }
}
