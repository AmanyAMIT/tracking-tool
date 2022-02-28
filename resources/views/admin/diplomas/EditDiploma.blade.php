@extends('layouts.admin')
@section('title') - Edit Diploma @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Update Diploma's Information</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill New Diploma's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('diplomas.update' , $diploma->id)}}">	
                        @csrf
                        {{method_field('PUT')}}
                        <h5>General Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Diploam Name :</label>
                                        <input type="text" class="form-control" name="name" value="{{$diploma->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Number of Hours :</label>
                                        <input type="number" class="form-control" name="hours" value="{{$diploma->hours}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Description :</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{$diploma->description}}"></textarea>
                                    </div>
                                </div>
                            </div>
                                <input type="submit" value="Update Diploma" class="btn btn-primary btn-wide mt-5">
                        </section>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection