@extends('layouts.admin')

@section('title')
  {{ __('Manage payroll') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Payroll</h1>
    <a href="{{ route('payroll.report') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i>
      <span class="ps-1">{{ __('Back') }}</span>
    </a>
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-header">              
        <h5 class="card-title mb-0">{{ __('Employees Daily Attendance') }}</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('generate.payroll') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-3">
              {{-- <label for="year">Select Year:</label> --}}
              <select name="year" class="form-select" id="year">
                <option value="">{{ __('Choose Year') }}</option>
                <option value="2023">{{ __('2023') }}</option>
              </select>
            </div>
            <div class="col-3">
              {{-- <label for="month">Select Month:</label> --}}
              <select name="month" class="form-select" id="month">
                <option value="">{{ __('Choose Month') }}</option>
                <option value="1">{{ __('January') }}</option>
                <option value="2">{{ __('February') }}</option>
                <option value="3">{{ __('March') }}</option>
                <option value="4">{{ __('April') }}</option>
                <option value="5">{{ __('May') }}</option>
                <option value="6">{{ __('June') }}</option>
                <option value="7">{{ __('July') }}</option>
                <option value="8">{{ __('August') }}</option>
                <option value="9">{{ __('September') }}</option>
                <option value="10">{{ __('October') }}</option>
                <option value="11">{{ __('November') }}</option>
                <option value="12">{{ __('December') }}</option>
              </select>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary">{{ __('Generate') }}</button>
            </div>
          </div>
      </form>
      </div>
      <div class="table-responsive">
        @isset($selectedYear, $selectedMonth)
          <h2>Salary Sheet for {{ $selectedMonth }}/{{ $selectedYear }}</h2>
          <table class="table table-hover my-0 table-bordered">
            <thead>
              <tr>
                <th scope="col" width="200px">{{ __('Employee Name') }}</th>
                <th scope="col">{{ __('Employee Position') }}</th>
                <th scope="col">Basic Salary</th>
                <th scope="col">House rent</th>
                <th scope="col">Medical Allowance</th>
                <th scope="col">Transport Allowance</th>
                <th scope="col">special Allowance</th>
                <th scope="col">Bonus</th>
                <th scope="col">Present</th>
                <th scope="col">Absent</th>
                <th scope="col">Gross Salary</th>
                {{-- <th scope="col">Overtime</th> --}}
                <th scope="col">Provident Fund</th>
                <th scope="col">Advanced</th>
                <th scope="col">Tax</th>
                <th scope="col">Life insurance </th>
                <th scope="col">Health insurance</th>
                <th scope="col">Deduction</th>
                <th scope="col">Net Salary</th>
              </tr>
            </thead>
                <tbody>
                    @foreach ($employees as $employee)
                      <tr>
                        <td>{{ $employee->firstname . ' ' . $employee->lastname }}</td>
                        @php
                          $employeeSalary = $salaryData->where('employee_id', $employee->id)->first();
                        @endphp
                        <td>{{ $employeeSalary ? $employeeSalary->basic : 'N/A' }}</td>
                        <td>{{ $employeeSalary ? $employeeSalary->house_rent : 'N/A' }}</td>
                        <td>{{ $employeeSalary ? $employeeSalary->medical : 'N/A' }}</td>
                            <!-- Add more fields as needed -->
                      </tr>
                    @endforeach
                </tbody>
          </table>
        @endisset
      </div>
      
    </div>
  </div>
    
</section>
@endsection

@section('script')
<script>
  $(document).ready(function() {
      $(".employee").each(function() {
          var $employee = $(this);
          var basic = parseFloat($employee.find(".basic").val());
          var rent = parseFloat($employee.find(".rent").val());
          var medical = parseFloat($employee.find(".medical").val());
          var transport = parseFloat($employee.find(".transport").val());
          var special = parseFloat($employee.find(".special").val());
          var bonus = parseFloat($employee.find(".bonus").val());
          // var present = $employee.find(".present").val();
          
          // if (present == 25 ) {
          //   bonus.val() + 500;
          // }

          var pf = parseFloat($employee.find(".pf").val());
          var advance = parseFloat($employee.find(".advance").val());
          var tax = parseFloat($employee.find(".tax").val());
          var life = parseFloat($employee.find(".life").val());
          var health = parseFloat($employee.find(".health").val());
          var absent = $employee.find(".absent").val();

          // if (absent > 0) {
          //   (basic.val() / 30) * absent;
          // }

          var grossSalary = basic + rent + medical + transport + special + bonus;
          var deductSalary = pf + advance + tax + life + health;
          var netSalary = grossSalary - deductSalary;
          
          $employee.find(".gross").val(grossSalary.toFixed(2));
          $employee.find(".deduct").val(deductSalary.toFixed(2));
          $employee.find(".net").val(netSalary.toFixed(2));

      });
  });
</script>
@endsection