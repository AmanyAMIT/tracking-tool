@extends('layouts.student')
@section('title') - Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">All Topics</h4>
                </div>
                <div class="pb-20">
                    <div class="row clearfix mx-2">
                        @foreach ($topics as $topic)
                        @if ($topic->diploma_id == $topic->diploma->id AND $topic->diploma->id == Auth::user()->diploma_id)
                            <div class="col-sm-12 col-md-4 mb-30">
                            <div class="card card-box">
                                <div class="card-header">
                                    {{$topic->name}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Click on <u>More Details</u> to view all tasks related to this topic</p>
                                    <a href="{{route('StudentTopicTaskDetails' , $topic->id)}}" class="btn btn-primary">More Details <i class="ml-3 icon-copy dw dw-folder-146"></i></a>
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