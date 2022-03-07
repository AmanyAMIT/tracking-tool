<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class StudentLoginController extends Controller
{
    //
    public function StudentLogin() {
        return view('auth.Login');
    }

    public function StudentAccess(Request $request)
    {
        
        if(Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
                return redirect()->intended('/student');
        }

        return back()->withInput($request->only('email'));
    }
}
