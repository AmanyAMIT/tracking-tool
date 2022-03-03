@extends('layouts.client')
@section('title') - All Students @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Students</h4>
                </div>
                <div class="pb-20">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 ml-3 mb-3">
                            <form action="{{route('StudentSearch')}}" method="GET" class="navbar-search__form">
                                    <div class="search"> <input type="text" name="search" class="search-input" placeholder="Search"> <button class="search-icon"> <i class="icon-copy dw dw-search"></i> </button> </div>
                                </form>
                        </div>
                    </div>
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">student's Name</th>
                                <th class="table-plus datatable-nosort">Email</th>
                                <th class="table-plus datatable-nosort">Diploam</th>
                                <th class="table-plus datatable-nosort">Group</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            @if ($student->client_id == Auth::guard('client')->user()->id)
                                <tr>
                                <td class="table-plus">{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->diploma->name}}</td>
                                <td>{{$student->group->group_name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route("ShowStudentDetails" , $student->id)}}"><i class="dw dw-eye"></i> View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

