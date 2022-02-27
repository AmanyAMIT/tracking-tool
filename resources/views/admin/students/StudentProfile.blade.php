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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center h5 mb-0">{{ $student->name }}</h5>
                            <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
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
                                <h5 class="mb-20 h5 text-blue">Related Information</h5>
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
                                            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">More
                                                Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Tasks</a>
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
                                                                        class="ion-ios-copy-outline"></i>
                                                                    Diploma</div>
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
                                        <!-- Tasks Tab start -->
                                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                <div class="container pd-0">
                                                    <!-- Open Task start -->
                                                    <div class="task-title row align-items-center">
                                                        <div class="col-md-8 col-sm-12">
                                                            <h5>Open Tasks</h5>
                                                        </div>
                                                    </div>
                                                    @foreach ($tasks as $task)
                                                    @if ($task->diploma_id == $student->diploma_id)
                                                        <div class="profile-task-list pb-30">
                                                        <ul>
                                                            <li>
                                                                <div class="task-type-pending">
                                                                    <a href="">{{$task->name}}</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    <!-- Open Task End -->
                                                    <!-- Close Task start -->
                                                    <div class="task-title row align-items-center">
                                                        <div class="col-md-12 col-sm-12">
                                                            <h5>Closed Tasks</h5>
                                                        </div>
                                                    </div>
                                                        @foreach ($solvedTasks as $solvedTask)
                                                            <div class="profile-task-list close-tasks">
                                                                <ul>
                                                                    <li>
                                                                        <div class="task-type">{{$solvedTask->task->name}}</div>
                                                                        Instructor feedack
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    <!-- Close Task start -->
                                                    <!-- add task popup start -->
                                                    <div class="modal fade customscroll" id="task-add" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Update Information</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="" data-original-title="Close Modal">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body pd-0">
                                                                    <div class="task-list-form">
                                                                        <ul>
                                                                            <li>
                                                                                <form>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-4">Task
                                                                                            Type</label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fortapm-group row">
                                                                                        <label class="col-md-4">Task
                                                                                            Message</label>
                                                                                        <div class="col-md-8">
                                                                                            <textarea
                                                                                                class="form-control"></textarea>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-md-4">Assigned
                                                                                                    to</label>
                                                                                            </div>
                                                                                </form>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;"
                                                                                    class="remove-task"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="bottom" title=""
                                                                                    data-original-title="Remove Task"><i
                                                                                        class="ion-minus-circled"></i></a>
                                                                                <form>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-4">Task
                                                                                            Type</label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-4">Task
                                                                                            Message</label>
                                                                                        <div class="col-md-8">
                                                                                            <textarea
                                                                                                class="form-control"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-md-4">Assigned
                                                                                            to</label>
                                                                                        <div class="col-md-8">
                                                                                            <select
                                                                                                class="selectpicker form-control"
                                                                                                data-style="btn-outline-primary"
                                                                                                title="Not Chosen"
                                                                                                multiple=""
                                                                                                data-selected-text-format="count"
                                                                                                data-count-selected-text="{0} people selected">
                                                                                                <option>Ferdinand M.
                                                                                                </option>
                                                                                                <option>Don H. Rabon
                                                                                                </option>
                                                                                                <option>Ann P. Harris
                                                                                                </option>
                                                                                                <option>Katie D. Verdin
                                                                                                </option>
                                                                                                <option>Christopher S.
                                                                                                    Fulghum</option>
                                                                                                <option>Matthew C. Porter
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row mb-0">
                                                                                        <label class="col-md-4">Due
                                                                                            Date</label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text"
                                                                                                class="form-control date-picker">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="add-more-task">
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="bottom" title=""
                                                                            data-original-title="Add Task"><i
                                                                                class="ion-plus-circled"></i> Add More
                                                                            Task</a>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-primary">Add</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- add task popup End -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tasks Tab End -->
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade height-100-p active show" id="setting" role="tabpanel">
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
                                                                    name="name">
                                                            </div>
                                                        </li>
                                                        <li class="weight-500 col-md-6">

                                                            <div class="form-group mt-5">
                                                                <label>Email</label>
                                                                <input class="form-control form-control-lg" type="email"
                                                                    name="email">
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
