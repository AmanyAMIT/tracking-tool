@extends('layouts.admin')
@section('title') - All Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-baseline">
                    <h4 class="text-blue h4">Tasks</h4>
                    <a class="btn btn-primary btn-wide ml-3 text-white" href="{{route("tasks.create")}}">Add Task</a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Task's Name</th>
                                <th>Marks</th>
                                <th>Descriptions</th>
                                <th>Requirements</th>
                                <th>Category</th>
                                <th>Diploma</th>
                                <th>Client</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td class="table-plus">{{$task->name}}</td>
                                <td class="table-plus">{{$task->marks}}</td>
                                <td class="table-plus">{{$task->descriptions}}</td>
                                <td class="table-plus">{{$task->requirements}}</td>
                                <td class="table-plus">{{$task->task_category->name}}</td>
                                <td class="table-plus">{{$task->diploma->name}}</td>
                                <td class="table-plus">{{$task->client->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('tasks.edit' , $task->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                            <form method="POST" action="{{route('tasks.destroy' , $task->id)}}">
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
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection