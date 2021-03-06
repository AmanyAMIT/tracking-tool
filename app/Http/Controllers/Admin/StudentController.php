<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Group;
use App\Models\Admin\SessionAttendance;
use App\Models\Admin\SolvedTask;
use App\Models\Admin\Task;
use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::cursorPaginate(10);
        return view('admin.students.AllStudent' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::all();
        $diplomas = Diploma::all();
        $groups = Group::all();
        $tasks = Task::all();
        return view('admin.students.AddStudent', compact('clients', 'diplomas' , 'groups' , 'tasks'));
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
            'name' => ['required' , 'min:2'],
            'email' => ['required' , 'email' , 'unique:users,email'],
            'password' => ['required' , 'min:6'],
            'client_id' => ['required'],
            'diploma_id' => ['required'],
            'group_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));
        $student->group_id = $request->input('group_id');
        $student->diploma_id = $request->input('diploma_id');
        $student->client_id = $request->input('client_id');
        $student->save();
        return redirect()->route("students.index")->with(['toast_success' => 'New Student was added']);
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
        $student = User::findOrFail($id);
        $tasks = Task::cursorPaginate(5);
        $solvedTasks = SolvedTask::paginate(5);
        $SessionAttendances = SessionAttendance::paginate(5);
        return view('admin.students.StudentProfile' , compact('student' , 'tasks' , 'solvedTasks' , 'SessionAttendances'));
    }
    public function ShowStudentSubmission($id)
    {
        $solvedTask = SolvedTask::findOrFail($id);
        return view('admin.students.ShowStudentSubmission' , compact('solvedTask'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = User::findOrFail($id);
        return view('admin.students.StudentProfile' , compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //      
        $validator = Validator::make($request->all() , [
            'name' => ['min:2'],
            'email' => ['email']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $student = User::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->update();
        return redirect()->route("students.index")->with(['toast_success' => 'Student was updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['toast_success' => 'User has been deleted']);
    }
}
