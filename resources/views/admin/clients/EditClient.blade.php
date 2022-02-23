@extends('layouts.admin')
@section('title') - Assign New Diploma @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Assign New Diploma</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Choose Diploma</h4>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('AssignNewDiploma')}}">	
                        @csrf
                        <h5 class="my-3">Assign to Diploma</h5>
                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <section class="text-right">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label>Diploma</label>
                                        <select class="form-control" name="diploma_id">
                                            @foreach($diplomas as $diploma)
                                                <option value="{{ $diploma->id }}">{{ $diploma->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Assign New Diploma" class="btn btn-primary btn-wide mt-5 ml-3">
                        </section>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection