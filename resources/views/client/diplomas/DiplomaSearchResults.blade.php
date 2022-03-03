@extends('layouts.client')
@section('title') - All Diplomas @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Diplomas</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Diploam's Name</th>
                                <th class="table-plus datatable-nosort">Number of Hours</th>
                                <th class="table-plus datatable-nosort">Description</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client_diplomas as $client_diploma)
                            @if ($client_diploma->client_id == Auth::guard('client')->user()->id)
                                @foreach ($diplomas as $diploma)
                                    @if ($client_diploma->diploma_id == $diploma->id)
                                <tr>
                                <td class="table-plus">{{$diploma->name}}</td>
                                <td>{{$diploma->description}}</td>
                                <td>{{$diploma->hours}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route("ShowDiplomaDetails" , $diploma->id)}}"><i class="dw dw-eye"></i> View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
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