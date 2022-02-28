<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('client.tracker');
    }

    public function student() {
        return view('student.index');
    }
}
