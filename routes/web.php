<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
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
Route::middleware('auth')->prefix('admin')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/sample', [AdminController::class, 'sample'])->name('view.sample');
    Route::resource('employee', EmployeeController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('leave', LeaveController::class);
    // Route::resource('salary', SalaryController::class);
    Route::resource('payroll',PayrollController::class);
    Route::resource('roles',RoleController::class );
    Route::resource('user',UserController::class );
    Route::resource('attendance',AttendanceController::class );
    Route::resource('schedule',ScheduleController::class );
    Route::post('/check',[CheckController::class,'CheckStore'])->name('check.store');
    Route::get('/report',[CheckController::class,'sheetReport'])->name('sheet.report');
    Route::get('/gross-salary', [PayrollController::class, 'grossSalary'])->name('gross.salary');
    // Route::get('/report', [AttendanceController::class, 'report'])->name('attendance.report');

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
