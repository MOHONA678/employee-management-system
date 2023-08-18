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
                <tr >

                  <th>Employee Name</th>
                  <th>Employee Position</th>
                  <th>Employee ID</th>
                    @php
                        $today = today();
                        $dates = [];
                        
                        for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                        // $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                        $dates[] = $i;
                        }
                        
                    @endphp
                    @foreach ($dates as $date)
                  <th style="">
                    
                        
                            {{ $date }}
                    
                  </th>
              

                    @endforeach

                </tr>
            </thead>

            <tbody>


              {{-- @php
    $successCount = 0; // Initialize the success count variable
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
                <div class="form-check form-check-inline">
                    @if (isset($check_attd))
                        @if ($check_attd->status == 1)
                            <i class="fa fa-check text-success"></i>
                            @php
                                $successCount++; // Increment the success count
                            @endphp
                        @else
                            <i class="fa fa-check text-danger"></i>
                        @endif
                    @else
                        <i class="fas fa-times text-danger"></i>
                    @endif
                </div>
                <div class="form-check form-check-inline">
                                  
                                    @if (isset($check_depart))
                                    @if ($check_depart->status==1)
                                    <i class="fa fa-check text-success"></i>
                                    @else
                                    <i class="fa fa-check text-danger"></i>
                                    @endif
                                  
                               @else
                               <i class="fas fa-times text-danger"></i>
                               @endif
                                

                                </div>
            </td>
            <!-- ... Your existing code ... -->
        @endfor
    </tr>
    <!-- ... Your existing code ... -->
@endforeach

@php
    echo "Number of successes: " . $successCount; // Display the success count
@endphp --}}


@php
    $successIcons = collect(); // Initialize a collection to store success icons
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

                                    @if (isset($check_attd))
                                         @if ($check_attd->status==1)
                                         <i class="fa fa-check text-success present"></i>
                                         @else
                                         <i class="fa fa-check text-danger"></i>
                                         @endif
                                       
                                    @else
                                    <i class="fas fa-times text-danger"></i>
                                    @endif
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
                    </tr>
                @endforeach

@php
    $successCount = $successIcons->count();
    echo "Number of success icons: " . $successCount;
@endphp



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
<script>
    $(document).ready(function() {
      // var present = 0;
      // $('.present').each(function() {
      //   console.log(present++);
      // });
      var successCount = $(".fa.fa-check.text-success").length;
        
        // Display the count in the browser's console
        console.log("Number of success icons: " + successCount);
    });
</script>
@endsection