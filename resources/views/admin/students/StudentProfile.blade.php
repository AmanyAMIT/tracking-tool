@extends('layouts.admin')
@section('title')
    - Student Profile
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>{{ $student->name }} Profile</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <img src="{{ URL::asset('AdminPanel/vendors/images/programmer.jpg') }}" alt=""
                                    class="avatar-photo">
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pd-5">
                                                <div class="img-container">
                                                    <img id="image"
                                                        src="{{ URL::asset('AdminPanel/vendors/images/programmer.jpg') }}"
                                                        alt="Picture">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Update" class="btn btn-primary">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center h5 mb-2">{{ $student->name }}</h5>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        {{ $student->email }}
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Created at:</span>
                                        {{ $student->created_at }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#timeline"
                                                role="tab">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#attendance"
                                                role="tab">Attendance</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Pedning
                                                Tasks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Passedtasks"
                                                role="tab">Passed Tasks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Failedtasks"
                                                role="tab">Failed Tasks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#setting"
                                                role="tab">Settings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Timeline Tab start -->
                                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                            <div class="pd-20">
                                                <div class="profile-timeline">
                                                    <div class="profile-timeline-list">
                                                        <ul>
                                                            <li>
                                                                <div class="task-name"><i
                                                                        class="ion-ios-person-outline"></i> Client</div>
                                                                <p>This student is related to <strong
                                                                        class="task-time">{{ $student->client->name }}</strong>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <div class="task-name"><i
                                                                        class="ion-ios-copy-outline"></i> Diploma</div>
                                                                <p>This student is studying <strong
                                                                        class="task-time">{{ $student->diploma->name }}
                                                                        Diploma</strong></p>
                                                            </li>
                                                            <li>
                                                                <div class="task-name"><i
                                                                        class="ion-ios-people-outline"></i> Group</div>
                                                                <p>This student is related to group <strong
                                                                        class="task-time">{{ $student->group->group_name }}</strong>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Timeline Tab End -->
                                        <div class="tab-pane fade" id="attendance" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                <div class="container pd-0">
                                                        <table class="table stripe hover nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="table-plus datatable-nosort">Session</th>
                                                                    <th class="table-plus datatable-nosort">Date</th>
                                                                    <th class="table-plus datatable-nosort">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($SessionAttendances as $SessionAttendance)
                                                                @if ($SessionAttendance->student_id == $student->id)
                                                                <tr>
                                                                    <td class="table-plus">{{$SessionAttendance->session->name}}</td>
                                                                    <td>{{$SessionAttendance->session->date}}</td>
                                                                    @if ($SessionAttendance->status == 0)
                                                                        <td>
                                                                            <span class="danger rounded p-1 text-white">Absent</span>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <span class="success rounded p-1 text-white">Attend</span>
                                                                        </td>
                                                                    @endif
                                                                    
                                                                </tr>
                                                                @endif
                                                        @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                            <div class="profile-setting">
                                                <form method="POST" action="{{ route('students.update', $student->id) }}">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-6">
                                                            <h4 class="text-blue h5 mb-20">Edit Student's Information</h4>
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="name" value="{{ $student->name }}">
                                                            </div>
                                                        </li>
                                                        <li class="weight-500 col-md-6">

                                                            <div class="form-group mt-5">
                                                                <label>Email</label>
                                                                <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" type="email"
                                                                    name="email" value="{{ $student->email }}" id="email">
                                                                    <p class="text-danger font-14 font-weight-bolder" id="err"></p>
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                        @enderror
                                                            </div>
                                                        </li>
                                                        <div class="form-group mb-0 ml-3">
                                                            <input type="submit" class="btn btn-primary"
                                                                value="Update Information">
                                                        </div>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->
                                        <!-- Tasks Tab start -->
                                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                <div class="container pd-0">
                                                    <!-- Open Task start -->
                                                    <div class="task-title row align-items-center">
                                                        <div class="col-md-8 col-sm-12">
                                                            <h5>Pending Tasks</h5>
                                                        </div>
                                                    </div>
                                                    <div class="profile-task-list pb-30">
                                                        <ul>
                                                            @foreach ($tasks as $task)
                                                                @if ($task->diploma_id == $student->diploma_id)
                                                                    <li>
                                                                        <div class="task-type-pending">
                                                                            <a href="{{route('ShowStudentSubmission' , $task->id)}}">{{ $task->name }}</a>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                        <div class="container text-center ms-auto mt-5">
                                                            {{ $tasks->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="Passedtasks" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                <div class="container pd-0">
                                                    <!-- Open Task start -->
                                                    <div class="task-title row align-items-center">
                                                        <div class="col-md-8 col-sm-12">
                                                            <h5>Passed Tasks</h5>
                                                        </div>
                                                    </div>
                                                    <div class="profile-task-list pb-30">
                                                        <ul>
                                                            @foreach ($solvedTasks as $solvedTask)
                                                                @if ($task->diploma_id == $student->diploma_id)
                                                                    @if ($solvedTask->status == 1)
                                                                        <li>
                                                                            <div class="task-type-pending">
                                                                                <a
                                                                                    href="">{{ $solvedTask->task->name }}</a>
                                                                            </div>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <div class="task-type-pending">
                                                                                <p>No Passed Tasks was Found</p>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                        <div class="container text-center ms-auto mt-5">
                                                            {{ $solvedTasks->fragment('Passedtasks')->render() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="Failedtasks" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                <div class="container pd-0">
                                                    <!-- Open Task start -->
                                                    <div class="task-title row align-items-center">
                                                        <div class="col-md-8 col-sm-12">
                                                            <h5>Failed Tasks</h5>
                                                        </div>
                                                    </div>
                                                    <div class="profile-task-list pb-30">
                                                        <ul>
                                                            @if ($task->diploma_id == $student->diploma_id)
                                                            @foreach ($solvedTasks as $solvedTask)
                                                                @if ($solvedTask->status == 2)
                                                                    
                                                                        <li>
                                                                        <div class="task-type-pending">
                                                                            <a href="">{{ $solvedTask->task->name }}</a>
                                                                        </div>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                @else
                                                                    <li>
                                                                        <div class="task-type-pending">
                                                                            <p>No Failed Tasks was Found</p>
                                                                        </div>
                                                                    </li>
                                                                
                                                            @endif
                                                        </ul>
                                                        {{-- <div class="container text-center ms-auto mt-5">
                                                            {{ $solvedTasks->links() }}
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="app"></div>

                                    </div>
                                    <!-- Tasks Tab End -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $("document").ready(function(){
               $(".nav-link").on("click" , function(){
                //    console.log($(this).data('toggle'));
                //    $("#app").load("#" + $(this).data('toggle'));
                console.log( $("#app").load("#" + $(this).data('toggle')));
               }) 
            })
        </script> --}}
@endsection
