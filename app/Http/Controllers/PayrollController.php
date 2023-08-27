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
        foreach ($request->employee_id as $index => $employeeId) {
            $data = [
                'employee_id' => $employeeId,
                'basic' => $request->basic[$index],
                'house_rent' => $request->house_rent[$index],
                'medical' => $request->medical[$index],
                'transport' => $request->transport[$index],
                'special' => $request->special[$index],
                'bonus' => $request->bonus[$index],
                'present' => $request->present[$index],
                'absent' => $request->absent[$index],
                'gross_salary' => $request->gross_salary[$index],
                'provident_fund' => $request->provident_fund[$index],
                'advanced' => $request->advanced[$index],
                'tax' => $request->tax[$index],
                'life_insurance' => $request->life_insurance[$index],
                'health_insurance' => $request->health_insurance[$index],
                'deduction' => $request->deduction[$index],
                'net_salary' => $request->net_salary[$index],
            ];
    
            // Create a new payroll entry
            Payroll::create($employees);
        }
    
        return redirect()->back()->with('success', 'Payroll data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        
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

    public function calculatePayroll(Request $request) {
        // dd($request);
        if (isset($request->payroll)) {
            foreach ($request->payroll as $employeeId => $payrollData) {
                // Get the current year and month
                $currentYear = date('Y');
                $currentMonth = date('m');
                
                // foreach ($payrollData as $year => $yearData) {
                    // foreach ($yearData as $month => $payrollFields) {
                        if ($employee = Employee::whereId($employeeId)->first()) {
                            $data = new Payroll();
                            $data->employee_id = $employeeId;
                            
                            // Use the current year and month for the entry
                            $data->year = $currentYear;
                            $data->month = $currentMonth;
                            
                            // Process individual payroll fields
                            // $data->basic = $payrollFields['basic'];
                            // $data->house_rent = $payrollFields['house_rent'];
                            // $data->medical = $payrollFields['medical'];
                            $data->basic = $payrollData['basic'];
                            $data->house_rent = $payrollData['house_rent'];
                            $data->medical = $payrollData['medical'];
                            $data->transport = $payrollData['transport'];
                            $data->special = $payrollData['special'];
                            // $data->bonus = $payrollData['bonus'];
                            $data->days_present = $payrollData['days_present'];
                            $data->days_absent = $payrollData['days_absent'];
                            $data->gross_salary = $payrollData['gross_salary'];
                            $data->provident_fund = $payrollData['provident_fund'];
                            // $data->advanced = $payrollData['advanced'];
                            $data->income_tax = $payrollData['income_tax'];
                            $data->life_insurance = $payrollData['life_insurance'];
                            $data->health_insurance = $payrollData['health_insurance'];
                            $data->deduction = $payrollData['deduction'];
                            $data->net_salary = $payrollData['net_salary'];
                            // Add more fields as needed
                            
                            // Additional salary calculation logic can be added here
                            
                            $data->save();
                        }
                    // }
                // }
            }
        }
        return redirect()->route('super.dashboard');
    }
}
