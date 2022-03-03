<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
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

    public function EditProfile($id){
        $client = Client::findOrFail($id);
        return view('client.EditProfile' , compact('client'));
    }
    public function UpdateProfile(Request $request , $id){
        $client = Client::findOrFail($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->update();
        return redirect()->route("tracker")->with(['success' => 'Profile was updated']);
    }

}
