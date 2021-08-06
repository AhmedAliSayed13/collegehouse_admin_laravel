<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure - Profile</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">



	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<!-- firebase files end -->

</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@include('layouts-admin.header')
		<!-- /Header -->
		<!-- Sidebar -->
		@include('layouts-admin.sidebar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Admin</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('interview.index')}}">Interviews</a></li>
								<li class="breadcrumb-item active">Edit Interview Information</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						



						<!-- Personal Details Tab -->


						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">

										<div class="row">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">Meeting information</h4>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-striped mb-0">
																
																<tbody>
																	<tr>
																		<td>Meeting ID</td>
																		
																		@if(isset($application->meeting->meeting_id))
																		<td>{{$application->meeting->meeting_id}}</td>
																		@else
																		<td>-</td>
																		@endif
																	</tr>
																	<tr>
																		<td>Meeting Date</td>
																		@if(isset($application->meeting->meeting_date))
																		<td>{{str_replace('T',' ',$application->meeting->meeting_date)}}</td>
																		@else
																		<td>-</td>
																		@endif
																	</tr>
																	
																	<tr>
																		<td>Meeting Join</td>
																		@if(isset($application->meeting->meeting_url))
																		<td><h4><a target="_blank" class="f" href="{{$application->meeting->meeting_url}}"><i class="fa fa-external-link"></i></h4></a></td>
																		@else
																		<td>-</td>
																		@endif
																		
																		
																	</tr>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												@include('flash-message')
												
												<form method="POST" action="{{route('admin.zoom-edit')}}">
													{{ csrf_field() }}
                                                    @method('PATCH')
													<input name="id" value="{{$interview->id}}" type="hidden">
													<input name="meeting_id" value="{{$interview->meeting_id}}" type="hidden">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Meeting Date:</label>
																
																<input id="meeting_date" type="datetime-local" min="{{Carbon\Carbon::now()->format('Y-m-d\T00:00:00')}}" class="form-control @error('meeting_date') is-invalid @enderror" name="meeting_date" value="{{ old('meeting_date') }}" autocomplete="meeting_date" autofocus>
																@error('meeting_date')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
													
														
														
														

														<div class="col-md-12">
															<div class="form-group">
																<label>Meeting Status:</label>
																<select id="meeting_case_id"  class="form-control @error('meeting_case_id') is-invalid @enderror" name="meeting_case_id"  autocomplete="meeting_case_id" autofocus>
																	<option>Select status </option>
																	@foreach($meeting_cases as $meeting_case)   
																		<option value="{{$meeting_case->id}}" {{ option_select(old("meeting_case_id",$interview->meeting_case_id) , $meeting_case->id  )}} >{{$meeting_case->name}}</option>
																  	@endforeach    
																</select>
																	@error('city_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														
														
													</div>
													<button type="submit" class="btn btn-primary" id="id-form1">
														Update info
													</button>

												</form>
											</div>
										</div>



									</div>
								</div>



							</div>


						</div>
						<!-- /Personal Details -->


						<!-- /Personal Details Tab -->




					</div>
				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>





	

</body>

</html>