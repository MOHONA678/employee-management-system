@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Edit Employee') }}
@endsection

@section('header')
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
                <h5 class="card-title mb-0">{{ ('Personal') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="firstname">{{ __('First Name') }}</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="John" value="{{ $employee->firstname }}" />
                  </div>
                  <div class="col-6">
                    <label for="lastname">{{ __('Last Name') }}</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Doe" value="{{ $employee->lastname }}" required />
                  </div>
                  <div class="col-12">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="john@example.com" value="{{ $employee->email }}"" required>
                  </div>
                  <div class="col-6">
                    <label for="phone">{{ __('Cell Phone') }}</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('+88 (01X) XX-XXXXXX') }}" value="{{ $employee->phone }}" required oninput="formatPhoneNumber(this)" maxlength="19" />
                  </div>
                  <div class="col-6">
                    <label for="dob">{{ __('Date of Birth') }}</label>
                    <input type="date" name="dob" class="form-control" id="dob" value="{{ $employee->dob }}" />
                  </div>
                  <div class="col-12">
                    <label for="address">{{ __('Address') }}</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="6" placeholder="Type address here">{{ $employee->address }}</textarea>
                  </div>
                  <div class="col-4">
                    <label for="gender">{{ __('Gender') }}</label>
                    <select name="gender" class="form-control" id="gender">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->gender === 1 ? 'selected' : '' }} >{{ __('Male') }}</option>
                      <option value="2" {{ $employee->gender === 2 ? 'selected' : '' }} >{{ __('Female') }}</option>
                      <option value="3" {{ $employee->gender === 3 ? 'selected' : '' }} >{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="religion">{{ __('Religion') }}</label>
                    <select name="religion" class="form-control" id="religion">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->religion === 1 ? 'selected' : '' }} >{{ __('Islam') }}</option>
                      <option value="2" {{ $employee->religion === 2 ? 'selected' : '' }} >{{ __('Christian') }}</option>
                      <option value="3" {{ $employee->religion === 3 ? 'selected' : '' }} >{{ __('Hinduism') }}</option>
                      <option value="4" {{ $employee->religion === 4 ? 'selected' : '' }} >{{ __('Buddhist') }}</option>
                      <option value="5" {{ $employee->religion === 5 ? 'selected' : '' }} >{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="marital">{{ __('Martial Status') }}</label>
                    <select name="marital" class="form-control" id="marital">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1" {{ $employee->marital === 1 ? 'selected' : '' }} >{{ __('Married') }}</option>
                      <option value="2" {{ $employee->marital === 2 ? 'selected' : '' }} >{{ __('Unmarried') }}</option>
                      <option value="3" {{ $employee->marital === 3 ? 'selected' : '' }} >{{ __('Divorced') }}</option>
                      <option value="4" {{ $employee->marital === 4 ? 'selected' : '' }} >{{ __('Widowed') }}</option>
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
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Organizational') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <label for="department">{{ __('Department') }}</label>
                    <select name="department_id" class="form-control" id="department">
                      @forelse ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id === $employee->department_id ? 'selected' : '' }} >{{ $department->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="designation">{{ __('Designation') }}</label>
                    <select name="designation_id" class="form-control" id="designation">
                      @forelse ($designations as $designation)
                        <option value="{{ $designation->id }}" {{ $designation->id === $employee->designation_id ? 'selected' : '' }} >{{ $designation->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="employeeId">{{ __('Employee ID') }}</label>
                    <div class="input-group">
                      <button type="button" class="btn btn-secondary btn-sm" id="generate" disabled >
                        <i class="fas fa-arrows-rotate"></i>
                      </button>
                      <input type="text" name="unique_id" id="employeeId" class="form-control" value="{{ $employee->unique_id }}" />
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="basic">{{ __('Basic Salary') }}</label>
                    <input type="number" name="basic" class="form-control" id="basic" value="{{ $employee->salary ? $employee->salary->basic : '' }}" required>
                  </div>
                  <div class="col-6">
                    <label for="schedule">{{ __('Working Schedule') }}</label>
                    <select name="schedule_id" class="form-control" id="schedule">
                      @forelse ($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ $schedule->id === $employee->schedule_id ? 'selected' : '' }} > {{ $schedule->title }} </option>
                      @empty
                      <option value="">{{ __('--Choose Schedule--') }}</option>
                      @endforelse
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
            </div>
          </div>
          <!-- ... Previous content ... -->

          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Allowance') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="house_rent">House Rent</label>
                    <input type="number" name="house_rent" class="form-control" id="rent" value="{{ $employee->salary ? $employee->salary->house_rent : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="medical">Medical</label>
                    <input type="number" name="medical" class="form-control" id="medical" value="{{ $employee->salary ? $employee->salary->medical : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="transport">Transport</label>
                    <input type="number" name="transport" class="form-control" id="transport" value="{{ $employee->salary ? $employee->salary->transport : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="special">Phone Bill</label>
                    <input type="number" name="phone_bill" class="form-control" id="special" value="{{ $employee->salary ? $employee->salary->phone_bill : '' }}" />
                  </div>
                  <div class="col-6">
                    <label for="special">Internet Bill</label>
                    <input type="number" name="internet_bill" class="form-control" id="special" value="{{ $employee->salary ? $employee->salary->internet_bill : '' }}" />
                  </div>
                  <div class="col-6">
                    <label for="special">Special</label>
                    <input type="number" name="special" class="form-control" id="special" value="{{ $employee->salary ? $employee->salary->special : '' }}" />
                  </div>
                </div>
                {{-- <label for="overtime_pay">Overtime Pay</label>
                <input type="number" name="overtime_pay" class="form-control" id="overtime_pay" step="0.01" readonly > --}}
              </div>
            </div>
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Deductions') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="provident_fund">{{ __('Provident Fund') }}</label>
                    <input type="number" name="provident_fund" class="form-control" id="providentFund" value="{{ $employee->salary ? $employee->salary->provident_fund : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="tax">{{ __('Income Tax') }}</label>
                    <input type="number" name="income_tax" class="form-control" id="incomeTax" value="{{ $employee->salary ? $employee->salary->income_tax : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="provident_fund">{{ __('Health Insurance') }}</label>
                    <input type="number" name="health_insurance" class="form-control" id="healthInsrance" value="{{ $employee->salary ? $employee->salary->health_insurance : '' }}" readonly />
                  </div>
                  <div class="col-6">
                    <label for="tax">{{ __('Life Insurance') }}</label>
                    <input type="number" name="life_insurance" class="form-control" id="lifeInsurance" value="{{ $employee->salary ? $employee->salary->life_insurance : '' }}" readonly />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
@endsection