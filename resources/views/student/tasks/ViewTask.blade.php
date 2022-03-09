@extends('layouts.student')
@section('title') - Topic's Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">All {{$topic->name}}'s Tasks</h4>
                </div>
                <div class="pb-20">
                    <div class="row clearfix mx-2">
                        @foreach ($tasks as $task)
                        @if ($task->diploma_id == $task->diploma->id AND $task->diploma->id == Auth::user()->diploma_id AND $task->task_category->id == $topic->id)
                            <div class="col-sm-12 col-md-4 mb-30">
                            <div class="card card-box">
                                <div class="card-header">
                                    {{$task->name}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Description</h5>
                                    <p class="card-text">{{$task->descriptions}}</p>
                                    <a href="{{route('TaskDetails' , $task->id)}}" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection