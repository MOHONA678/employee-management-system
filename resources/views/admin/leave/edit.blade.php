@extends('layouts.admin')

@section('title', __('Edit Leave'))

@section('header')
    <h1 class="h3 mb-3">{{ __('Update Leave') }}</h1>
@endsection

@section('content')
    <section class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-6">
                <form action="{{ route('leave.update', $leave->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ __('Update Leave Record') }}</h5>
                        </div>
                        <div class="card-body py-0">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="title" class="form-label">{{ __('Leave Title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $leave->title }}" required />
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">{{ __('Leave Description') }}</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="{{ __('Type details here ...') }}">{{ $leave->description }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="leave_type" class="form-label">{{ __('Leave Type') }}</label>
                                    <select name="leave_type" id="leave_type" class="form-control" required>
                                        <option value="1" {{ $leave->leave_type == 1 ? 'selected' : '' }}>Vacation</option>
                                        <option value="2" {{ $leave->leave_type == 2 ? 'selected' : '' }}>Sick Leave</option>
                                        <option value="3" {{ $leave->leave_type == 3 ? 'selected' : '' }}>Emergency Leave</option>
                                        <!-- Add other options here -->
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="status" class="form-label">{{ __('Leave Status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" {{ $leave->status == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                        <option value="0" {{ $leave->status == 0 ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-grid">
                                    <a href="{{ route('leave.index') }}" class="btn btn-outline-secondary">
                                        <i class="align-middle me-1" data-feather="arrow-left"></i>
                                        <span class="ps-1">{{ __('Discard') }}</span>
                                    </a>
                                </div>
                                <div class="col-6 d-grid">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="align-middle me-1" data-feather="check"></i>
                                        <span class="ps-1">{{ __('Update') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
