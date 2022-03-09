@extends('layouts.student')
@section('title') - Task's Details @endsection
@section('content')
<div class="main-container">
    @if ($task->diploma_id == $task->diploma->id AND $task->diploma->id == Auth::user()->diploma_id)
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title pd-20 d-flex justify-content-between align-items-baseline">
                            <h4>{{$task->name}}'s Details</h4>
                            @foreach ($solvedTasks as $solvedTask)
                                @if ($solvedTask->task_id == $task->id AND $solvedTask->user_id == Auth::user()->id AND $solvedTask->status != 0)
                                    <a href="{{route('ViewTaskFeedback' , $solvedTask->id)}}" class="btn btn-primary btn-wide ml-3 text-white">View Feedback</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                @if (!$pendingStatus->isEmpty())
                    <div class="product-detail-wrap mb-30">
                        <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <h5 class="text-center">
                                    Thank you, your task was submitted successfuly and we will send you your score and feedback if we have any. <br>
                                    Good luck
                                </h5>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-desc pd-20 card-box text-center height-50-p">
                                <img src="{{URL::asset('StudentPanel/vendors/images/taskSubmission.gif')}}" alt="" class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (!$passedStatus->isEmpty())
                        <div class="product-detail-wrap mb-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-detail-desc pd-20 card-box height-100-p">
                                        <h5 class="text-center">
                                            We have recieved your task and now you can check your score and feedback.
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-detail-desc pd-20 card-box text-center height-50-p">
                                        <img src="{{URL::asset('StudentPanel/vendors/images/feedback.gif')}}" alt="" class="rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                {{-- @if ($solvedTask->status == 0) --}}
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-20">
                            <div class="product-detail-desc pd-20 card-box height-100-p">
                                <h4 class="mb-20 pt-20">Description:</h4>
                                <p>{{$solvedTask->task->descriptions}}</p>
                                <h4 class="mb-20 pt-20">Requirements:</h4>
                                <p>{{$solvedTask->task->requirements}}</p>
                                <p>{{$solvedTask->task->Description}}</p>
                                <h4 class="mb-20 pt-20">Marks:</h4>
                                <p>{{$solvedTask->task->marks}}</p>
                                @if ($TaskidExists->isEmpty())
                                    <a href="#submit" class="btn btn-primary btn-wide text-white">Ready to Submit?</a>
                {{-- @endif --}}
                </div>
                    </div>
                    @endif
                
                @if ($TaskidExists->isEmpty())
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix" id="submit">
                        <h4 class="text-blue h4">Submit Task's Solution</h4>
                    </div>
                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard" method="POST" action="{{ route('TaskSubmisson') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="task_id" value="{{$task->id}}">
                            <input type="hidden" name="client_id" value="{{$task->client->id}}">
                            <input type="hidden" name="diploma_id" value="{{$task->diploma->id}}">
                            <section>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label class="d-block mb-3">Upload File:</label>
                                            <input type="file" id="real-file" hidden="hidden" name="task_file" @error('task_file') is-invalid @enderror/>
                                                <button type="button" id="custom-button">Browse</button>
                                                <span id="custom-text">No file chosen, yet.</span>
                                                @error('task_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                            </section>
                            <input type="submit" value="Submit" class="btn btn-primary btn-wide mt-5">
                        </form>
                    </div>
                </div>
                @endif
                
                
            </div>
        </div>
    </div>
    @endif

</div>
<script>
    const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
if (realFileBtn.value) {
customTxt.innerHTML = realFileBtn.value.match(
/[\/\\]([\w\d\s\.\-\(\)]+)$/
)[1];
} else {
customTxt.innerHTML = "No file chosen, yet.";
}
});

</script>
@endsection