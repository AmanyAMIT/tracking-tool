@extends('layouts.admin')
@section('title') - Add Student @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Student</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Student's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('students.store')}}">	
                        @csrf
                        <h5>General Details</h5>
                        <section>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Student's Name :</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Email :</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Password :</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Client :</label>
                                        <select class="custom-select form-control @error('client_id') is-invalid @enderror" name="client_id">
                                            @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
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
                                        @error('diploma_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    @foreach ($diplomas as $diploma)
                                        <option value="{{$diploma->id}}">{{$diploma->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Group :</label>
                                        <select class="custom-select form-control @error('group_id') is-invalid @enderror" name="group_id">
                                            @error('group_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->group_name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                        </section>
                        <input type="submit" value="Add Student" class="btn btn-primary btn-wide mt-5 ml-3">
                    </form>
                    <div class="row">
                        @include('sweetalert::alert')
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection