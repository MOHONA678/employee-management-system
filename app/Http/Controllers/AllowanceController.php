<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\AllowanceData;
use App\Models\Employee;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.allowance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees = Employee::all();
        return view('admin.allowance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request);
        // $allowanceData = $request->only(['year', 'month']); // Adjust field names as needed
        // $allowance = Allowance::create($allowanceData);

        // $employeesData = $request->input('employees');

        // foreach ($employeesData as $employeeData) {
        //     $employeeId = $employeeData['employee_id'];
        //     $grossSalary = $employeeData['gross_salary'];

        //     // Find the employee by ID
        //     $employee = Employee::find($employeeId);

        //     if ($employee) {
        //         // Create a new AllowanceData entry for each employee
        //         $allowance->allowanceData()->create([
        //             'allowance_id' => $allowance->id,
        //             'employee_id' => $employeeId,
        //             'gross_salary' => $grossSalary,
        //         ]);
        //     }
        // }

        return redirect()->back()->with('success', 'Allowances have been stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Allowance $allowance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allowance $allowance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allowance $allowance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allowance $allowance)
    {
        //
    }
}
