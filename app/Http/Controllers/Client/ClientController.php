<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\SolvedTask;
use App\Models\Admin\Task;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class ClientController extends Controller
{
    // Methods for Diplomas and its Details
    public function ShowDiplomas()
    {
        $client_diplomas = ClientDiplomas::all();
        $diplomas = Diploma::cursorPaginate(4);
        return view('client.diplomas.ShowDiplomas' , compact('diplomas' , 'client_diplomas'));
    }

    public function ShowDiplomaDetails($id)
    {
        $client_diplomas = ClientDiplomas::all();
        $diploma = Diploma::findOrFail($id);
        return view('client.diplomas.ShowDiplomaDetails' , compact('diploma' , 'client_diplomas'));
    }


    // Methods for Groups and its Details
    public function ShowGroups()
    {
        $groups = Group::cursorPaginate(4);
        return view('client.groups.ShowGroups' , compact('groups'));
    }

    public function ShowGroupDetails($id)
    {
        $group = Group::findOrFail($id);
        $students = User::all();
        return view('client.groups.ShowGroupDetails' , compact('group' , 'students'));
    }


    // Methods for Students and its Details
    public function ShowStudents()
    {
        $students = User::cursorPaginate(4);
        return view('client.students.ShowStudents' , compact('students'));
    }

    public function ShowStudentDetails($id)
    {
        $student = User::findOrFail($id);
        $solved_tasks = SolvedTask::all();
        return view('client.students.ShowStudentDetails' , compact('student' , 'solved_tasks'));
    }


    // Methods for Tassk and its Details
    public function ShowTasks()
    {
        $tasks = Task::cursorPaginate(4);
        return view('client.tasks.ShowTasks' , compact('tasks'));
    }

    public function ShowTaskDetails($id)
    {
        $task = Task::findOrFail($id);
        $solved_tasks = SolvedTask::all();
        $solved_task_count = DB::table('solved_tasks')
        ->join('tasks' , 'tasks.id' , '=' , 'solved_tasks.task_id')
        ->count();
        return view('client.tasks.ShowTaskDetails' , compact('task' , 'solved_tasks' , 'solved_task_count'));
    }


}
