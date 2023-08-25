@extends('layouts.admin')

@section('title')
    {{ __('Manage OverTime') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Manage Overtime') }}</h1>
    <a href="{{route('attendance.overtime')}}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add new') }}</span>
    </a>
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-header">              
        <h5 class="card-title mb-0">{{ __('Over Time') }}</h5>
      </div>
        <table class="table table-hover my-0">
                  
            <thead>
                <tr>
                  <th scope="col" >Date</th>
                  <th scope="col">Employee Name</th>
                  <th scope="col">Employee ID</th>
                  <th scope="col">Over Time</th>
                  <th scope="col">Time Out</th>
                  
                </tr>
            </thead>
            <tbody>
               @foreach ($employees as $employee)
               <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                <tr>
                  <td scope="row">{{ isset($employee->lateTime->latetime_date) ? $employee->lateTime->latetime_date : '' }}</td>
                  <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                  <td>{{ $employee->unique_id }}</td>
                  <td>{{ isset($employee->overTime->overtime_date) ? $employee->overTime->overtime_date : '' }}</td></td>
                  <td> {{ $employee->schedule->time_out }} </td>
                  
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
  </div>
</section>
@endsection

@section('script')

@endsection