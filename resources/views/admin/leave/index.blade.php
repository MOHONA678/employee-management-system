@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Manage leave') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3">Leave</h1>
                <a href="{{ route('leave.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">{{ __('Add New') }}</span>
                </a>
            </div>

            <h1>Leave Records</h1>
    <a href="{{ route('leave.create') }}" class="btn btn-primary">Apply for Leave</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Leave Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->employee->firstname }} {{ $leave->employee->lastname }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->status === 0 ? 'Pending' : 'Approved' }}</td>
                    <td>
                        <a href="{{ route('leaves.show', ['leave' => $leave->id]) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
        </div>
    </main>
@endsection