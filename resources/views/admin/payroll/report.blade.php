@extends('layouts.admin')

@section('title', __('Payroll Management - Attendance'))

@section('header')
    <h1 class="h3">{{ __('Payroll Management - Attendance') }}</h1>
@endsection

@section('content')
<section class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Employee Attendance') }}</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover my-0 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Employee Name') }}</th>
                            @foreach ($dates as $date)
                                <th scope="col">{{ $date }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                                @foreach ($dates as $date)
                                    @php
                                        $attendance = $employee->attendance->where('attendance_date', $date)->first();
                                    @endphp
                                    <td>
                                        @if ($attendance)
                                            @if ($attendance->is_present)
                                                <span class="badge bg-success">{{ __('Present') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('Absent') }}</span>
                                            @endif
                                        @else
                                            <span class="badge bg-secondary">{{ __('Not Recorded') }}</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
