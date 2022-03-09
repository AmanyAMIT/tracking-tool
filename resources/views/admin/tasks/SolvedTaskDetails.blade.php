@extends('layouts.admin')
@section('title')
    - All Solved Tasks
@endsection
@section('content')
    <div class="main-container">
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">{{$solvedTask->user->name}}'s Solution</h4>
            </div>
            <div class="ml-5">
                <p class="text-black">{{$solvedTask->task_file}}</p>
            </div>
        <div class="pd-ltr-20 xs-pd-20-10 pb-30">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30" style="padding-bottom: 50px">
                    <form method="POST" action="{{route('solvedTasks.update' , $solvedTask->id)}}">
                        @csrf
                            {{method_field('PUT')}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label class="weight-600">Task Status: </label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="customRadio1"
                                            class="custom-control-input" name="status" value="1">
                                        <label class="custom-control-label" for="customRadio1">Passed</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="customRadio2"
                                            class="custom-control-input" name="status" value="2">
                                        <label class="custom-control-label" for="customRadio2">Faild</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Student Score:</label>
                            <input class="form-control" type="number" name="score" id="score" min="0" max="10"> Out of {{$solvedTask->task->marks}}
                        </div>
                        <div class="form-group">
                            <label>Leave a Comment or Note</label>
                            <textarea class="form-control" name="comments"></textarea>
                        </div>
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary btn-sm" value="Comment">
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
        </div>
                {{-- <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Student's Solution</h4>
                </div>
                <form method="POST" action="{{route('solvedTasks.update' , $solvedTask->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                <div class="pb-20 ml-3">
                    <p class="text-black">{{$solvedTask->task_file}}</p>
                        <input type="radio" name="status" id="" value="1"> Passed <br>
                        <input type="radio" name="status" id="" value="2"> Faild
                            <div class="dropdown mr-4 border-top mt-5">
                                <textarea name="comments" id="" cols="113" rows="5"></textarea>
                            <div class="">
                                <input type="submit" name="" id="" value="Comment" class="btn btn-success">
                            </div>
                            </div>
                </div>
                        </form>
                        </div>
                </div>
            </div>
            <!-- Simple Datatable End --> --}}
            </div>
        </div>
    </div>
    <script>
        let score = document.getElementById("score");
        if(score.value == " "){
            score.style.border = "1px solid #d4d4d4;";
        }
    </script>
@endsection
