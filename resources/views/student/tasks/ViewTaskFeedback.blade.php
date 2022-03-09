@extends('layouts.student')
@section('title') - Task's Feedback @endsection
@section('content')
<div class="main-container">
    {{-- @if ($solvedTask->task->diploma_id == $solvedTask->task->diploma->id AND $solvedTask->task->diploma->id == Auth::user()->diploma_id AND $solvedTask->task_id == $solvedTask->task->id) --}}
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
                @if ($solvedTask->status == 2)
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix" id="submit">
                        <h4 class="text-blue h4">Resubmit the Task</h4>
                    </div>
                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard" method="POST" action="{{ route('ResubmitNewTask' , $solvedTask->id) }}"
                            enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            @csrf
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
    {{-- @endif --}}

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