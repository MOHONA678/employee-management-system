@extends('layouts.admin')

@section('title')
    {{ __('Edit Designation') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Update Designation</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-6">
        <form action="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.update', $designation->id) : ( Auth::user()->role->slug === 'administrator' ? route('admin.designation.update', $designation->id) : route('hr.designation.update', $designation->id) ) }}" method="post">
          @csrf
          @method('put')
          <div class="card flex-fill">
            <div class="card-header">
              <h5 class="card-title mb-0">{{ __('Update Existing Designation') }}</h5>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12">
                  <label for="title">Desgination Title</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ $designation->title }}" required />
                </div>
                <div class="col-12">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" id="description" cols="30" rows="6">{{ $designation->description }}</textarea>
                </div>
                <div class="col-12">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="">{{ __('-- Choose One --') }}</option>
                    <option value="1" {{ $designation->status == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                    <option value="0" {{ $designation->status == 0 ? 'selected' : '' }}>{{ __('Disable') }}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row g-3">
                <div class="col-6 d-grid">
                  <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.index', $designation->id) : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.index', $designation->id) : route('hr.designation.index', $designation->id) ) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ps-1">{{ __('Discard') }}</span>
                  </a>
                </div>
                <div class="col-6 d-grid">
                  <button type="submit" class="btn btn-outline-secondary">
                    <i class="fas fa-check"></i>
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