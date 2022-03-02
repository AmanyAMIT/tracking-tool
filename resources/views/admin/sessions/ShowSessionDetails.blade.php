@extends('layouts.admin')
@section('title') - Session Information @endsection
@section('content')


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row justify-content-end align-items-center">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4 class="text-capitalize text-bold text-primary font-30">{{ $session->name }} Session</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary btn-wide ml-3 text-white" href="{{route('sessions.edit' , $session->id)}}">Update Attendance</a>
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
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Date:
                                        {{ $session->date }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card-box overflow-hidden">
                                <h5 class="pd-20 h5 mb-0">Specific Information</h5>
                                <div class="list-group">
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Client:
                                        {{ $session->client->name }}</a>
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Diploma:
                                        {{ $session->diploma->name }}</a>
                                    <a class="list-group-item d-flex align-items-center justify-content-between py-4">Group:
                                        {{ $session->group->group_name }}</a>
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
                            <h4 class="text-blue h4">Students</h4>
                        </div>
                        <div class="pb-20">
                            <table class="table hover nowrap">
                                <thead>
                                    <tr>
                                        <th>Student's Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    @if ($student->group_id == $session->group_id AND $student->diploma_id == $session->diploma_id)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
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
