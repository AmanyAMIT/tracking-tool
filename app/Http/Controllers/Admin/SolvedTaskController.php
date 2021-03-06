<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SolvedTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SolvedTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solvedTasks = SolvedTask::cursorPaginate(10);
        return view('admin.tasks.SolvedTasks' , compact('solvedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.tasks.SubmitTask');
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
            'user_id' => ['required'],
            'task_id' => ['required'],
            'task_file' => ['required'],
            'status' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $solvedTask = new SolvedTask();
        $solvedTask->user_id = Auth::user()->id;
        $solvedTask->task_id = $request->input('descriptions');
        $solvedTask->task_file = $request->input('requirements');
        $solvedTask->status = '0';
        $solvedTask->comments = 'No comment';
        $solvedTask->save();
        return redirect()->route('solvedTasks.index')->with(['toast_success' => 'Task was submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solvedTask = SolvedTask::findOrFail($id);
        return view('admin.tasks.SolvedTaskDetails' , compact('solvedTask'));
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
        $solvedTask = SolvedTask::findOrFail($id);
        return view('admin.tasks.SolvedTaskDetails' , compact('solvedTask'));
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
            'status' => ['required'],
            'comments' => ['required'],
            'score' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $solvedTask = SolvedTask::findOrFail($id);
        $solvedTask->status = $request->input('status');
        $solvedTask->comments = $request->input('comments');
        $solvedTask->score = $request->input('score');
        $solvedTask->update();
        return redirect()->route('solvedTasks.index')->with(['toast_success' => 'Feedback was sent']);
    }

    public function SolvedTaskSearch(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->input('search');
        $solvedTasks = SolvedTask::join('diplomas' , 'diplomas.id' , '=' , 'solved_tasks.diploma_id')->where('diplomas.name','LIKE','%' . $search . '%')->get();
        return view('admin.tasks.SolvedTasksSearchResults' , compact('solvedTasks'));
    }
}
