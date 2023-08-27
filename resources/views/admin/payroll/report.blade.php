@extends('layouts.admin')

@section('title')
  {{ __('Manage payroll') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Payroll</h1>
    {{-- <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('payroll.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.payroll.create') : route('hr.payroll.create') ) }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add New') }}</span>
    </a> --}}
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-header">              
        <h5 class="card-title mb-0">{{ __('Employees Daily Attendance') }}</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-hover my-0 table-bordered">
          <thead>
            <tr>
  
                <th scope="col" width="200px">Employee Name</th>
                
                <th scope="col">Employee Position</th>
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

              @php
                $year = date('Y');
                $month = date('m');

              @endphp

                <tr class="employee">
                  <td width="200px" class="py-0">{{ $employee->firstname }} {{ $employee->lastname }}</td>
                  <td>{{ $employee->designation->title }}</td>
                  
                  <td width="">
                    
                  </td>
                  <td width="">
                   
                  </td>
                  <td width="">
                    
                  </td>
                  <td width="">
                    
                  </td>
                  
                  <td width="">
                    
                  </td>
                  <td width="">
                    
                  </td>
                  <td width="">
                    
                  </td>
                  <td width="">
                   
                  </td>
                  <td width="">
                    
                  </td>
                  
                  {{-- <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][{{ $year }}][{{ $month }}][overtime_pay]" class="form-control" id="" value="{{ $employee->salary->overtime_pay }}" readonly>
                  </td> --}}
                  <td width="">
                    
                  </td>
                  <td width="">
                    
                  </td>
                  <td width="">
                    
                  </td>
                  <td width="">
                    

                  </td> 
                  <td width="">
                    
                  </td> 
                  <td width="">
                    
                  </td>
                  <td width="200px">
                    
                  </td>
              </tr>
                    
                {{-- @endforeach
                  
              @endforeach --}}

            @endforeach
  
  
  
        </tbody>
  
        </table>
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