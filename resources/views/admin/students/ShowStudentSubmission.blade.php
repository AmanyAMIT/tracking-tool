@extends('layouts.admin')
@section('title') - Task's Feedback @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>{{$solvedTask->task->name}}'s Feedback</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-detail-wrap mb-30">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                @if ($solvedTask->status != 0 AND $solvedTask->status != 3)
                                    <h4 class="mb-20 pt-20">Score:</h4>
                                    <p>{{$solvedTask->score}} out of {{$solvedTask->task->marks}}</p>
                                    <h4 class="mb-20 pt-20">Feedback:</h4>
                                    <p>{{$solvedTask->comments}}</p>
                                @elseif ($solvedTask->status == 3)
                                    <h4>We recieved your new submission, we will look at it as soon as possible <br> Good luck.</h4>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                @if ($solvedTask->status == 1)
                                    <img src="{{URL::asset('StudentPanel/vendors/images/success.gif')}}" alt="">
                                @elseif($solvedTask->status == 2)
                                    <img src="{{URL::asset('StudentPanel/vendors/images/failed.gif')}}" alt="">
                                @elseif ($solvedTask->status == 3)
                                <img src="{{URL::asset('StudentPanel/vendors/images/taskSubmission.gif')}}" alt="">
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection