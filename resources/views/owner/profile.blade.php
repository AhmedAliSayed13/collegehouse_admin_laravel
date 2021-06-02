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
		@include('layouts-owner.header')
		<!-- /Header -->
		<!-- Sidebar -->
		@include('layouts-owner.sidebar')
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
								</div>
								<div class="col ml-md-n2 profile-user-info">
									<h4 class="user-name mb-0" id="data_fullname">{{Auth::user()->fullname()}}</h4>
									<h6 class="text-muted" id="data_type">{{Auth::user()->role->name}}</h6>
								</div>
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
												@include('flash-message')
												
												<form method="POST" action="{{route('owner.profile.save')}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>First Name:</label>

																<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',Auth::user()->first_name) }}" autocomplete="first_name" autofocus>
																@error('first_name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Last Name:</label>

																<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',Auth::user()->last_name) }}" autocomplete="last_name" autofocus>
																@error('last_name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Email Address:</label>
																<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',Auth::user()->email) }}" autocomplete="email" autofocus>
																@error('email')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Phone:</label>
																<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',Auth::user()->phone) }}" autocomplete="phone" autofocus>
																@error('phone')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>City:</label>
																<select id="city_id" type="text" class="form-control @error('city_id') is-invalid @enderror" name="city_id" value="{{ old('city_id',Auth::user()->city_id) }}" autocomplete="city_id" autofocus>
																	<option>Select City </option>
																	@foreach($cities as $city)   
																		<option value="{{ $city->id}}" {{($city->id==old('city_id',Auth::user()->city_id))?'selected':''}}>{{ $city->name}}</option>
																  	@endforeach    
																</select>
																	@error('city')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Address:</label>
																<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',Auth::user()->address) }}" autocomplete="address" autofocus>
																@error('address')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>State:</label>
																<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state',Auth::user()->state) }}" autocomplete="state" autofocus>
																@error('state')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>ZiP Code:</label>
																<input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip',Auth::user()->zip) }}" autocomplete="zip" autofocus>
																@error('zip')
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