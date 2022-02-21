<?php

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\ClientLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('tracker', [CustomAuthController::class , 'tracker'])->middleware('auth:client')->name('tracker');

Route::get('client/login' , [ClientLoginController::class , 'ClientLogin'])->name('client.login');

Route::post('client/login' , [ClientLoginController::class , 'ClientAccess'])->name('client-access');

Auth::routes();
