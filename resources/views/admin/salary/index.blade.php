@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Manage salary') }}
@endsection

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3">Salary</h1>
                <a href="{{ route('salary.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">{{ __('Add New') }}</span>
                </a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Empty card</h5>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection