<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\Session;
use App\Models\Admin\SessionAttendance;
use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sessions = Session::cursorPaginate(10);
        return view('admin.sessions.AllSessions' , compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $diplomas = Diploma::all();
        $clients = Client::all();
        $groups = Group::all();
        return view('admin.sessions.AddSession' , compact('diplomas' , 'clients' , 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all() , [
            'name' => ['required'],
            'date' => ['required'],
            'client_id' => ['required'],
            'diploma_id' => ['required'],
            'group_id' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $session = new Session();
        $session->name = $request->input('name');
        $session->date = $request->input('date');
        $session->client_id = $request->input('client_id');
        $session->diploma_id = $request->input('diploma_id');
        $session->group_id = $request->input('group_id');
        // $session->student_id = DB::table('users')
        // ->join('groups', 'users.group_id', '=', 'groups.id')
        // ->select('users.id ');
        $session->save();
        return redirect()->route("sessions.index")->with(['toast_success' => 'New Session was created']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $session = Session::findOrFail($id);
        $students = User::all();
        return view('admin.sessions.ShowSessionDetails' , compact('session' , 'students'));
    }

    public function edit($id)
    {
        //
        $session = Session::findOrFail($id);
        $students = User::all();
        return view('admin.sessions.UpdateAttendance' , compact('session' , 'students'));
    }

    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        // $session->status = $request->input('status') == 'checked' ? '1' : '0';

        // if($request->input('status') == 'checked'){
        //     $session->status = '1';
        // }else{
        //     $session->status = '0';
        // };
        // $session->status = $request->input('status');
        // return $request;
//         $session_id = $request->input('session_id');
//         foreach($session_id as $k=>$id){
// $sessions[] = [
//             'student_id' => $request->input('student_id'),
//             'status' => $request->input('status'),
//         ];
//         }
        
//         $session->update();
return $request;

        return redirect()->back()->with(['toast_success' => 'New Session was created']);
    }

    public function destroy($id)
    {
        //
    }
}
