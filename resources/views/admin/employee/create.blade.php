@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Add New Employee') }}
@endsection

@section('header')
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <form method="POST" action="{{ route('employee.store') }}">
        @csrf
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
                    <input type="text" name="firstname" id="firstname" class="form-control" />
                  </div>
                  <div class="col-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required />
                  </div>
                  <div class="col-12">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="col-6">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('Primary Phone') }}" required oninput="formatPhoneNumber(this)" maxlength="19" />
                    {{-- <input type="text" name="phone" id="phone" class="form-control" required> --}}
                  </div>
                  <div class="col-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="{{ __('Date of Birth') }}" />
                  </div>
                  <div class="col-12">
                    <label for="department">Department</label>
                    <select name="department_id" class="form-control" id="department">
                      @forelse ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Male') }}</option>
                      <option value="2">{{ __('Female') }}</option>
                      <option value="3">{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="religion">Religion</label>
                    <select name="religion" class="form-control" id="religion">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Islam') }}</option>
                      <option value="2">{{ __('Christian') }}</option>
                      <option value="3">{{ __('Hinduism') }}</option>
                      <option value="4">{{ __('Buddhist') }}</option>
                      <option value="5">{{ __('Others') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="marital">Marital Status</label>
                    <select name="marital" class="form-control" id="marital">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Married') }}</option>
                      <option value="2">{{ __('Unmarried') }}</option>
                      <option value="3">{{ __('Divorced') }}</option>
                      <option value="4">{{ __('Widowed') }}</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Currently Employed') }}</option>
                      <option value="2">{{ __('Retired') }}</option>
                      <option value="3">{{ __('Resigned') }}</option>
                      <option value="4">{{ __('Terminated') }}</option>
                      <option value="5">{{ __('On Leave') }}</option>
                      <option value="6">{{ __('Contract Ended') }}</option>
                      <option value="7">{{ __('Part-Time') }}</option>
                      <option value="8">{{ __('Full-Time') }}</option>
                      <option value="9">{{ __('Freelancer') }}</option>
                      <option value="10">{{ __('Intern') }}</option>
                      <option value="11">{{ __('Transferred') }}</option>
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
                      <i class="align-middle me-1" data-feather="plus"></i>
                      <span class="ps-1">{{ __('Create New') }}</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ... Previous content ... -->

          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Salary') }}</h5>
              </div>
              <div class="card-body">
                <label for="basic">Basic Salary</label>
                <input type="number" name="basic" class="form-control" id="basic" step="0.01" required>
                
                <label for="house_rent">House Rent Allowance</label>
                <input type="number" name="suggestedRent" class="form-control" id="rent" step="0.01" readonly >
          
                <label for="medical">Medical Allowance</label>
                <input type="number" name="suggestedAllowance" class="form-control" id="medical" step="0.01" readonly >
          
                <label for="transport">Transport Allowance</label>
                <input type="number" name="transport" class="form-control" id="transport" step="0.01" readonly >
          
                <label for="special">Special Allowance</label>
                <input type="number" name="specialrent" class="form-control" id="special" step="0.01" readonly >
          
                {{-- <label for="bonus">Bonus</label>
                <input type="number" name="bonus" class="form-control" id="bonus" step="0.01"> --}}
          
                <label for="overtime_pay">Overtime Pay</label>
                <input type="number" name="overtime_pay" class="form-control" id="overtime_pay" step="0.01" readonly >
          
                <label for="provident_fund">Provident Fund</label>
                <input type="number" name="provident_fund" class="form-control" id="provident_fund" step="0.01" readonly >
          
                {{-- <label for="advance">Advance</label>
                <input type="number" name="advance" class="form-control" id="advance" step="0.01" > --}}
          
                <label for="tax">Tax</label>
                <input type="number" name="tax" class="form-control" id="tax" step="0.01">
              </div>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#basicSalary').on('ínput', function() {
      var basicSalary = $(this).val;
      var suggestedRent = basicSalary * 0.5;
      ('#suggestedRent').val(suggestedRent);
    });
  });
</script>
@endsection