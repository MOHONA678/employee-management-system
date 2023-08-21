@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Empty card</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover my-0 table-bordered table-sm data-table" >
              <thead>
                <tr>
                  <th scope="col">Employee Name</th>
                  {{-- <th scope="col">Designation</th> --}}
                  <th scope="col">Basic Salary</th>
                  <th scope="col">House rent</th>
                  <th scope="col">Medical</th>
                  <th scope="col">Transport</th>
                  <th scope="col">Phone Bill</th>
                  <th scope="col">Internet Bill</th>
                  <th scope="col">Special</th>
                  <th scope="col">Gross Salary</th>
                </tr>
              </thead>
              <tbody>
                  <form action="{{ route('allowance.store') }}" method="post">
                    @csrf
                      @foreach ($employees as $index => $employee)
                        <tr class="employee">
                          <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                          <td>{{ $employee->firstname . ' ' . $employee->lastname }}</td>
                          {{-- <td>{{ $employee->department->title }}</td> --}}
                          <td>
                            <input type="number" id="basic{{ $index }}" class="form-control basic" value="{{ $employee->salary['basic'] }}" readonly />
                          </td>
                          <td>
                            <input type="number" id="rent{{ $index }}" class="form-control rent" value="{{ $employee->salary['house_rent'] }}" readonly />
                          </td>
                          <td>
                              <input type="number" id="medical{{ $index }}" class="form-control medical" value="{{ $employee->salary['medical'] }}" readonly />
                          </td>
                          <td>
                              <input type="number" id="transport{{ $index }}" class="form-control transport" value="{{ $employee->salary['transport'] }}" readonly />
                          </td>
                          <td>
                            <input type="number" id="mobile{{ $index }}" class="form-control mobile" value="{{ $employee->salary['phone_bill'] }}" />
                          </td>
                          <td>
                            <input type="number" id="internet{{ $index }}" class="form-control internet" value="{{ $employee->salary['internet_bill'] }}" />
                          </td>
                          <td>
                            <input type="number" id="spcaial{{ $index }}" class="form-control spcaial" value="{{ $employee->salary['spacial'] }}" />
                          </td>
                          
                          <td>
                              <input type="number" name="gross_salary" id="gross{{ $index }}" class="form-control result" value="{{ $employee['gross_salary'] }}" readonly />
                              {{-- <p class="gross-salary">Gross Salary: <span class="result">{{ $employee['gross_salary'] }}</span></p> --}}
                          </td>
                        </tr>
                        @endforeach
                        <div class="row mb-4">
                          <div class="col-2">
                            <select name="year" class="form-control" id="year">
                              <option value="2020">{{ __('2020') }}</option>
                              <option value="2021">{{ __('2021') }}</option>
                              <option value="2022">{{ __('2022') }}</option>
                              <option value="2023">{{ __('2023') }}</option>
                            </select>
                          </div>
                          <div class="col-2">
                            <select name="month" class="form-control" id="month">
                              <option value="January">{{ __('January') }}</option>
                              <option value="February">{{ __('February') }}</option>
                              <option value="March">{{ __('March') }}</option>
                              <option value="April">{{ __('April') }}</option>
                              <option value="May">{{ __('May') }}</option>
                              <option value="June">{{ __('July') }}</option>
                              <option value="August">{{ __('August') }}</option>
                              <option value="September">{{ __('September') }}</option>
                              <option value="October">{{ __('October') }}</option>
                              <option value="November">{{ __('November') }}</option>
                              <option value="December">{{ __('December') }}</option>
                            </select>
                          </div>
                          <div class="col-2">
                            <button type="submit" class="btn btn-success" >submit</button>
                          </div>
                        </div>
        
                  </form>
        
        
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
<script>
$(document).ready(function() {
            $(".employee").each(function() {
                var $employee = $(this);
                var basic = parseFloat($employee.find(".basic").val());
                var rent = parseFloat($employee.find(".rent").val());
                var grossSalary = basic + rent;
                
                $employee.find(".result").val(grossSalary.toFixed(2));

                $gross = localStorage.setItem("grossSalary{{ $index }}", grossSalary.toFixed(2));
            });
        });
</script>
@endsection