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
		@include('layouts-tenant.sidebar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Tenant</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{url('tenant.dashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active">Create ZailCode</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<!-- Personal Details Tab -->
						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-9">
								<div class="card">
									<div class="card-body">
												@include('flash-message')
												<form method="POST" action="{{route('tenant.addzailcode')}}">
													{{ csrf_field() }}
                                                    <input  type="hidden" class="form-control" name="code" value="{{ $code }}"  >
													<div class="row">
														<div class="col-md-8">
															<div class="form-group">
																<label>ZailCode :</label>

																<input id="zailcode" type="text" class="form-control @error('zailcode') is-invalid @enderror" name="zailcode" value="{{ old('zailcode') }}" autocomplete="code" autofocus>
																@error('zailcode')
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
						<!-- /Personal Details -->

						<!-- /Personal Details Tab -->

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