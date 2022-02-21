<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function tracker() {
        return view('client.tracker');
    }

    public function student() {
        return view('student.index');
    }
}
