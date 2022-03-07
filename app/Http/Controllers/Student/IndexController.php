<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\SessionAttendance;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Attendance() {
        $attendance = SessionAttendance::all();
        return view('student.sessions.attendance' , compact('attendance'));
    }
}
