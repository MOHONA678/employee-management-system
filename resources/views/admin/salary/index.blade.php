@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Manage salary') }}
@endsection

@section('header')
    {{ __('Manage salary') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3">Salary</h1>
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">{{ __('Add New') }}</span>
                </a>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add New Salary</a>
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Basic Salary</th>
                                <th>House Rent</th>
                                <th>Medical Allowance</th>
                                <!-- Add other column headers as needed -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->id }}</td>
                                    <td>{{ $salary->employee->firstname }} {{ $salary->employee->lastname }}</td>
                                    <td>{{ $salary->basic }}</td>
                                    <td>{{ $salary->house_rent }}</td>
                                    <td>{{ $salary->medical }}</td>
                                    <!-- Add other columns as needed -->
                                    <td>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-info">Edit</a>
                                        <!-- Add other action buttons as needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection