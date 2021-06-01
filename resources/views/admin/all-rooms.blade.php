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
		@extends('layouts-admin.header')
		<!-- /Header -->
		<!-- Sidebar -->
		@extends('layouts-admin.sidebar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">



				<div class="row">
					<div class="col-md-12">




						<!-- Personal Details Tab -->


						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">

										<div class="row">

											<div class="col-md-12">
												@isset($error)
												<div class="alert alert-danger alert-dismissible fade show"
													role="alert">
													<strong>Error!</strong>{{$error}}
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												@endisset
												@isset($success)
												<div class="alert alert-success alert-dismissible fade show"
													role="alert">
													<strong>Success!</strong>{{ $success}}
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												@endisset
											</div>

											<div class="col-sm-7 col-auto mb-3">
												<h3 class="page-title">Houses</h3>

											</div>
											<div class="col-sm-5 col mb-3">
												<a href="{{route('add-room')}}"
													class="btn btn-primary float-right mt-2">Add a New Room</a>
											</div>

											<div class="col-sm-12">
												<table
													class="datatable table table-hover table-center mb-0 dataTable no-footer"
													id="DataTables_Table_0" role="grid"
													aria-describedby="DataTables_Table_0_info">
													<thead>
														<tr role="row">
															<th class="sorting" tabindex="0"
																
																
																style="width: 239.6px;"> Name</th>
															<th class="sorting" tabindex="0"
																
																
																style="width: 179.6px;">Location</th>
																
															<th class="sorting" tabindex="0"
																
																
																style="width: 239.6px;"> Price</th>
															
															<th class="sorting" tabindex="0"
																
																
																style="width: 256.4px;">Date</th>
														</tr>
													</thead>
													<tbody>









														@foreach ($rooms as $room) 
															<tr role="row" class="odd">
																<td>{{$room['name']}}</td>
																<td>{{$room['location']}}</td>
																
																<td>{{$room['price']}}</td>
																<td>{{$room['date']}}</td>
																

																
															</tr>
														@endforeach
														
														

													</tbody>
												</table>
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