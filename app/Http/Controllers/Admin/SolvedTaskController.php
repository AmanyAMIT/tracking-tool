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
        $solvedTasks = SolvedTask::cursorPaginate(5);
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
        return redirect()->back()->with(['success' => 'Task was submitted']);
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
        // $validator = Validator::make($request->all() , [
        //     'status' => ['required'],
        //     'comment' => ['required']
        // ]);
        // if($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }
        $solvedTask = SolvedTask::findOrFail($id);
        $solvedTask->status = $request->input('status');
        $solvedTask->comments = $request->input('comments');
        $solvedTask->update();
        return redirect()->back()->with(['success' => 'Feedback was sent']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
