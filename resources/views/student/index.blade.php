@extends('layouts.student')
@section('content')
    <div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{URL::asset('StudentPanel/vendors/images/programmer.jpg')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">{{Auth::user()->name}}</div>
						</h4>
						<p class="font-18 max-width-600 text-capitalize">here you will find all tasks which you need to submit and all materials which will help you to study</p>
					</div>
				</div>
			</div>
			<div class="row">

			</div>
			<div class="row">

			</div>
			<div class="card-box mb-30">

			</div>
		</div>
	</div>
@endsection

