@extends('layouts.student')
@section('title') - Student's Information @endsection
@section('content')
<div class="main-container">
    @if (Auth::user()->id == $student->id)
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">{{$student->name}} Profile</h4>
                </div>
                <div class="pb-20">
                    <table class="table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Email</th>
                                <th class="table-plus datatable-nosort">Diploma</th>
                                <th class="table-plus datatable-nosort">Group</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td>{{Auth::user()->email}}</td>
                                <td>{{Auth::user()->diploma->name}}</td>
                                <td>{{Auth::user()->group->group_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </div>
                        </div>
                    </div>
                
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Attendance</h4>
                </div>
                {{-- @if ($student->client_id == Auth::guard('client')->user()->id) --}}
                <div class="pb-20">
                    <table class="table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Session</th>
                                <th class="table-plus datatable-nosort">Date</th>
                                <th class="table-plus datatable-nosort">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                            @if ($attendance->student_id == $student->id)
                                <tr>
                                <td>{{$attendance->session->name}}</td>
                                <td>{{$attendance->session->date}}</td>
                                @if ($attendance->status == 0)
                                <td>
                                    <span class="danger rounded p-1 text-white">Absent</span>
                                </td>
                                @elseif ($attendance->status == 1)
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
                {{-- @endif --}}
            </div>
        </div>
    </div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Performance</h4>
                </div>
                {{-- @if ($student->client_id == Auth::guard('client')->user()->id) --}}
                <div class="pb-20">
                    <table class="table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Task</th>
                                <th class="table-plus datatable-nosort">Feedback</th>
                                <th class="table-plus datatable-nosort">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solved_tasks as $solved_task)
                            @if ($solved_task->user_id == $student->id)
                                <tr>
                                <td>{{$solved_task->task->name}}</td>
                                <td>{{$solved_task->comments}}</td>
                                @if ($solved_task->status == 0)
                                <td>
                                    <span class="warning rounded p-1">Pending</span>
                                </td>
                                @elseif ($solved_task->status == 1)
                                <td>
                                    <span class="success rounded p-1 text-white">Passed</span>
                                </td>
                                @else
                                <td>
                                    <span class="danger rounded p-1 text-white">Failed</span>
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
    </div>
    @endif
</div>
@endsection