<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Material;
use App\Models\Admin\TaskCategory;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materials = Material::cursorPaginate(10);
        return view('admin.materials.AllMaterials' , compact('materials'));
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
        $categories = TaskCategory::all();
        return view('admin.materials.AddMaterial' , compact('diplomas','categories'));
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
            'title' => ['required' , 'min:8'],
            'material_docs' => ['required' , 'mimes:pptx,docx,pdf'],
            'diploma_id' => ['required'],
            'category_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $material = new Material();
        $material->title = $request->input('title');
        $material->diploma_id = $request->input('diploma_id');
        $material->category_id = $request->input('category_id');
        if($request->hasFile('material_docs')){
            $file = $request->file('material_docs');
            $name= $file->getClientOriginalName();
            $filename = $name;
            $file->move('uploads/Materials/' , $filename);
            $material->material_docs = $filename;
        }
        else{
            return $request;
            $material->material_docs = '';
    }
    $material->save();
    return redirect()->route("materials.index")->with(['toast_success' => 'New Material was added']);
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
        $material = Material::findOrFail($id);
        $diplomas = Diploma::all();
        $categories = TaskCategory::all();
        return view('admin.materials.EditMaterial' , compact('material' , 'diplomas' , 'categories'));
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
            'title' => ['required' , 'min:8'],
            'material_docs' => ['required' , 'mimes:pptx,docx,pdf'],
            'diploma_id' => ['required'],
            'category_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $material = Material::findOrFail($id);
        $material->title = $request->input('title');
        $material->diploma_id = $request->input('diploma_id');
        $material->category_id = $request->input('category_id');
        if($request->hasFile('material_docs')){
            $file = $request->file('material_docs');
            $name= $file->getClientOriginalName();
            $filename = $name;
            $file->move('uploads/Materials/' , $filename);
            $material->material_docs = $filename;
        }
        else{
            return $request;
            $material->material_docs = '';
    }
    $material->update();
    return redirect()->route("materials.index")->with(['toast_success' => 'Material was updated']);
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
