@extends('layouts.admin')

@section('title')
    {{ __('Add New user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Create Schedule</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.store') : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.store') : route('moderator.schedule.store') ) }}" method="post">
          @csrf
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Create New Schedule') }}</h5>
            </div>
            <div class="card-body py-0">
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('title') }}" value="{{ old('title') }}" required />
                </div>
                <div class="col-12">
                    <input type="time" name="time_in" class="form-control" id="title" placeholder="{{ __('time_in') }}" value="{{ old('time_in') }}" required />
                  </div>
                  <div class="col-12">
                    <input type="time" name="time_out" class="form-control" id="title" placeholder="{{ __('time_out') }}" value="{{ old('time_out') }}" required />
                  </div>
               
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-6 d-grid">
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.index', $schedule->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.index', $schedule->id) : route('moderator.schedule.index', $schedule->id) ) }}" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="arrow-left"></i>
                    <span class="ps-1">{{ __('Discard') }}</span>
                  </a>
                </div>
                <div class="col-6 d-grid">
                  <button type="submit" class="btn btn-outline-secondary" >
                    <i class="align-middle me-1" data-feather="plus"></i>
                    <span class="ps-1">{{ __('Create New') }}</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- <div class="col-5">
      @include('partials.error')
    </div> --}}
  </section>
@endsection

@section('script')
@endsection