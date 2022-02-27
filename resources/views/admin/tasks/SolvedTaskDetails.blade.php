@extends('layouts.admin')
@section('title') - All Solved Tasks @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
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
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
@endsection