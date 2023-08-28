<aside id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">HRMS</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('super.dashboard') : 
        ( Auth::user()->role->slug === 'administrator' ? route('admin.dashboard')  : 
        ( Auth::user()->role->slug === 'moderator' ? route('moderator.dashboard')  : 
        ( Auth::user()->role->slug === 'hr' ? route('hr.dashboard')  : route('payroll.dashboard')))) }}">
          <i class="align-middle" data-feather="sliders"></i>
          <span class="align-middle">{{ __('Dashboard') }}</span>
        </a>
      </li>
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator'))
        <li class="sidebar-header">{{ __('Users Management') }}</li>
      {{-- @endif
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('user.index') : route('admin.users.index') }}">
          <i class="fas fa-user align-middle"></i>
          <span class="align-middle">{{ __('Manage Users') }}</span>
        </a>
        </li>
      @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin'))
       <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('roles.index') }}">
            <i class="fas fa-user-shield align-middle"></i> <span class="align-middle">{{ __('User Settings') }}</span>
          </a>
        </li> 
      @endif
        
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager'))
        <li class="sidebar-header">{{ __('Employee Management') }}</li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.index') : route('hr.employee.index') ) }}">
          <i class="fa-solid fa-users-viewfinder"></i>
          <span class="align-middle">{{ __('Manage Employees') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('department.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.department.index') : route('hr.department.index') ) }}">
          <i class="fa-solid fa-users-gear"></i>
          <span class="align-middle">{{ __('Manage Departments') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.index') : route('hr.designation.index') ) }}">
          <i class="fa-solid fa-file-lines"></i>
          <span class="align-middle">{{ __('Manage Designations') }}</span>
        </a>
        </li>
      @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator'))
        <li class="sidebar-header">{{ __('Attendance') }}</li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.index') : route('moderator.schedule.index') ) }}">
          <i class="fa-solid fa-clock"></i>
          <span class="align-middle">{{ __('Schedule') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('attendance.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.attendance.index') : route('moderator.attendance.index') ) }}">
          <i class="fa-solid fa-calendar-days"></i>
          <span class="align-middle">{{ __('Daily Attendance') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('sheet.report') : (Auth::user()->role->slug === 'administrator' ? route('admin.sheet.report') : route('moderator.sheet.report') ) }}">
          <i class="fa-solid fa-book"></i>
          <span class="align-middle">{{ __('Sheet Report') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('late.time') }}">
          <i class="fa-solid fa-triangle-exclamation"></i>
          <span class="align-middle">{{ __('Late Time') }}</span>
        </a>
        </li> --}}
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('over.time') }}">
          <i class="fa-solid fa-stopwatch"></i>
          <span class="align-middle">{{ __('Over Time') }}</span>
        </a>
        </li> --}}
      @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager'))
        <li class="sidebar-header">{{ __('Leave Management') }}</li>  
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.leaves.index') : route('hr.leaves.index') ) }}">
          <i class="fa-solid fa-person-walking-arrow-right"></i>
          <span class="align-middle">{{ __('Manage Leaves') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.leaves.create') : route('hr.leaves.create') ) }}">
          <i class="fa-solid fa-file-pen"></i>
          <span class="align-middle">{{ __('Registration') }}</span>
        </a>
        </li>
      @endif
          
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager'))
        <li class="sidebar-header">{{ __('Payroll System') }}</li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('payroll.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.payroll.index') : route('manager.payroll.index') ) }}">
          <i class="fa-solid fa-file"></i>
          <span class="align-middle">{{ __('Manage Payroll') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.create') }}">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Generate Payroll') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.report') }}">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Payroll Sheet') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          
          <i class="fa-solid fa-wallet"></i>
          <span class="align-middle">{{ __('Gross Salary') }}</span>
        </a>
        </li> --}}
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          <i class="fa-solid fa-clipboard"></i>
          <span class="align-middle">{{ __('Deductions') }}</span>
        </a>
        </li> --}}
      @endif
      
      
      {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Generate Payroll') }}</span>
        </a>
      </li> --}}
      
    </ul>
  </div>
</aside>