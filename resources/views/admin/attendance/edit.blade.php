@extends('layouts.admin')

@section('title')
    {{ __('Edit user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Update Attendance</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{ route('attendance.update', $attendance->id) }}" method="post">
          @csrf
          @method('put')
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Update attendance') }}</h5>
            </div>
            <div class="card-body py-0">
              <div class="row g-3">
                <div class="col-12">
                  <input type="date" name="name" class="form-control" id="title" placeholder="{{ __('Date') }}" value="{{ $attendance->date }}" required />
                </div>
                <div class="col-12">
                  <select name="employee_id" class="form-control" id="role">
                    @forelse ($employees as $employee)
                      <option value="{{$employee->id}}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                    @empty
                      <option value="">{{ __('-- employee --') }}</option>
                    @endforelse
                  </select>
                </div>
                <div class="col-4">
                  <input type="time" name="Checkin_time" class="form-control" id="title" placeholder="{{ __('Checkin_time') }}" value="{{ $attendance->checkin_time }}" required />
                </div>
                <div class="col-4">
                  <input type="time" name="Checkout_time" class="form-control" id="title" placeholder="{{ __('Checkout_time') }}" value="{{ $attendance->checkout_time }}" required />
                </div>
                <div class="col-4">
                  <select name="status" class="form-control" id="status">
                    <option value="">{{ __('-- Status --') }}</option>
                    <option value="1" {{ $attendance->status ===  1 ? 'selected' : '' }} >{{ __('Present') }}</option>
                    <option value="0" {{ $attendance->status ===  0 ? 'selected' : '' }} >{{ __('Absent') }}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-6 d-grid">
                  <a href="{{ route('attendance.index') }}" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="arrow-left"></i>
                    <span class="ps-1">{{ __('Discard') }}</span>
                  </a>
                </div>
                <div class="col-6 d-grid">
                  <button type="submit" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="check"></i>
                    <span class="ps-1">{{ __('Update') }}</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      {{-- <div class="col-5">
        @include('partials.error')
      </div> --}}
    </div>
  </section>
@endsection

@section('script')
    
@endsection