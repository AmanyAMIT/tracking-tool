@extends('layouts.admin')
@section('title') - Add Client @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Client</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Client's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('clients.store')}}" name="form1">	
                        @csrf
                        <h5 class="my-3">General Details</h5>
                        <section class="text-right">
                            <div class="row">
                                
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label >Client's Name :</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label >Email :</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror " name="email" onclick="ValidateEmail()" id="email">
                                        <p id="err" class="text-danger font-14 font-weight-bolder"></p>
                                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
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
                            </div>
                            <input type="submit" value="Add Client" class="btn btn-primary btn-wide mt-5 ml-3">
                        </section>
                        <div class="row">
                            @include('sweetalert::alert')
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection