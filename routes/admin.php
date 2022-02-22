<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DiplomaController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\RoundController;
use App\Http\Controllers\Admin\TaskCategoryController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Models\Admin\ClientDiplomas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Psr\Http\Client\ClientInterface;

Route::get('dashboard', [CustomAuthController::class , 'dashboard'])->middleware('auth:admin')->name('dashboard');

Route::get('admin/login' , [AdminLoginController::class , 'AdminLogin'])->name('admin.login');

Route::post('admin/login' , [AdminLoginController::class , 'AdminAccess'])->name('admin-access');
Route::resource('/diplomas' , DiplomaController::class);
Route::resource('/clients' , ClientController::class);
Route::resource('/clientsDiplomas' , ClientDiplomas::class);
Route::resource('/groups' , GroupController::class);
Route::resource('/rounds' , RoundController::class);
Route::resource('/taskcategories' , TaskCategoryController::class);
Route::resource('/tasks' , TaskController::class);
Route::resource('/materials' , MaterialController::class);
Route::post('/clinetDiplomad' , [ClientController::class , 'StoreClientDiploma'])->name('StoreClientDiploma');
Auth::routes();
