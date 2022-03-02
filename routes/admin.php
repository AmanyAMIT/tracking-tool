<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ClientDiplomasController;
use App\Http\Controllers\Admin\DiplomaController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\RoundController;
use App\Http\Controllers\Admin\SessionAttendanceController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\SolvedTaskController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TaskCategoryController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\SessionAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [CustomAuthController::class , 'dashboard'])->middleware('auth:admin')->name('dashboard');

Route::get('admin' , [AdminLoginController::class , 'AdminLogin'])->name('admin.login');

Route::post('admin' , [AdminLoginController::class , 'AdminAccess'])->name('admin-access');
Route::resource('/diplomas' , DiplomaController::class);
Route::resource('/clients' , ClientController::class);
Route::resource('/students' , StudentController::class);
Route::resource('/clientsDiplomas' , ClientDiplomas::class);
Route::resource('/groups' , GroupController::class);
Route::resource('/rounds' , RoundController::class);
Route::resource('/taskcategories' , TaskCategoryController::class);
Route::resource('/tasks' , TaskController::class);
Route::resource('/solvedTasks' , SolvedTaskController::class);
Route::resource('/materials' , MaterialController::class);
Route::get('/clinetDiplomad' , [ClientDiplomasController::class , 'create'])->name('StoreClientDiploma');
Route::post('/assignNewDiploma' , [ClientDiplomasController::class , 'store'])->name('AssignNewDiploma');
Route::resource('/sessions' , SessionController::class);
Route::post('/updateAttendance' , [SessionAttendanceController::class , 'store'])->name('updateAttendance');
Auth::routes();
