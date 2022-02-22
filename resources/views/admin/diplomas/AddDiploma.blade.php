@extends('layouts.admin')
@section('title') - Add Diploma @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Diploma</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Fill Diploma's Details</h4>
                </div>
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('diplomas.store')}}">	
                        @csrf
                        <h5>General Details</h5>
                        <section>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Diploam Name :</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <input type="submit" value="Add Diploma" class="btn btn-primary btn-wide mt-5">
                                </div>
                                
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assign to a Client :</label>
                                        <select class="custom-select form-control" name="client_id">
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                        </select>
                                        <input type="submit" value="Add Diploma" class="btn btn-primary btn-wide mt-5">
                                </div> --}}
                                
                        </section>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection