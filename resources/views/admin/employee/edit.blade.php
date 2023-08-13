@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Edit Employee') }}
@endsection

@section('header')
<h1 class="h3 mb-3">Update Employee</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <form method="POST" action="{{ route('employee.update', $employee->id) }}">
        @csrf
        @method('put')
        <div class="row g-3">
          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ ('Informations') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $employee->firstname }}" />
                  </div>
                  <div class="col-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $employee->lastname }}" required />
                  </div>
                  <div class="col-12">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
                  </div>
                  <div class="col-6">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('Primary Phone') }}" value="{{ $employee->phone }}" required oninput="formatPhoneNumber(this)" maxlength="19" />
                    {{-- <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}" required> --}}
                  </div>
                  <div class="col-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="{{ __('Date of Birth') }}" value="{{ $employee->dob }}" />
                  </div>
                  <div class="col-12">
                    <label for="phone">Department</label>
                    <select name="department_id" class="form-control" id="department">
                      @forelse ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id === $employee->department_id ? 'selected' : '' }} >{{ $department->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->gender === 1 ? 'selected' : '' }} >{{ __('Male') }}</option>
                      <option value="2" {{ $employee->gender === 2 ? 'selected' : '' }} >{{ __('Female') }}</option>
                      <option value="3" {{ $employee->gender === 3 ? 'selected' : '' }} >{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="religion">Religion</label>
                    <select name="religion" class="form-control" id="religion">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->religion === 1 ? 'selected' : '' }} >{{ __('Islam') }}</option>
                      <option value="2" {{ $employee->religion === 2 ? 'selected' : '' }} >{{ __('Christian') }}</option>
                      <option value="3" {{ $employee->religion === 3 ? 'selected' : '' }} >{{ __('Hinduism') }}</option>
                      <option value="4" {{ $employee->religion === 4 ? 'selected' : '' }} >{{ __('Buddhist') }}</option>
                      <option value="5" {{ $employee->religion === 5 ? 'selected' : '' }} >{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="marital">Marital Status</label>
                    <select name="marital" class="form-control" id="marital">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->marital === 1 ? 'selected' : '' }} >{{ __('Married') }}</option>
                      <option value="2" {{ $employee->marital === 2 ? 'selected' : '' }} >{{ __('Unmarried') }}</option>
                      <option value="3" {{ $employee->marital === 3 ? 'selected' : '' }} >{{ __('Divorced') }}</option>
                      <option value="4" {{ $employee->marital === 4 ? 'selected' : '' }} >{{ __('Widowed') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->status === 1 ? 'selected' : '' }} >{{ __('Currently Employed') }}</option>
                      <option value="2" {{ $employee->status === 2 ? 'selected' : '' }} >{{ __('Retired') }}</option>
                      <option value="3" {{ $employee->status === 3 ? 'selected' : '' }} >{{ __('Resigned') }}</option>
                      <option value="4" {{ $employee->status === 4 ? 'selected' : '' }} >{{ __('Terminated') }}</option>
                      <option value="5" {{ $employee->status === 5 ? 'selected' : '' }} >{{ __('On Leave') }}</option>
                      <option value="6" {{ $employee->status === 6 ? 'selected' : '' }} >{{ __('Contract Ended') }}</option>
                      <option value="7" {{ $employee->status === 7 ? 'selected' : '' }} >{{ __('Part-Time') }}</option>
                      <option value="8" {{ $employee->status === 8 ? 'selected' : '' }} >{{ __('Full-Time') }}</option>
                      <option value="9" {{ $employee->status === 9 ? 'selected' : '' }} >{{ __('Freelancer') }}</option>
                      <option value="10" {{ $employee->status === 10 ? 'selected' : '' }} >{{ __('Intern') }}</option>
                      <option value="11" {{ $employee->status === 11 ? 'selected' : '' }} >{{ __('Transferred') }}</option>
                    </select>
                  </div> 
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-6 d-grid">
                    <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary" >
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
          </div>
          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ ('Salary') }}</h5>
              </div>
              <div class="card-body"></div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
@endsection