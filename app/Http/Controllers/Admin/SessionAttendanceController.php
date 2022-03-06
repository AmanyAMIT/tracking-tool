<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SessionAttendance;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

class SessionAttendanceController extends Controller
{
    //
    public function store(Request $request)
    {
    foreach($request->SessionAttendance as $key=>$SessionAttendance) {
        $data = new SessionAttendance();
        $data->session_id = $SessionAttendance;
        $data->student_id = $request->student_id[$key];
        if(isset($request->status[$key]) == "is_checked"){
            $data->status = "1";
        }elseif(isset($request->status[$key]) == "is_unchecked") {
            $data->status = "0";
        }
        $data->save();
    }
    return redirect()->back()->with(['toast_success' => 'Session Attendance was updated']);
    }

}
