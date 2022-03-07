@extends('layouts.admin')
@section('title') - All Groups @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-baseline">
                    <h4 class="text-blue h4">Groups</h4>
                    <a class="btn btn-primary btn-wide ml-3 text-white" href="{{route("groups.create")}}">Add Group</a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Group's Name</th>
                                <th>Client</th>
                                <th>Diploma</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td class="table-plus">{{$group->group_name}}</td>
                                <td class="table-plus">{{$group->client->name}}</td>
                                <td class="table-plus">{{$group->diploma->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route("groups.show" , $group->id)}}"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="{{route("groups.edit" , $group->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="container text-center ms-auto mt-5">
                        {{ $groups->links() }}
                    </div>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection