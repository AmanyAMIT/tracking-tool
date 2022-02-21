<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class AdminLoginController extends Controller
{
    //
    public function AdminLogin() {
        return view('auth.admin.adminLogin');
    }

    public function AdminAccess(Request $request)
    {
        
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
                return redirect()->intended('/dashboard');
        }

        return back()->withInput($request->only('email'));
    }
}
