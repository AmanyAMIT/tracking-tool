@extends('layouts.client')

@section('content')
    	<div class="main-container">
		<div class="pd-ltr-20">
			
			{{-- <div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{URL::asset('ClientPanel/src/images/product-img4.jpg')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome <div class="weight-600 font-30 text-blue">In Client Panel</div>
						</h4>
						<p class="font-18 max-width-600 text-capitalize">in client panel you will find all data you need to know about diplomas, materials, groups and students. <br> you can also track your students' performance</p>
					</div>
				</div>
			</div> --}}

				<!-- Cards for Information start -->
				<div class="row">
					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<div class="h5 mb-0">Diplomas</div>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="{{route('ShowDiplomas')}}"><i class="dw dw-eye"></i> View All Diplomas</a>
									</div>
								</div>
							</div>
							<div class="user-list">
								<ul>
									@foreach ($client_diplomas as $client_diploma)
									@if ($client_diploma->client_id == Auth::guard('client')->user()->id)
										@foreach ($diplomas as $diploma)
										@if ($client_diploma->diploma_id == $diploma->id)
										<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="txt">
												<div class="font-14 weight-600">{{$diploma->name}}</div>
												<div class="font-12 weight-500" data-color="#b2b1b6">{{$diploma->description}}</div>
											</div>
										</div>

										<div class="cta flex-shrink-0">
											<a href="{{route('ShowDiplomaDetails' , $diploma->id)}}" class="btn btn-sm btn-outline-primary">View</a>
										</div>
									</li>
										@endif
										@endforeach
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<div class="h5 mb-0">Groups</div>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="{{route('ShowGroups')}}"><i class="dw dw-eye"></i> View All Groups</a>
									</div>
								</div>
							</div>
							<div class="user-list">
								<ul>
									@foreach ($groups as $group)
									@if ($group->client_id == Auth::guard('client')->user()->id)
										
									<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="txt">
												<div class="font-14 weight-600">{{$group->group_name}}</div>
												<div class="font-12 weight-500" data-color="#b2b1b6">{{$group->diploma->name}}</div>
											</div>
										</div>
										<div class="cta flex-shrink-0">
											<a href="{{route('ShowGroupDetails' , $group->id)}}" class="btn btn-sm btn-outline-primary">View</a>
										</div>
									</li>
									@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<div class="h5 mb-0">Students</div>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="{{route('ShowStudents')}}"><i class="dw dw-eye"></i> View All Students</a>
									</div>
								</div>
							</div>
							<div class="user-list">
								<ul>
									@foreach ($students as $student)
									@if ($student->client_id == Auth::guard('client')->user()->id)
									<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="txt">
												<div class="font-14 weight-600">{{$student->name}}</div>
												<div class="font-12 weight-500" data-color="#b2b1b6">{{$student->email}}</div>
											</div>
										</div>
										<div class="cta flex-shrink-0">
											<a href="{{route('ShowStudentDetails' , $student->id)}}" class="btn btn-sm btn-outline-primary">View</a>
										</div>
									</li>
									@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<div class="h5 mb-0">Tasks</div>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="{{route('ShowTasks')}}"><i class="dw dw-eye"></i> View</a>
									</div>
								</div>
							</div>
							<div class="user-list">
								<ul>
									@foreach ($tasks as $task)
									@if ($task->client_id == Auth::guard('client')->user()->id)
									<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="txt">
												<div class="font-14 weight-600">{{$task->name}}</div>
												<div class="font-12 weight-500" data-color="#b2b1b6">{{$task->descriptions}}</div>
											</div>
										</div>
										<div class="cta flex-shrink-0">
											<a href="{{route('ShowTaskDetails' , $task->id)}}" class="btn btn-sm btn-outline-primary">View</a>
										</div>
									</li>
									@endif
									@endforeach
								</ul>
								<div class="container">
									{{$tasks->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Cards for Information End -->
		</div>
	</div>
@endsection
