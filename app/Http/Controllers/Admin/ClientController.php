<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::cursorPaginate(5);
        return view('admin.clients.AllClient' , compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $diplomas = Diploma::all();
        // $last = Client::latest()->first()->id;
        return view('admin.clients.AddClient' , compact('diplomas'));
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
            'email' => ['required'],
            'password' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->save();
        return redirect()->back()->with(['success' => 'New Client was added']);
    }


    public function StoreClientDiploma(Request $request) {
        // $validator = Validator::make($request->all() , [
        //     'diploma_id' => ['required'],
        //     'client_id' => ['required'],
        // ]);
        // if($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }

        $client = new ClientDiplomas();
        $client->diploma_id = $request->input('diploma_id');
        // $client->client_id = $request->input('client_id');
        $client->client_id = $last = Client::latest()->first()->id;
        $client->save();
        return redirect()->back()->with(['success' => 'New Client was added']);
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
        $clientDiplomas = ClientDiplomas::all();
        $diplomas = Diploma::all();
        $groups = Group::all();
        $client = Client::findOrFail($id);
        return view('admin.clients.ClientDetails' , compact('client' , 'clientDiplomas' , 'diplomas' ,'groups'));
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
        $client = Client::findOrFail($id);
        $diplomas = Diploma::all();
        return view('admin.clients.EditClient' , compact('client' , 'diplomas'));
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

    public function AssignNewDiploma(Request $request)
    {
        $client = new ClientDiplomas();
        $client->diploma_id = $request->input('diploma_id');
        $client->client_id = $request->input('client_id');
        $client->save();
        return redirect()->back()->with(['success' => 'New Diploma was assignes']);
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
