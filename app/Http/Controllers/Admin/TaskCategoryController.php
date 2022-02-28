<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TaskCategory;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = TaskCategory::cursorPaginate(5);
        return view('admin.tasksCategories.AllCategories' , compact('categories'));
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
        return view('admin.tasksCategories.AddCategory' , compact('diplomas'));
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
            'diploma_id' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $taskcategories = new TaskCategory();
        $taskcategories->name = $request->input('name');
        $taskcategories->diploma_id = $request->input('diploma_id');
        $taskcategories->save();
        return redirect()->route("taskcategories.index")->with(['toast_success' => 'New Category was added']);
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
        $diplomas = Diploma::all();
        $category = TaskCategory::findOrFail($id);
        return view('admin.tasksCategories.EditTaskCategory' , compact('category' , 'diplomas'));
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
            'diploma_id' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $category = TaskCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->diploma_id = $request->input('diploma_id');
        $category->save();
        return redirect()->route("taskcategories.index")->with(['toast_success' => 'New Category was added']);
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
        $taskcategory = TaskCategory::findOrFail($id);
        $taskcategory->delete();
        return redirect()->route("taskcategories.index")->with(['toast_success' => 'Category has been deleted']);
    }
}
