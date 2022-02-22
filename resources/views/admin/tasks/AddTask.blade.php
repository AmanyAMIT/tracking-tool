@extends('layouts.admin')
@section('title') - Add Task @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Task</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Task's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('tasks.store')}}">	
                        @csrf
                        <h5>General Details</h5>
                        <section>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Task's Name :</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Marks :</label>
                                        <input type="text" class="form-control" name="marks">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Description :</label>
                                        <input type="text" class="form-control" name="descriptions">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Requirements :</label>
                                        <input type="text" class="form-control" name="requirements">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Category :</label>
                                        <select class="custom-select form-control" name="task_category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Client :</label>
                                        <select class="custom-select form-control" name="client_id">
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Client :</label>
                                        <select class="custom-select form-control" name="diploma_id">
                                        @foreach ($diplomas as $diploma)
                                            <option value="{{$diploma->id}}">{{$diploma->name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                        </section>
                        <input type="submit" value="Add Task" class="btn btn-primary btn-wide mt-5 ml-3">
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection