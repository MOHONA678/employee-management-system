@extends('layouts.admin') <!-- Assuming you have a master layout defined -->

@section('title')
  {{ __('Employee Details') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Show Employee Card</h1>
    {{-- <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.create') : route('hr.employee.create') ) }}" class="btn btn-primary">
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
          <h5 class="card-title mb-0">Employee Information</h5>
        </div>
        <div class="card-body">
          <p class="card-text"><strong>ID:</strong> {{ $employee->id }}</p>
          <h5 class="card-title">{{ $employee->firstname }} {{ $employee->lastname }}</h5>
          <p class="card-text"><strong>Employee ID:</strong> {{ $employee->unique_id }}</p>
          <p class="card-text"><strong>Department:</strong> {{ $employee->department->title }}</p>
          <p class="card-text"><strong>Designation:</strong> {{ $employee->designation->title }}</p>
          <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
          <p class="card-text"><strong>Phone:</strong> {{ $employee->phone }}</p>
          <p class="card-text"><strong>Address:</strong> {{ $employee->address }}</p>
          {{-- <p class="card-text"><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
          <p class="card-text"><strong>Gender:</strong> {{ $employee->gender === 0 ? 'Male' : 'Female' }}</p> --}}
        </div>
        <div class="card-footer">
          <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.index') : route('hr.employee.index') ) }}" class="btn btn-primary">Back to List</a>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
@endsection
