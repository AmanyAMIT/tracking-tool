<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SessionAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionAttendanceController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all() , [
            'session_id' => ['required'],
            'student_id' => ['required'],
            'status' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };
        // $check = empty($request->input('status')) ?  0 :  1;

        // $status[] = [
        //     'session_id' => $request->input('session_id'),
        //     'student_id' => $request->input('student_id'),
        //     'status' => $check
        // ];
        // $$status = new SessionAttendance();
        // $$status->session_id = $request->input('session_id');
        // $$status->student_id = $request->input('student_id');
        // $status = [
        //     $status->status => $request->input('status')
        // ];

        // $$status->save();
        // SessionAttendance::insert($status);
        // $session_id =  $request->input('session_id');
        $data = [
            ['student_id'=>'1', 
            'status'=> 1 , 
            'session_id' => 2],
        ];
        SessionAttendance::insert($data);
        return redirect()->back()->with(['toast_success' => 'Session Attendance was updated']);
    }

}
