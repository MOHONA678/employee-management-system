@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Manage Employees') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Manage Employee</h1>
    <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.create') : route('hr.employee.create') ) }}" class="btn btn-primary">
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
          <h5 class="card-title mb-0">Employee DataTable</h5>
        </div>
        <table class="table data-table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name of Employee</th>
              <th>Department</th>
              <th>Schedule</th>
              <th>Date Joined</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employees as $employee)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <strong>{{ $employee->firstname }} {{ $employee->lastname }}</strong>
                </td>
                <td>{{ $employee->department->title }}</td>
                <td>{{ $employee->schedule->title  }}</td>
                <td>{{ $employee->created_at->diffforhumans() }}</td>
                <td class="d-flex align-items-center">
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.edit', $employee->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.edit', $employee->id) : route('hr.employee.edit', $employee->id) ) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.show', $employee->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.show', $employee->id) : route('hr.employee.show', $employee->id) ) }}" class="btn btn-success btn-sm ms-1 me-1">
                    <i class="fas fa-eye"></i>
                  </a>
                  <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.destroy', $employee->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.destroy', $employee->id) : route('hr.employee.destroy', $employee->id) ) }}" method="post">
                    <a href="#" class="btn btn-danger btn-sm" onclick="del(event, this)">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </form>
                </td>
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