<?php

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('tracker', [CustomAuthController::class , 'tracker'])->middleware('auth:client')->name('tracker');

Route::get('client/EditProfile/{EditProfile}' , [ClientController::class , 'EditProfile'])->name('EditProfile');
Route::put('client/UpdateProfile/{UpdateProfile}' , [ClientController::class , 'UpdateProfile'])->name('UpdateProfile');

Route::get("client/search", [ClientController::class , 'Search'])->name('search');
Route::get("client/students", [ClientController::class , 'StudentSearch'])->name('StudentSearch');
Route::get("client/groups", [ClientController::class , 'GroupSearch'])->name('GroupSearch');

Route::get('client/login' , [ClientLoginController::class , 'ClientLogin'])->name('client.login');

Route::post('client/login' , [ClientLoginController::class , 'ClientAccess'])->name('client-access');

// Routes for Diplomas and its Details
Route::get('client/ShowDiplomas' , [ClientController::class , 'ShowDiplomas'])->name('ShowDiplomas');
Route::get('client/ShowDiplomaDetails/{ShowDiplomaDetails}' , [ClientController::class , 'ShowDiplomaDetails'])->name('ShowDiplomaDetails');
// Show Tasks' Details
Route::get('client/taskcategories{taskcategories}' , [ClientController::class , 'ShowTaskCategories'])->name('taskcategories');

// Routes for Groups and its Details
Route::get('client/ShowGroups' , [ClientController::class , 'ShowGroups'])->name('ShowGroups');
Route::get('client/ShowGroupDetails/{ShowGroupDetails}' , [ClientController::class , 'ShowGroupDetails'])->name('ShowGroupDetails');

// Routes for Students and its Details
Route::get('client/ShowStudents' , [ClientController::class , 'ShowStudents'])->name('ShowStudents');
Route::get('client/ShowStudentDetails/{ShowStudentDetails}' , [ClientController::class , 'ShowStudentDetails'])->name('ShowStudentDetails');

// Routes for Tasks and its Details
Route::get('client/ShowTasks' , [ClientController::class , 'ShowTasks'])->name('ShowTasks');
Route::get('client/ShowTaskDetails/{ShowTaskDetails}' , [ClientController::class , 'ShowTaskDetails'])->name('ShowTaskDetails');

Auth::routes();
