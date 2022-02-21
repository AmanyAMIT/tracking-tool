<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class ClientLoginController extends Controller
{
    //
    public function ClientLogin() {
        return view('auth.client.clientLogin');
    }

    public function ClientAccess(Request $request)
    {
        
        if(Auth::guard('client')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
                return redirect()->intended('/tracker');
        }

        return back()->withInput($request->only('email'));
    }
}
