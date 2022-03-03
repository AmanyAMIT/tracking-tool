@extends('layouts.admin')
@section('content')
    <div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{URL::asset('AdminPanel/vendors/images/banner-img.png')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome in <div class="weight-600 font-30 text-blue">Admin Panel</div>
						</h4>
						<p class="font-18 max-width-600 text-capitalize">in admin panel, everything is under your control</p>
					</div>
				</div>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
							<a href="{{route('clients.index')}}">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								@if ($clients > 100000)
								<div class="weight-700 font-24 text-dark">+100,000 Clients</div>
								@else
								<div class="weight-700 font-24 text-dark">{{$clients}}</div>
								@endif
								<div class="font-14 text-secondary weight-500">Clients</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><span class="micon dw dw-user1"></span></div>
							</div>
						</div>
						</a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<a href="{{route("diplomas.index")}}">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								@if ($diplomas > 100000)
									<div class="weight-700 font-24 text-dark">+100000 Diplomas</div>
								@else
								<div class="weight-700 font-24 text-dark">{{$diplomas}}</div>
								@endif
								<div class="font-14 text-secondary weight-500">Diplomas</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><span class="micon dw dw-copy"></span></div>
							</div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<a href="{{route("groups.index")}}">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								@if ($groups > 100000)
									<div class="weight-700 font-24 text-dark">+100000 Groups</div>
								@else
								<div class="weight-700 font-24 text-dark">{{$groups}}</div>
								@endif
								<div class="font-14 text-secondary weight-500">Groups</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><span class="micon dw dw-user-11"></span></div>
							</div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<a href="{{route("students.index")}}">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								@if ($students > 100000)
									<div class="weight-700 font-24 text-dark">+100000 Students</div>
								@else
								<div class="weight-700 font-24 text-dark">{{$students}}</div>
								@endif
								<div class="font-14 text-secondary weight-500">Students</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><span class="micon dw dw-group"></span></div>
							</div>
						</div>
					</a>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
