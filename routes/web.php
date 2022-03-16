<?php

use App\Http\Controllers\Admin\SolvedTaskController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Student\IndexController;
use App\Models\Admin\SolvedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('student', [CustomAuthController::class , 'student'])->middleware('auth')->name('student');

Route::get('index' , [StudentLoginController::class , 'StudentLogin'])->name('student.login');

Route::post('index' , [StudentLoginController::class , 'StudentAccess'])->name('student-access');

Route::get('student/Profile/{Profile}' , [IndexController::class , 'Profile'])->name('StudentProfileInfo');
Route::get('student/attendance' , [IndexController::class , 'Attendance'])->name('StudentAttendance');
Route::get('student/material' , [IndexController::class , 'Material'])->name('StudentMaterial');
Route::get('student/topics' , [IndexController::class , 'TopicsTasks'])->name('StudentTopicsTasks');
Route::get('student/TopicTaskDetails/{TopicTaskDetails}' , [IndexController::class , 'TopicTaskDetails'])->name('StudentTopicTaskDetails');
// Route::get('student/tasks' , [IndexController::class , 'ViewTasks'])->name('StudentViewTasks');
Route::get('student/TaskDetails/{TaskDetails}' , [IndexController::class , 'TaskDetails'])->name('TaskDetails');
Route::post('student/TaskSubmisson' , [IndexController::class , 'TaskSubmisson'])->name('TaskSubmisson');
Route::get('student/ViewTaskFeedback/{ViewTaskFeedback}' , [IndexController::class , 'ViewTaskFeedback'])->name('ViewTaskFeedback');
Route::put('student/ResubmitNewTask/{ResubmitNewTask}' , [IndexController::class , 'ResubmitNewTask'])->name('ResubmitNewTask');

Route::get('/', function () {
    return view('auth.login');
});
// Route::any('/register', function(){
//     return redirect('/');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
