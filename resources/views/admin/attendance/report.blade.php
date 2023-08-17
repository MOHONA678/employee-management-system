@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Attendance Report</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Monthly Attendance Report</h5>
          <div class="mt-5 table-responsive">
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="w-25" style="width: 300px">Employee Name</th>
                        @for ($day = 1; $day <= $daysInMonth; $day++)
                            <th>{{ $day }}</th>
                        @endfor
                        <th>Total Present</th>
                        <th>Total Absent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th>{{ $employee->firstname }} {{ $employee->lastname }}</th>
                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                @php
                                  $attendance = $employee->attendances->where('date', $date)->first();
                                @endphp
                                <td>
                                    @if ($attendance)
                                        {{-- {{ $attendance->status == "1" ? 'P' : 'A' }} --}}
                                        {{$attendance->status}}
                                    @endif
                                </td>
                            @endfor
                            <td>{{ $userAttendanceData[$employee->id]['present'] }}</td>
                            <td>{{ $userAttendanceData[$employee->id]['absent'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        {{-- <div class="card-body">
            <input type="date" name="start_date" id="" />
            <input type="date" name="end_date" id="" />
        </div> --}}
      </div>
    </div>
  </section>
@endsection

@section('script')
@endsection