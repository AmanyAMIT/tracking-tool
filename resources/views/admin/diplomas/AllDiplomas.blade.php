@extends('layouts.admin')
@section('title') - All Diplomas @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-baseline">
                    <h4 class="text-blue h4">Diplomas</h4>
                    <a class="btn btn-primary btn-wide ml-3 text-white" href="{{route("diplomas.create")}}">Add Diploma</a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Diploam's Name</th>
                                <th class="table-plus datatable-nosort">No of Hours</th>
                                <th class="table-plus datatable-nosort">Description</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diplomas as $diploma)
                            <tr>
                                <td class="table-plus">{{$diploma->name}}</td>
                                <td class="table-plus">{{$diploma->hours}}</td>
                                <td class="table-plus">{{$diploma->description}}</td>
                                {{-- <td class="table-plus">{{$diploma->client->name}}</td> --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('diplomas.edit' , $diploma->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="container text-center ms-auto mt-5">
                        {{ $diplomas->links() }}
                    </div>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection