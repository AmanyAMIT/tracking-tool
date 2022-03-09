<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Material;
use App\Models\Admin\SessionAttendance;
use App\Models\Admin\SolvedTask;
use App\Models\Admin\Task;
use App\Models\Admin\TaskCategory;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\Table\Table;

class IndexController extends Controller
{
    public function Profile($id){
        $student = User::findOrFail($id);
        $attendances = SessionAttendance::all();
        $solved_tasks = SolvedTask::all();
        return view('student.Profile' , compact('student' , 'attendances' , 'solved_tasks'));
    }
    public function Attendance() {
        $attendances = SessionAttendance::all();
        return view('student.sessions.Attendance' , compact('attendances'));
    }
    public function Material() {
        $materials = Material::all();
        $diplomas = Diploma::all();
        return view('student.materials.Material' , compact('materials' , 'diplomas'));
    }
    public function TopicsTasks() {
        $topics = TaskCategory::all();
        return view('student.tasks.TopicsTasks' , compact('topics'));
    }
    public function TopicTaskDetails($id) {
        $topic = TaskCategory::findOrFail($id);
        $tasks = Task::all();
        return view('student.tasks.ViewTopicsTask' , compact('topic' , 'tasks'));
    }
    public function TaskDetails($id) {
        $task = Task::findOrFail($id);
        $solvedTasks = SolvedTask::all();
        $pendingStatus = DB::table('solved_tasks')->where('status' , '0')->where('task_id' , $task->id)->where('user_id' , Auth::user()->id)->get();
        $passedStatus = DB::table('solved_tasks')->where('status' ,'!=', '0')->where('task_id' , $task->id)->where('user_id' , Auth::user()->id)->get();
        $TaskidExists = DB::table('solved_tasks')->where('task_id' , $task->id)->get();
        //return $TaskidExists;
        return view('student.tasks.TaskDetails' , compact('task'  , 'solvedTasks' , 'pendingStatus' , 'passedStatus' , 'TaskidExists'));
    }
    public function TaskSubmisson(Request $request) {
        $validator = Validator::make($request->all() , [
            'task_file' => ['required' , 'mimes:pdf,zip'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $solvedTask = new SolvedTask();
        $solvedTask->user_id = Auth::user()->id;
        $solvedTask->task_id = $request->input('task_id');
        $solvedTask->score = '0';
        if($request->hasFile('task_file')){
            $file = $request->file('task_file');
            $name= $file->getClientOriginalName();
            $filename = $name;
            $file->move('uploads/SolvedTasks/' , $filename);
            $solvedTask->task_file = $filename;
        }
        else{
            return $request;
            $solvedTask->task_file = '';
    }
        $solvedTask->status = '0';
        $solvedTask->comments = "No comments yet";
        $solvedTask->diploma_id = $request->input('diploma_id');
        $solvedTask->client_id = $request->input('client_id');
        $solvedTask->save();
        return redirect()->back()->with(['toast_success' => 'Task was submitted, Good luck']);
    }
    public function ViewTaskFeedback($id)
    {
        $solvedTask = SolvedTask::findOrFail($id);
        return view('student.tasks.ViewTaskFeedback' , compact('solvedTask'));
    }
    public function ResubmitNewTask(Request $request , $id)
    {
        $solvedTask = SolvedTask::findOrFail($id);
        $solvedTask->status = '3'; //which means re-submitted
        if($request->hasFile('task_file')){
            $file = $request->file('task_file');
            $name= $file->getClientOriginalName();
            $filename = $name;
            $file->move('uploads/SolvedTasks/' , $filename);
            $solvedTask->task_file = $filename;
        }
        else{
            return $request;
            $solvedTask->task_file = '';
    }
        $solvedTask->update();
        return redirect()->back()->with(['toast_success' => 'Task was re-submitted, Good luck']);
    }
}
