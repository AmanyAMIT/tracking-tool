<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [CustomAuthController::class , 'dashboard'])->middleware('auth:admin')->name('dashboard');

Route::get('admin/login' , [AdminLoginController::class , 'AdminLogin'])->name('admin.login');

Route::post('admin/login' , [AdminLoginController::class , 'AdminAccess'])->name('admin-access');

Auth::routes();
