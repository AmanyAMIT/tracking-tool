@extends('layouts.client')
@section('title') - Diploma Details @endsection
@section('content')
@foreach ($client_diplomas as $client_diploma)
    @if ($client_diploma->client_id == Auth::guard('client')->user()->id)
            @if ($client_diploma->diploma_id == $diploma->id)
            <div class="main-container">
                <div class="pd-ltr-20 xs-pd-20-10">
                    <div class="min-height-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="title">
                                        <h4>{{$diploma->name}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-wrap">
                            <div class="container pd-0">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="blog-detail card-box overflow-hidden mb-30">
                                            <div class="blog-img">
                                                <img src="vendors/images/img2.jpg" alt="">
                                            </div>
                                            <div class="blog-caption">
                                                <h4 class="mb-10">Description</h4>
                                                <p>{{$diploma->description}}</p>
                                                <h5 class="mb-10">Number of Hours</h5>
                                                <p>{{$diploma->hours}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card-box mb-30">
                                            <h5 class="pd-20 h5 mb-0">Topics of This Diploma</h5>
                                            <div class="list-group">
                                                @foreach ($task_categories as $task_category)
                                                    @if ($task_category->diploma_id == $diploma->id)
                                                        <a href="{{route('taskcategories' , $task_category->id)}}" class="list-group-item d-flex align-items-center justify-content-between">{{$task_category->name}}</a>
                                                    @endif
                                                    
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
@endforeach
@endsection

