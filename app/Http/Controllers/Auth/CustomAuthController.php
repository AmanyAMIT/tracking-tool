<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\Task;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    //
    public function dashboard() {
        $clients = DB::table('clients')->get()->count();
        $students = DB::table('users')->get()->count();
        $diplomas = DB::table('diplomas')->get()->count();
        $groups = DB::table('groups')->get()->count();
        return view('admin.dashboard' , compact("clients",
        "students",
        "diplomas",
        "groups"));
    }

    public function tracker() {
        $groups = Group::cursorPaginate(5);
        $client_diplomas = ClientDiplomas::cursorPaginate(5);
        $diplomas = Diploma::all();
        $students = User::cursorPaginate(5);
        $tasks = Task::paginate(5);
        return view('client.tracker' , compact('groups' , 'client_diplomas' , 'students' ,'tasks' , 'diplomas'));
    }

    public function student() {
        return view('student.index');
    }
}
