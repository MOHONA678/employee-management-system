@extends('layouts.admin')

@section('title')
  {{ __('Manage payroll') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Payroll</h1>
    <a href="{{ route('payroll.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add New') }}</span>
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
          <form action="{{route('calculate.payroll')}}" method="post">   
            <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
            @csrf
            @foreach ($employees as $employee)
              <input type="hidden" name="employee_id" value="{{ $employee->id }}">
              @php
                // $years = [2023, 2024, 2025];
                // $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                $year = date('Y');
                $month = date('m');
                // $currentYear = date('Y');
                // $currentMonth = date('m');
              @endphp

              {{-- @foreach ($years as $year)

                @foreach ($months as $month) --}}

                <tr class="employee">
                  <td width="200px" class="py-0">{{ $employee->firstname }} {{ $employee->lastname }}</td>
                  <td>{{ $employee->designation->title }}</td>
                  
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][basic]" class="form-control basic" id="" value="{{ isset($employee->salary->basic) ? $employee->salary->basic : 0 }}" readonly style="width: 100px" >
                  </td>
                  <td width="">
                   <input type="number" name="payroll[{{ $employee->id }}][house_rent]" class="form-control rent"  id="" value="{{ isset($employee->salary->house_rent) ? $employee->salary->house_rent : 0 }}" readonly style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][medical]" class="form-control medical" id="" value="{{ isset($employee->salary->medical) ? $employee->salary->medical : 0 }}" readonly style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][transport]" class="form-control transport" id="" value="{{ isset($employee->salary->transport) ? $employee->salary->transport : 0 }}" readonly style="width: 100px" >
                  </td>
                  
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][special]" class="form-control special" id="" value="{{ isset($employee->salary->special) ? $employee->salary->special : 0 }}" readonly style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][bonus]" class="form-control bonus" id="" value="{{ isset($employee->salary->bonus) ? $employee->salary->bonus : 0 }}" style="width: 100px" >
                  </td>
                  <td width="">
                    @php
                      $present = App\Models\Attendance::where('employee_id', $employee->id)->where('status', 1)->count()
                    @endphp
                    <input type="number" name="payroll[{{ $employee->id }}][days_present]" class="form-control present" id="" value="{{ isset($present) ? $present : 0 }}" style="width: 100px" >
                  </td>
                  <td width="">
                    @php
                      $today = today();
                      $absent = $today->daysInMonth - $present
                    @endphp
                    <input type="number" name="payroll[{{ $employee->id }}][days_absent]" class="form-control absent" id="" value="{{ isset($absent) ? $absent : 0 }}" style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][gross_salary]" class="form-control gross" id="" value="" readonly style="width: 100px">
                  </td>
                  
                  {{-- <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][{{ $year }}][{{ $month }}][overtime_pay]" class="form-control" id="" value="{{ $employee->salary->overtime_pay }}" readonly>
                  </td> --}}
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][provident_fund]" class="form-control pf" id="" value="{{ isset($employee->salary->provident_fund) ? $employee->salary->provident_fund : 0 }}" readonly style="width: 100px">
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][advanced]" class="form-control advance" id="" value="0" style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][income_tax]" class="form-control tax" id="" value="{{ isset($employee->salary->income_tax) ? $employee->salary->income_tax : 0 }}" readonly style="width: 100px" >
                  </td>
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][life_insurance]" class="form-control life" id="lifeInsurance" value="{{ isset($employee->salary->life_insurance) ? $employee->salary->life_insurance : 0 }}" style="width: 100px" >

                  </td> 
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][health_insurance]" class="form-control health" id="healthInsrance" value="{{ isset($employee->salary->health_insurance) ? $employee->salary->health_insurance : 0 }}" style="width: 100px">
                  </td> 
                  <td width="">
                    <input type="number" name="payroll[{{ $employee->id }}][deduction]" class="form-control deduct" id="" readonly style="width: 100px" >
                  </td>
                  <td width="200px">
                    <input type="number" name="payroll[{{ $employee->id }}][net_salary]" class="form-control net" id="" readonly style="width: 100px" >
                  </td>
              </tr>
                    
                {{-- @endforeach
                  
              @endforeach --}}

            @endforeach
  
          </form>
  
  
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