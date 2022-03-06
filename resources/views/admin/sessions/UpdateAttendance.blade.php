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
            <form action="{{route('updateAttendance')}}" method="POST">
			<div class="min-height-200px">
                <div class="page-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4 class="text-capitalize text-bold text-primary font-30">{{ $session->name }} Session's Attendance</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <input type="submit" value="Update Attendance" class="btn btn-primary btn-wide ml-3">
                        </div>
                    </div>
                </div>
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
                                        <div class="wrapper">
                                            <div class="switch_box box_4">
                                                <div class="input_wrapper">
                                                    <input type="checkbox" class="switch_4" name="status[]">
                                                    <i class="icon-copy dw dw-enter is_checked"></i>
                                                    <i class="icon-copy dw dw-logout1 is_unchecked"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" value="{{$session->id}}" name="SessionAttendance[]">
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </form>
        <div class="row">
            @include('sweetalert::alert')
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
