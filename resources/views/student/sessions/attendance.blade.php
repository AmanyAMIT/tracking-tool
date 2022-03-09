@extends('layouts.student')
@section('title') - Attendance @endsection
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Attendance</h4>
                </div>
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
                            @if ($attendance->student_id == Auth::user()->id)
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
            </div>
        </div>
    </div>
</div>
@endsection