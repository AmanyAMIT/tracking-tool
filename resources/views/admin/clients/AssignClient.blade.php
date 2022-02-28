@extends('layouts.admin')
@section('title') - Assign Diploma @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Assign Client to Diploma</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('AssignNewDiploma')}}">	
                        @csrf
                        <h5 class="my-3">Choose Client and Diploma</h5>
                        <section class="text-right">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <select class="form-control @error('client_id') is-invalid @enderror" name="client_id">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label>Diploma</label>
                                        <select class="form-control @error('diploma_id') is-invalid @enderror" name="diploma_id">
                                            @foreach($diplomas as $diploma)
                                                <option value="{{ $diploma->id }}">{{ $diploma->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('diploma_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Assign Client" class="btn btn-primary btn-wide mt-5 ml-3">
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