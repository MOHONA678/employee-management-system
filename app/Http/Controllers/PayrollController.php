<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
       // Calculate salary for each employee based on attendance and formulas
       return view('admin.payroll.index', ['employees' => $employees]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
         // Fetch employees and dates from your data source
    $employees = Employee::all(); // Replace 'Employee' with your actual model class
    $today =today();
    $dates = [];

    for ($i = 1; $i <= $today->daysInMonth; ++$i) {
        $dates[] = $i;
    }

    return view('admin.payroll.create', compact('employees','dates'));
        
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
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }

    public function grossSalary() {
        $employees = Employee::all();
        return view('admin.payroll.gross', compact('employees'));
    }
}
