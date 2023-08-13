<!-- resources/views/employees/show.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout defined -->

@section('content')
    <h1>Employee Details</h1>

    <div class="card">
        <div class="card-header">
            Employee Information
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $employee->firstname }} {{ $employee->lastname }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $employee->address }}</p>
            <p class="card-text"><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
            <p class="card-text"><strong>Gender:</strong> {{ $employee->gender === 0 ? 'Male' : 'Female' }}</p>
            <!-- Display other employee details here -->
        </div>
    </div>

    <a href="{{ route('employee.index') }}" class="btn btn-primary">Back to List</a>
@endsection
