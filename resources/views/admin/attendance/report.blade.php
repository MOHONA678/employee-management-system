@extends('layouts.admin')

@section('title')
  {{ __('Attendance Report') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">{{ __('Attendance Report') }}</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">{{ __('Monthly Attendance Report of August') }}</h5>
        </div>
        <div class="card-body">
          <div class="mb-4">
            {{-- <input type="date" name="start_date" id="" />
            <input type="date" name="end_date" id="" /> --}}
          </div>
          <div class="mt-5 table-responsive">
            <table class="table table-bordered table-striped data-table">
              <thead>
                <tr>
                  <th>{{ __('Employee Name') }}</th>
                  <th>{{ __('Employee Position') }}</th>
                  <th>{{ __('Employee ID') }}</th>
                  @php 
                    $today = today();
                    $dates = [];
                    for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                      // $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                      $dates[] = $i;
                    }
                  @endphp

                  @foreach ($dates as $date)
                    <th>{{ $date }}</th>
                  @endforeach
                  <th>{{ __('Total Presents') }}t</th>
                  <th>{{ __('Total Absents') }}</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalPresents = []; $totalAbsents = [];
                @endphp

                @foreach ($employees as $employee)
                  <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <tr>
                      <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                      <td>{{ $employee->designation->title }}</td>
                      <td>{{ $employee->id }}</td>
                      @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)
                        @php
                          $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                          $check_attd = \App\Models\Attendance::query()
                                        ->where('employee_id', $employee->id)
                                        ->where('attendance_date', $date_picker)
                                        ->first();
                                
                          $check_depart = \App\Models\Depart::query()
                                        ->where('employee_id', $employee->id)
                                        ->where('depart_date', $date_picker)
                                        ->first();
                        @endphp
                        <td>
                          <div class="form-check form-check-inline ">
                            {{-- @if (isset($check_attd)) --}}
                              @if (isset($check_attd) && $check_attd->status==1)
                                <i class="fa fa-check text-success present"></i>
                                @elseif(isset($check_attd) && $check_attd->status==NULL)
                                <i class="far fa-circle text-secondary"></i>
                                @else
                                <i class="fas fa-times text-danger"></i>
                              @endif       
                            {{-- @else --}}
                              {{-- <i class="far fa-circle text-secondary"></i> --}}
                            {{-- @endif --}}
                            {{-- @if (isset($check_attd))
                              @if ($check_attd->status==1)
                                <i class="fa fa-check text-success present"></i>
                                @elseif($check_attd->status==0)
                                <i class="fas fa-times text-danger"></i>
                              @else
                                <i class="far fa-circle text-secondary"></i>
                              @endif       
                            @else
                              <i class="far fa-circle text-secondary"></i>
                            @endif --}}
                          </div>
                          <div class="form-check form-check-inline">
                            @if (isset($check_depart))
                              @if ($check_depart->status==1)
                                <i class="fa fa-check text-success present"></i>
                              @else
                                <i class="fa fa-check text-danger"></i>
                              @endif    
                            @else
                              <i class="fas fa-times text-danger"></i>
                            @endif
                          </div>
                        </td>
                      @endfor
                      <td>
                        {{ $present = App\Models\Attendance::where('employee_id', $employee->id)->where('status', 1)->count() }}
                        @if ($present > 0)
                          @php
                            $totalPresents[$employee->id] = $present;
                          @endphp
                        @endif
                      </td>
                      <td>{{ $absent = $today->daysInMonth - $present }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
@endsection