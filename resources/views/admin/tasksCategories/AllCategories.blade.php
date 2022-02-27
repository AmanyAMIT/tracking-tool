@extends('layouts.admin')
@section('title') - All Categories @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Task Categories</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Category's Name</th>
                                <th>Diploma</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="table-plus">{{$category->name}}</td>
                                <td class="table-plus">{{$category->diploma->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('taskcategories.edit' , $category->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                            <form method="POST" action="{{route('taskcategories.destroy' , $category->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <label class="d-flex align-items-center justify-flex-end pl-3"><i class="dw dw-delete-3"></i> <input type="submit" class="dropdown-item pl-2" value="Delete">
                                                </label>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="container text-center ms-auto mt-5">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection