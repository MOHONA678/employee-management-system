@extends('layouts.admin')

@section('title')
  {{ __('Add Leave Records') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <form method="POST" action="{{ route('leave.store') }}">
        @csrf
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Empty card</h5>
          </div>
          <div class="row g-3">
            <div class="col-12">
              <label for="employee_id">Employee</label>
              <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                  <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="col-12">
              <label for="end_date">End Date</label>
              <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="col-12">
              <label for="leave_type">Leave Type</label>
              <select name="leave_type" id="leave_type" class="form-control" required>
                <option value="1">Vacation</option>
                <option value="2">Sick Leave</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Apply</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
@endsection