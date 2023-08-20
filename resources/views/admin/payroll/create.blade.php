@extends('layouts.admin')

@section('title')
    {{ __('Employee Attendance') }}
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
                                @php
                    $today = today();
                    $dates = [];
                    
                    for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                        // $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                        $dates[] = $i;
                    }
                    
                @endphp
                @foreach ($dates as $date)
                    <th scope="col">
                        {{ $date }}
                    </th>
  
                @endforeach
                    </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                                    @foreach ($dates as $date)
                                        {{-- @php
                                            $attendance = $employee->attendance->where('attendance_date', $date)->first();
                                        @endphp --}}
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

@section('script')
@endsection
