<?php

use App\Http\Controllers\Admin\SolvedTaskController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Models\Admin\SolvedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/student', [CustomAuthController::class , 'student'])->middleware('auth')->name('student');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
