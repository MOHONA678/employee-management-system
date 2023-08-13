@extends('layouts.admin')

@section('title')
    {{ __('Manage attendance') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3">{{ __('Manage attendance') }}</h1>
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
        <h5 class="card-title mb-0">{{ __('Employee Attendance') }}</h5>
      </div>
      <table class="table table-hover my-0">
        <thead>
          <tr>
            <th class="d-none d-xl-table-cell">{{ __('SL') }}</th>
            <th class="d-none d-xl-table-cell" >{{ __('Date') }}</th>
            <th>{{ __('Employee') }}</th>
            <th class="d-none d-xl-table-cell">{{ __('Checkin_time') }}</th>
            <th>{{ __('Checkout_time') }}</th>
            <th>{{ __('Action') }}</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($attendances as $k => $attendance)
            <tr>
              <td class="d-none d-xl-table-cell">{{ $k + 1 }}</td>
              <td class="d-none d-xl-table-cell">
                <strong>{{ $attendance->date }}</strong>
              </td>
              <td>
                <strong>{{ $attendance->employee->firstname }} {{ $attendance->employee->lastname }}</strong>
              </td>
              <td class="d-none d-xl-table-cell">{{ $attendance->checkin_time }}</td>
              <td>{{ $attendance->checkout_time }}</td>
              <td width="90px">
                <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                {{-- <form action="{{ route("attendance.destroy", $attendance->id) }}" method="post">
                  @csrf
                  @method("delete")
                  <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteUser(event, this)">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form> --}}
              </td>
            </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">
              No data found
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  function deleteUser(e, t) {
    e.preventDefault();
    let c = confirm("Are you sure?");
    if (!c) return;
    t.closest('form').submit();
  }
</script>  
@endsection