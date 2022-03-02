@extends('layouts.client')
@section('title') - All Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-baseline">
                    <h4 class="text-blue h4">Tasks</h4>
                </div>
                <div class="pb-20">
                    <table class="table hover nowrap">
                        <thead>
                            <tr>
                                <th>Task's Name</th>
                                <th>Marks</th>
                                <th>Descriptions</th>
                                <th>Requirements</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            @if ($task->task_category_id == $task_category->id)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{{$task->marks}}</td>
                                <td>{{$task->descriptions}}</td>
                                <td>{{$task->requirements}}</td>
                            </tr>
                            @endif
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