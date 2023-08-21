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
        <table class="table table-hover my-0 table-bordered data-table">
       
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
                <th scope="col">Gross Salary</th>
                <th scope="col">Overtime</th>
                <th scope="col">Provident Fund</th>
                <th scope="col">Advanced</th>
                <th scope="col">Tax</th>
                <th scope="col">Deduction</th>
                <th scope="col">Net Salary</th>
            
            </tr>
        </thead>
  
        <tbody>
  
  
            <form action="{{route('check.store')}}" method="post">
               
                <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
                @csrf
                @foreach ($employees as $employee)
  
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
  
                    <tr>
                        <td width="200px" class="py-0">{{ $employee->firstname }} {{ $employee->lastname }}</td>
                        <td>{{ $employee->designation->title }}</td>
                        
                        <td width="">
                          <input type="number" name="basic" class="form-control" id="" value="{{ $employee->salary->basic }}" readonly>
                        </td>
                        <td width="">
                         <input type="number" name="house_rent" class="form-control"  id="" value="{{ $employee->salary->house_rent }}" readonly>
                        </td>
                        <td width="">
                          <input type="number" name="medical" class="form-control" id="" value="{{ $employee->salary->medical }}" readonly>
                        </td>
                        <td width="">
                          <input type="number" name="transport" class="form-control" id="" value="{{ $employee->salary->transport }}" readonly>
                        </td>
                        
                        <td width="">
                          <input type="number" name="special" class="form-control" id="" value="{{ $employee->salary->special }}" readonly>
                        </td>
                        <td width="">
                          <input type="number" name="bonus" class="form-control" id="" value="{{ $employee->salary->bonus }}" >
                        </td>
                        <td width="">
                          <input type="number" name="gross_salary" class="form-control" id="" value="" readonly>
                        </td>
                        
                        <td width="">
                          <input type="number" name="overtime_pay" class="form-control" id="" value="{{ $employee->salary->overtime_pay }}" readonly>
                        </td>
                        <td width="">
                          <input type="number" name="provident_funt" class="form-control" id="" value="{{ $employee->salary->provident_funt }}" readonly>
                        </td>
                        <td width="">
                          <input type="number" name="advanced" class="form-control" id="" value="" >
                        </td>
                        <td width="">
                          <input type="number" name="tax" class="form-control" id="" value="{{ $employee->salary->tax }}" readonly>
                        </td> 
                        <td width="">
                          <input type="number" name="deduction" class="form-control" id="" value="">
                        </td>
                        <td width="200px">
                          <input type="number" name="net_salary" class="form-control" id="" value="" >
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
@endsection