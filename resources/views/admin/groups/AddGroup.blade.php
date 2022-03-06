@extends('layouts.admin')
@section('title') - Add Group @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Group</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Group's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('groups.store')}}">	
                        @csrf
                        <h5>General Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Group Name :</label>
                                        <input type="text" class="form-control @error('group_name') is-invalid @enderror" name="group_name">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to Client :</label>
                                        <select class="custom-select form-control @error('client_id') is-invalid @enderror" name="client_id">
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                        </select>
                                    
                                </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Diploma :</label>
                                        <select class="custom-select form-control @error('diploma_id') is-invalid @enderror" name="diploma_id">
                                        @foreach ($diplomas as $diploma)
                                            <option value="{{$diploma->id}}">{{$diploma->name}}</option>
                                        @endforeach
                                        </select>
                                    <input type="submit" value="Add Group" class="btn btn-primary btn-wide mt-5">
                                </div>
                                </div>
                            </div>
                                
                        </section>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection