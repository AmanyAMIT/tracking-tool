<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diplomas = Diploma::cursorPaginate(5);
        return view('admin.diplomas.AllDiplomas' , compact('diplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::all();
        return view('admin.diplomas.AddDiploma' , compact('clients'));
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
            'description' => ['required'],
            'hours' => ['required']
            // 'client_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $diploma = new Diploma();
        $diploma->name = $request->input('name');
        $diploma->description = $request->input('description');
        $diploma->hours = $request->input('hours');
        // $diploma->client_id = $request->input('client_id');
        $diploma->save();
        return redirect()->route("diplomas.index")->with(['toast_success' => 'New Diploma was added']);
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
        $diploma = Diploma::findOrFail($id);
        return view("admin.diplomas.EditDiploma" , compact("diploma"));
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
        $validator = Validator::make($request->all() , [
            'name' => ['required'],
            'description' => ['required'],
            'hours' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $diploma = Diploma::findOrFail($id);
        $diploma->name = $request->input('name');
        $diploma->description = $request->input('description');
        $diploma->hours = $request->input('hours');
        // $diploma->client_id = $request->input('client_id');
        $diploma->update();
        return redirect()->route("diplomas.index")->with(['toast_success' => 'Diploma was updated']);
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
