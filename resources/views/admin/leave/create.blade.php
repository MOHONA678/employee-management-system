@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Add Leave Records') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Dashboard</h1>

    <form method="POST" action="{{ route('leave.store') }}">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="leave_type">Leave Type</label>
            <select name="leave_type" id="leave_type" class="form-control" required>
                <option value="1">Vacation</option>
                <option value="2">Sick Leave</option>
                <!-- Add more options if needed -->
            </select>
        </div>
        <!-- Add more input fields for other leave details -->

        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
@endsection
        </div>
    </main>
@endsection