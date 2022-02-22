<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Task;
use App\Models\Admin\TaskCategory;
use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::cursorPaginate(5);
        $categories = TaskCategory::all();
        $diplomas = Diploma::all();
        $clients = Client::all();
        return view("admin.tasks.AllTasks" , 
        compact("tasks" , "categories" , 'diplomas' , 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = TaskCategory::all();
        $diplomas = Diploma::all();
        $clients = Client::all();
        return view("admin.tasks.AddTask" , compact("categories" , 'diplomas' , 'clients'));
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
            'descriptions' => ['required'],
            'requirements' => ['required'],
            'marks' => ['required'],
            'task_category_id' => ['required'],
            'diploma_id' => ['required'],
            'client_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $task = new Task();
        $task->name = $request->input('name');
        $task->descriptions = $request->input('descriptions');
        $task->requirements = $request->input('requirements');
        $task->marks = $request->input('marks');
        $task->task_category_id = $request->input('task_category_id');
        $task->diploma_id = $request->input('diploma_id');
        $task->client_id = $request->input('client_id');
        $task->save();
        return redirect()->back()->with(['success' => 'New Task was added']);
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
