@extends('layouts.client')
@section('title') - All Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Tasks</h4>
                </div>
                <div class="pb-20">
                    <table class="table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Task's Name</th>
                                <th class="table-plus datatable-nosort">Topic</th>
                                <th class="table-plus datatable-nosort">Marks</th>
                                <th class="table-plus datatable-nosort">Description</th>
                                <th class="table-plus datatable-nosort">Requirements</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            @if ($task->client_id == Auth::guard('client')->user()->id)
                                <tr>
                                <td class="table-plus">{{$task->name}}</td>
                                <td>{{$task->task_category->name}}</td>
                                <td>{{$task->marks}}</td>
                                <td>{{$task->descriptions}}</td>
                                <td>{{$task->requirements}}</td>
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