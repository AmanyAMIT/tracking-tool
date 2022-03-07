<?php

use App\Http\Controllers\Admin\SolvedTaskController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Models\Admin\SolvedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('student', [CustomAuthController::class , 'student'])->middleware('auth')->name('student');

Route::get('index' , [StudentLoginController::class , 'StudentLogin'])->name('student.login');

Route::post('index' , [StudentLoginController::class , 'StudentAccess'])->name('student-access');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
