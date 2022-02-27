@extends('layouts.admin')
@section('title') - Add Category @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Task Category</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Category's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('taskcategories.update' , $category->id)}}">	
                        @csrf
                        {{method_field('PUT')}}
                        <h5>General Details</h5>
                        <section>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Task Category's Name :</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Diploma :</label>
                                        <select class="custom-select form-control" name="diploma_id">
                                        @foreach ($diplomas as $diploma)
                                            <option value="{{$diploma->id}}">{{$diploma->name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <input type="submit" value="Update Category" class="btn btn-primary btn-wide mt-5 ml-3">
                        </section>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection