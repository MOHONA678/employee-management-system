@extends('layouts.admin')

@section('title')
    {{ __('Manage attendance') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Daily attendance') }}</h1>
    {{-- <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('attendance.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.attendance.create') : route('moderator.attendance.create') ) }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add new') }}</span>
    </a> --}}
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-header">              
        <h5 class="card-title mb-0">{{ __('Employees Daily Attendance') }}</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-hover my-0 table-bordered">
       
          <thead>
            <tr>
  
                <th scope="col" width="10%">Employee Name</th>
                
                <th scope="col">Employee Position</th>
                <th scope="col">Employee ID</th>
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
  
  
            <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('check.store') : (Auth::user()->role->slug === 'administrator' ? route('admin.check.store') : route('moderator.check.store') ) }}" method="post">
               
                <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
                @csrf
                @foreach ($employees as $employee)
  
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
  
                    <tr>
                        <td class="py-0">{{ $employee->firstname }} {{ $employee->lastname }}</td>
                        <td>{{ $employee->designation->title }}</td>
                        <td>{{ $employee->id }}</td>
  
  
  
  
  
  
                        @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)
  
  
                            @php
                                
                                $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');

                                $isFriday = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->isFriday();
                                
                                $check_attd = \App\Models\Attendance::query()
                                    ->where('employee_id', $employee->id)
                                    ->where('attendance_date', $date_picker)
                                    // ->where('status', $date_picker)
                                    ->first();
                                
                                $check_depart = \App\Models\Depart::query()
                                    ->where('employee_id', $employee->id)
                                    ->where('depart_date', $date_picker)
                                    // ->where('status', $date_picker)
                                    ->first();
                                
                            @endphp
                            <td class="@if ($isFriday) bg-light @endif">
  
                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box"
                                        name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                        @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">
  
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " id="check_box"
                                        name="depart[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"
                                        @if (isset($check_depart))  checked @endif id="inlineCheckbox2" value="1">
  
                                </div> --}}

                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box"
                                        name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                       @if (isset($check_attd)) checked @endif id="inlineCheckbox1" >
                                       
  
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box"
                                        name="depart[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"
                                       @if (isset($check_depart)) checked @endif id="inlineCheckbox2" >
  
                                </div> --}}

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box_attd_{{ $i }}"
                                        name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                        @if (isset($check_attd)) checked @endif >
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box_depart_{{ $i }}"
                                        name="depart[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                        @if (isset($check_depart)) checked @endif >
                                </div>
  
                            </td>
  
                        @endfor
                        
                    </tr>
                @endforeach
  
            </form>
  
  
        </tbody>
  
        </table>
      </div>
      
    </div>
  </div>
</section>
@endsection

@section('script')
{{-- <input type="checkbox" name="status" id="statusCheckbox">
<label for="statusCheckbox">Status</label> --}}

<script>
document.addEventListener("DOMContentLoaded", function() {
    // const checkbox = document.getElementById("statusCheckbox");
    const checkbox = document.querySelector(".checkbox");
    checkbox.addEventListener("change", function() {
        if (checkbox.checked) {
            checkbox.value = "1"; // Checked, value is 1
        } else {
            checkbox.value = "0"; // Unchecked, value is 0
        }
    });
});
</script>

@endsection