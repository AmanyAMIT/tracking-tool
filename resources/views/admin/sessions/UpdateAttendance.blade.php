@extends('layouts.admin')
@section('title') - Session Information @endsection
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('AdminPanel/src/plugins/switchery/switchery.min.css')}}">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('AdminPanel/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('AdminPanel/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('AdminPanel/vendors/styles/style.css')}}">
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4 class="text-capitalize text-bold text-primary font-30">{{ $session->name }} Session's Attendance</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('updateAttendance')}}" method="POST">
                    {{-- {{method_field('PUT')}} --}}
                    @csrf
                    <div class="row">
                    @foreach ($students as $student)
                        @if($student->group_id == $session->group_id AND $student->diploma_id == $session->diploma_id)
                            <div class="col-md-4 mb-30">
                        <div class="card-box pricing-card-style2">
                            <div class="pricing-card-header">
                                <div class="left">
                                    <h5>{{$student->name}}</h5>
                                    <p>{{$student->email}}</p>
                                    <input type="hidden" value="{{$student->id}}" name="student_id[]">
                                </div>
                                <div class="right">
                                    <div class="pricing-price">
                                        <input type="checkbox" name="status[]" value="1">Attend
                                        <input type="checkbox" name="status[]" value="0">Absent
                                        {{-- <input type="checkbox" class="switch-btn" data-size="small" data-color="#28a745" name="status[]"> --}}
                                    </div>
                                    <input type="hidden" value="{{$session->id}}" name="SessionAttendance[]">
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <input type="submit" value="Update Attendance" class="btn btn-primary btn-wide mt-5 ml-3">
                </form>
                <div class="row">
                    @include('sweetalert::alert')
                </div>
            </div>
        </div>
    </div>
	<!-- js -->
	<script src="{{URL::asset('AdminPanel/vendors/scripts/core.js')}}"></script>
	<script src="{{URL::asset('AdminPanel/vendors/scripts/script.min.js')}}"></script>
	<script src="{{URL::asset('AdminPanel/vendors/scripts/process.js')}}"></script>
	<script src="{{URL::asset('AdminPanel/vendors/scripts/layout-settings.js')}}"></script>
	<!-- switchery js -->
	<script src="{{URL::asset('AdminPanel/src/plugins/switchery/switchery.min.js')}}"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="{{URL::asset('AdminPanel/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
	<!-- bootstrap-touchspin js -->
	<script src="{{URL::asset('AdminPanel/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.j')}}s"></script>
	<script src="{{URL::asset('AdminPanel/vendors/scripts/advanced-components.js')}}"></script>
</body>
</html>
