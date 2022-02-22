<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Group;
use App\Models\Admin\Round;
use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = Group::all();
        $clients = Client::all();
        $diplomas = Diploma::all();
        return view('admin.groups.AddRound' , compact('groups' , 'clients' , 'diplomas'));
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
            'round_no' => ['required'],
            'group_id' => ['required'],
            'client_id' => ['required'],
            'diploma_id' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $round = new Round();
        $round->round_no = $request->input('round_no');
        $round->group_id = $request->input('group_id');
        $round->diploma_id = $request->input('diploma_id');
        $round->client_id = $request->input('client_id');
        $round->save();
        return redirect()->back()->with(['success' => 'New Round was added']);
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
