<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LateTimeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OverTimeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('layouts.admin');
// });
// Route::middleware('auth')->prefix('admin')->group( function () {
Route::middleware('superadmin')->prefix('super')->group( function () {

    Route::get('/', [AdminController::class, 'index'])->name('super.dashboard');
    Route::get('/sample', [AdminController::class, 'sample'])->name('view.sample');
    Route::resource('employee', EmployeeController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    // Route::resource('attendance', AttendanceController::class);
    Route::resource('leaves', LeaveController::class);
    // Route::resource('salary', SalaryController::class);
    Route::resource('allowance',AllowanceController::class);
    Route::resource('payroll',PayrollController::class);
    Route::resource('roles',RoleController::class );
    Route::resource('user',UserController::class );
    Route::resource('attendance',AttendanceController::class );
    Route::resource('schedule',ScheduleController::class );
    Route::post('/check',[CheckController::class,'CheckStore'])->name('check.store');
    Route::get('/report',[CheckController::class,'sheetReport'])->name('sheet.report');
    Route::get('/gross-salary', [PayrollController::class, 'grossSalary'])->name('gross.salary');
    Route::get('/latetime',[LateTimeController::class,'index'])->name('attendance.latetime');
    Route::post('/latetime',[LateTimeController::class,'lateTime'])->name('late.time');
    Route::get('/overtime',[OverTimeController::class,'index'])->name('attendance.overtime');
    Route::post('/overtime',[OverTimeController::class,'overTime'])->name('over.time');
    Route::get('/barcode', [AttendanceController::class, 'barcode'])->name('attd.barcode');
    // Route::get('/report', [AttendanceController::class, 'report'])->name('attendance.report');
    Route::resource('/leaves',LeaveController::class);
    // Route::post('/check/store', [PayrollController::class, ])->name('check.store');
    Route::post('/calculate', [PayrollController::class, 'calculatePayroll'])->name('calculate.payroll');


});
Route::middleware('admin')->prefix('admin')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('department')->group(function() {
        Route::get('/', [DepartmentController::class, 'index'])->name('admin.department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('admin.department.create');
        Route::post('/', [DepartmentController::class, 'create'])->name('admin.department.store');
        Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('admin.department.edit');
        Route::put('/{id}', [DepartmentController::class, 'update'])->name('admin.department.update');
        Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('admin.department.destroy');
    });
    Route::prefix('designation')->group(function() {
        Route::get('/', [DesignationController::class, 'index'])->name('admin.designation.index');
        Route::get('/create', [DesignationController::class, 'create'])->name('admin.designation.create');
        Route::post('/', [DesignationController::class, 'create'])->name('admin.designation.store');
        Route::get('/{id}/edit', [DesignationController::class, 'edit'])->name('admin.designation.edit');
        Route::put('/{id}', [DesignationController::class, 'update'])->name('admin.designation.update');
        Route::delete('/{id}', [DesignationController::class, 'destroy'])->name('admin.designation.destroy');
    });
    Route::prefix('employee')->group(function() {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
        Route::post('/', [EmployeeController::class, 'create'])->name('admin.employee.store');
        Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::put('/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');
    });
    Route::prefix('schedule')->group(function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('admin.schedule.index');
        Route::get('/create', [ScheduleController::class, 'create'])->name('admin.schedule.create');
        Route::post('/', [ScheduleController::class, 'create'])->name('admin.schedule.store');
        Route::get('/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedule.edit');
        Route::put('/{id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
        Route::delete('/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedule.destroy');
    });
    // Route::prefix('attendance')->group(function() {
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('admin.attendance.index');
        Route::post('/check', [CheckController::class, 'CheckStore'])->name('admin.check.store');
        Route::get('/report', [CheckController::class, 'sheetReport'])->name('admin.sheet.report');
    // });
    Route::prefix('leaves')->group(function() {
        Route::get('/', [LeaveController::class, 'index'])->name('admin.leaves.index');
        Route::get('/create', [LeaveController::class, 'create'])->name('admin.leaves.create');
        Route::post('/', [LeaveController::class, 'create'])->name('admin.leaves.store');
        Route::get('/{id}/edit', [LeaveController::class, 'edit'])->name('admin.leaves.edit');
        Route::put('/{id}', [LeaveController::class, 'update'])->name('admin.leaves.update');
        Route::delete('/{id}', [LeaveController::class, 'destroy'])->name('admin.leaves.destroy');
    });
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'create'])->name('admin.user.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
});

Route::middleware('moderator')->prefix('moderator')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('moderator.dashboard');
    Route::prefix('schedule')->group(function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('moderator.schedule.index');
        Route::get('/create', [ScheduleController::class, 'create'])->name('moderator.schedule.create');
        Route::post('/', [ScheduleController::class, 'create'])->name('moderator.schedule.store');
        Route::get('/{id}/edit', [ScheduleController::class, 'edit'])->name('moderator.schedule.edit');
        Route::put('/{id}', [ScheduleController::class, 'update'])->name('moderator.schedule.update');
        Route::delete('/{id}', [ScheduleController::class, 'destroy'])->name('moderator.schedule.destroy');
    });
    // Route::prefix('attendance')->group(function() {
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('moderator.attendance.index');
        Route::post('/check', [CheckController::class, 'CheckStore'])->name('moderator.check.store');
        Route::get('/report', [CheckController::class, 'sheetReport'])->name('moderator.sheet.report');
    // });
});

Route::middleware('hr')->prefix('hr-manager')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('hr.dashboard');
    Route::prefix('department')->group(function() {
        Route::get('/', [DepartmentController::class, 'index'])->name('hr.department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('hr.department.create');
        Route::post('/', [DepartmentController::class, 'create'])->name('hr.department.store');
        Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('hr.department.edit');
        Route::put('/{id}', [DepartmentController::class, 'update'])->name('hr.department.update');
        Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('hr.department.destroy');
    });
    Route::prefix('designation')->group(function() {
        Route::get('/', [DesignationController::class, 'index'])->name('hr.designation.index');
        Route::get('/create', [DesignationController::class, 'create'])->name('hr.designation.create');
        Route::post('/', [DesignationController::class, 'create'])->name('hr.designation.store');
        Route::get('/{id}/edit', [DesignationController::class, 'edit'])->name('hr.designation.edit');
        Route::put('/{id}', [DesignationController::class, 'update'])->name('hr.designation.update');
        Route::delete('/{id}', [DesignationController::class, 'destroy'])->name('hr.designation.destroy');
    });
    Route::prefix('employee')->group(function() {
        Route::get('/', [EmployeeController::class, 'index'])->name('hr.employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('hr.employee.create');
        Route::post('/', [EmployeeController::class, 'create'])->name('hr.employee.store');
        Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('hr.employee.edit');
        Route::put('/{id}', [EmployeeController::class, 'update'])->name('hr.employee.update');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('hr.employee.destroy');
    });
    Route::prefix('leaves')->group(function() {
        Route::get('/', [LeaveController::class, 'index'])->name('hr.leaves.index');
        Route::get('/create', [LeaveController::class, 'create'])->name('hr.leaves.create');
        Route::post('/', [LeaveController::class, 'create'])->name('hr.leaves.store');
        Route::get('/{id}/edit', [LeaveController::class, 'edit'])->name('hr.leaves.edit');
        Route::put('/{id}', [LeaveController::class, 'update'])->name('hr.leaves.update');
        Route::delete('/{id}', [LeaveController::class, 'destroy'])->name('hr.leaves.destroy');
    });
});

Route::middleware('payroll')->prefix('payroll-manager')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('payroll.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
