@extends('layouts.admin')
@section('title') - Update Task @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Update Task</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill New Task's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('tasks.update' , $task->id)}}">	
                        @csrf
                        {{method_field('PUT')}}
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
                        </section>
                        <input type="submit" value="Update Task" class="btn btn-primary btn-wide mt-5 ml-3">
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection