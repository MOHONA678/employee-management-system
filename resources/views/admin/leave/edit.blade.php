@extends('layouts.admin')

@section('title')
  {{ __('Edit Leave') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-8">
      <form method="POST" action="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.update', $leave->id) : ( Auth::user()->role->slug === 'administrator' ? route('admin.leaves.update', $leave->id) : route('hr.leaves.update', $leave->id) ) }}">
        {{-- <form method="POST" action="{{ route('admin.leaves.update', $leave->id) }}"> --}}
        @csrf
        @method('put')
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Add Leave</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="start_date">Leave Title</label>
                <input type="text" name="title" id="start_date" class="form-control" value="{{ $leave->title }}" required>
              </div>
              <div class="col-12">
                <label for="employee_id">Employee</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                  @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id === $leave->employee_id ? 'selected' : '' }} >{{ $employee->firstname }} {{ $employee->lastname }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $leave->start_date }}" required>
              </div>
              <div class="col-6">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $leave->end_date }}" required>
              </div>
              <div class="col-6">
                <label for="leave_type">Leave Type</label>
                <select name="leave_type" id="leave_type" class="form-control" required>
                  <option value="1" {{$leave->leave_type === 1 ? 'selected' : '' }} >Vacation</option>
                  <option value="2" {{$leave->leave_type === 2 ? 'selected' : '' }} >Sick Leave</option>
                  <option value="3" {{$leave->leave_type === 3 ? 'selected' : '' }} >Emergency Leave</option>
                  <option value="4" {{$leave->leave_type === 4 ? 'selected' : '' }} >Involuntary Leave</option>
                  <option value="5" {{$leave->leave_type === 5 ? 'selected' : '' }} >Medical Leave</option>
                  <option value="6" {{$leave->leave_type === 6 ? 'selected' : '' }} >Casual Leave</option>
                  <option value="7" {{$leave->leave_type === 7 ? 'selected' : '' }} >Marriage Leave</option>
                </select>
              </div>
              <div class="col-6">
                <label for="status">Leave Type</label>
                <select name="status" id="status" class="form-control" required>
                  <option value="1" {{$leave->status === 1 ? 'selected' : '' }} >Apprived</option>
                  <option value="0" {{$leave->status === 2 ? 'selected' : '' }} >Rejected</option>
                </select>
              </div>
              <div>
                <label for="leave_reason">Leave Reason</label>
                <textarea name="leave_reason" class="form-control" id="">{{ $leave->leave_reason }}</textarea>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
@endsection