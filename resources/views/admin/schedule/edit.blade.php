@extends('layouts.admin')

@section('title')
    {{ __('Edit user') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Update Schedule</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{  Auth::user()->role->slug === 'super-admin' ? route('schedule.update', $schedul->id) : ( Auth::user()->role->slug === 'administrator' ? route('admin.schedule.update', $schedule->id) : route('moderator.schedule.update', $schedule->id) )  }}" method="post">
          @csrf
          @method('put')
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Update Schedule') }}</h5>
            </div>
            <div class="card-body py-0">
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('title') }}" value="{{ $schedule->title }}" required />
                </div>
                <div class="col-12">
                    <input type="time" name="time_in" class="form-control" id="title" placeholder="{{ __('time_in') }}" value="{{ $schedule->time_in }}" required />
                </div>
                <div class="col-12">
                    <input type="time" name="time_out" class="form-control" id="title" placeholder="{{ __('time_out') }}" value="{{ $schedule->time_out }}" required />
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