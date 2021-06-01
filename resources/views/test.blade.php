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
						<div class="profile-header">
							<div class="row align-items-center">
								<div class="col-auto profile-image">
									<a href="#">
										<img class="rounded-circle" alt="User Image"
											src="{{ asset('images/profile/defult.png') }}">
									</a>
								
								<div class="col-auto profile-btn">


								</div>
							</div>
						</div>



						<!-- Personal Details Tab -->


						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">

										<div class="row">

											<div class="col-md-12">
												@isset($error)
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Error!</strong>{{$error}}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>    
                                                @endisset
												@isset($success)
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Success!</strong>{{ $success}}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
                                                @endisset
												<form method="POST" action="/test"  enctype="multipart/form-data">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>First Name:</label>

																<input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" autocomplete="file" autofocus>
																@error('file')
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