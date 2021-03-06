@extends('layouts.admin')
@section('title') - Client Information @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4 class="text-capitalize text-bold text-primary font-30">{{ $client->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="container pd-0">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card-box overflow-hidden">
                                <h5 class="pd-20 h5 mb-0">General Information</h5>
                                <div class="list-group">
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Email:
                                        {{ $client->email }}</a>
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Created_at:
                                        {{ $client->created_at }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card-box overflow-hidden">
                                <h5 class="pd-20 h5 mb-0">Assigned Diplomas</h5>
                                <div class="list-group">
                                    @foreach($clientDiplomas as $clientDiploma)
                                        @if($clientDiploma->client_id == $client->id)
                                            @foreach($diplomas as $diploma)
                                            @if ($clientDiploma->diploma_id == $diploma->id)
                                            <a class="list-group-item d-flex align-items-center justify-content-between py-4">{{ $diploma->name }}</a>
                                            @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Groups</h4>
                        </div>
                        <div class="pb-20">
                            <table class="table hover nowrap">
                                <thead>
                                    <tr>
                                        <th>Group's Name</th>
                                        <th>Diploma</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                    @if ($group->client_id == $client->id)
                                    <tr>
                                            <td>{{$group->group_name}}</td>
                                        @if ($group->diploma->name)
                                            <td>{{$group->diploma->name}}</td>
                                        @endif
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
