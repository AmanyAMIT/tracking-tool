@extends('layouts.client')
@section('title') - All Groups @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Groups</h4>
                </div>
                <div class="pb-20">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 ml-3 mb-3">
                            <form action="{{route('GroupSearch')}}" method="GET" class="navbar-search__form">
                                    <div class="search"> <input type="text" name="search" class="search-input" placeholder="Search"> <button class="search-icon"> <i class="icon-copy dw dw-search"></i> </button> </div>
                                </form>
                        </div>
                    </div>
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Group's Name</th>
                                <th class="table-plus datatable-nosort">Diploam</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                            @if ($group->client_id == Auth::guard('client')->user()->id)
                                <tr>
                                <td class="table-plus">{{$group->group_name}}</td>
                                <td>{{$group->diploma->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route("ShowGroupDetails" , $group->id)}}"><i class="dw dw-eye"></i> View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container text-center ms-auto mt-5">
                        {{ $groups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
