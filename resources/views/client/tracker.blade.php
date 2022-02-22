@extends('layouts.client')

@section('content')
    	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
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
			</div>
				<!-- multiple select row Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Table with multiple select row</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table hover multiple-select-row nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Diploma's Name</th>
									<th>Relevant Data</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-plus">Fullstack PHP</td>
									<td>brief about diploma like Groups, Rounds, Tasks, Materials</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- multiple select row Datatable End -->
		</div>
	</div>
@endsection
