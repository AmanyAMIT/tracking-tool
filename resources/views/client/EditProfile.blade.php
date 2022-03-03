@extends('layouts.client')
@section('title')
    - Your Profile
@endsection
@section('content')
@if (Auth::guard('client')->user()->id == $client->id)
        <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Your Profile</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <img src="{{ URL::asset('ClientPanel/src/images/product-img4.jpg') }}" alt=""
                                    class="avatar-photo">
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-footer">
                                                <input type="submit" value="Update" class="btn btn-primary">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center h5 mb-2">{{ $client->name }}</h5>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Personal Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        {{ $client->email }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#setting"
                                                role="tab">Settings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Setting Tab start -->
                                        <div class="height-100-p">
                                            <div class="profile-setting">
                                                <form method="POST" action="{{ route('UpdateProfile', $client->id) }}">
                                                    {{ method_field('PUT') }}
                                                    @csrf
                                                    
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-6">
                                                            <h4 class="text-blue h5 mb-20">Your Name</h4>
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="name" value="{{ $client->name }}">
                                                            </div>
                                                        </li>
                                                        <li class="weight-500 col-md-6">

                                                            <div class="form-group mt-5">
                                                                <label>Email</label>
                                                                <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" type="email"
                                                                    name="email" value="{{ $client->email }}" id="email">
                                                                    <p class="text-danger font-14 font-weight-bolder" id="err"></p>
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                        @enderror
                                                            </div>
                                                        </li>
                                                        <li class="weight-500 col-md-6">

                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" type="password">
                                                                    <p class="text-danger font-14 font-weight-bolder"></p>
                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                        @enderror
                                                            </div>
                                                        </li>
                                                                <div class="form-group mb-0 ml-3 col-md-6">
                                                                    <input type="submit" class="btn btn-primary"
                                                                        value="Update Information">
                                                            </div>
                                                    </ul>
                                                </form>
                                                <div class="row">
                                                    @include('sweetalert::alert')
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endif

@endsection
