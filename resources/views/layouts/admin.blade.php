<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
	<meta name="author" content="Mohona Akter Nabila & Shorifa Akter" />
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />
	<title>@yield('title') | {{ config('app.name') }}</title>
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
  </head>
  <body>
	<div class="wrapper">
	  {{-- SIDEBAR --}}
	  @include('partials.sidebar')
	  {{-- CONTENT AREA --}}
	  <div class="main">
		{{-- NAVBAR --}}
		@include('partials.navbar')
		{{-- MAIN CONTENT --}}
        <main class="content">
          <div class="container-fluid p-0">
		  	{{-- CONTENT HEADER --}}
		  	@yield('header')
			{{-- FLASH MESSAGE --}}
			@include('partials.flash')
			{{-- CONTENT SECTION --}}
			@yield('content')
          </div>
        </main>

            {{-- @yield('content')
			<main class="content">
                <div class="container-fluid p-0">
        
                    <h1 class="h3 mb-3">Dashboard</h1>
        
                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Empty card</h5>
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </main> --}}
		{{-- FOOTER BAR --}}
		@include('partials.footer')
	  </div>
	</div>
	<script src="{{asset('libs/jquery/jquery-3.7.0.min.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/scripts.js')}}"></script>
	<script src="{{asset('js/salary.js')}}"></script>
	@yield('script')
  </body>
</html>