@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Add New Employee') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Dashboard</h1>

            <h1>Create Employee</h1>

    <form method="POST" action="{{ route('employee.store') }}">
        @csrf
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
            <div class="col-12">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="col-12">
                <label for="phone">Department</label>
                <select name="department_id" class="form-control" id="department">
                    @forelse ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->title }}</option>
                    @empty
                      <option value="">{{ __('-- Choose One --') }}</option>
                    @endforelse
                </select>
            </div>
            
        </div>
        
        <!-- Add more input fields for other employee details -->

        <button type="submit" class="btn btn-primary my-2">Create</button>
    </form>

        </div>
    </main>
@endsection