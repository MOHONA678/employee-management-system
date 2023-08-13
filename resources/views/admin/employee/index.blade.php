@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Manage Employees') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3">Dashboard</h1>
                <a href="{{ route('employee.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">{{ __('Add New') }}</span>
                </a>
            </div>
         </div>
            <h1>Employee List</h1>
    <!-- <a href="{{ route('employee.create') }}" class="btn btn-primary">Create Employee</a> -->

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="btn btn-info">View</a>
                        <!-- Add more actions like Edit and Delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

       
    </main>
@endsection