@extends('layouts.admin')

@section('title')
    {{ __('Manage attendance') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Daily attendance') }}</h1>
    <a href="{{route('attendance.create')}}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      <span class="ps-1">{{ __('Add new') }}</span>
    </a>
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
  
  
            <form action="{{route('check.store')}}" method="post">
               
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
  
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" id="check_box"
                                        name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                        @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">
  
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " id="check_box"
                                        name="depart[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"
                                        @if (isset($check_depart))  checked @endif id="inlineCheckbox2" value="1">
  
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

@endsection