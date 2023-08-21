@extends('layouts.admin')

@section('title')
  {{ __('Manage payroll') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Payroll</h1>
    <a href="" class="btn btn-primary">
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
        <table class="table table-hover my-0 table-bordered data-table">   
          <thead>
            <tr>
  
                <th scope="col" width="200px">Employee Name</th>
                
                <th scope="col" width="200px">Employee Position</th>
                <th scope="col" width="100px">Basic Salary</th>
                <th scope="col" width="100px">House rent</th>
                <th scope="col" width="100px">Medical Allowance</th>
                <th scope="col" width="100px">Transport Allowance</th>
                <th scope="col" width="100px">special Allowance</th>
                <th scope="col" width="100px">Gross Salary</th>
                {{-- <th scope="col">Overtime</th>
                <th scope="col">Provident Fund</th>
                <th scope="col">Advanced</th>
                <th scope="col">Tax</th>
                <th scope="col">Deduction</th>
                <th scope="col">Net Salary</th> --}}
            
            </tr>
        </thead>
  
        <tbody>

            <form action="" method="post">
                <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
                @csrf
                @foreach ($employees as $index => $employee)
                  <tr class="employee">
                     <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                     <td>{{ $employee->firstname . ' ' . $employee->lastname }}</td>
                     <td>{{ $employee->department->title }}</td>
                     <td>
                      <input type="number" id="basic{{ $index }}" class="form-control basic" value="{{ $employee->salary['basic'] }}" readonly />
                     </td>
                     <td>
                      <input type="number" id="rent{{ $index }}" class="form-control rent" value="{{ $employee->salary['house_rent'] }}" readonly />
                     </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     
                     <td>
                        <input type="number" id="gross{{ $index }}" class="form-control result" value="{{ $employee['gross_salary'] }}" readonly />
                        {{-- <p class="gross-salary">Gross Salary: <span class="result">{{ $employee['gross_salary'] }}</span></p> --}}
                     </td>
                  </tr>
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
                var grossSalary = basic + rent;
                
                $employee.find(".result").val(grossSalary.toFixed(2));

                $gross = localStorage.setItem("grossSalary{{ $index }}", grossSalary.toFixed(2));
            });
        });
  </script>
@endsection