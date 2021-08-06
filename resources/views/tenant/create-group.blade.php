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
								<li class="breadcrumb-item"><a href="{{route('tenant.dashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active">Create Group</li>
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

											<div class="col-md-12">
												@include('flash-message')
												
												<form method="POST" action="{{route('owner.store')}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Code :</label>

																<input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>
																@error('code')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>house:</label>

																<input id="house_id" type="text" class="form-control @error('house_id') is-invalid @enderror" name="house_id" value="{{ old('house_id') }}" autocomplete="house_id" autofocus>
																@error('house_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Email Address:</label>
																<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
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
																<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
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
																<select id="city_id" type="text" class="form-control @error('city_id') is-invalid @enderror" name="city_id" value="{{ old('city_id') }}" autocomplete="city_id" autofocus>
																	<option>Select City </option>
																	@foreach($cities as $city)   
																		<option value="{{$city->id}}" {{ ($city->id==old('city_id'))?'selected':''}} >{{$city->name}}</option>
																  	@endforeach    
																</select>
																	@error('city_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Address:</label>
																<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
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
																<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" autocomplete="state" autofocus>
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
																<input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" autocomplete="zip" autofocus>
																@error('zip')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Password:</label>
																<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="password" autofocus>
																@error('password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Retype Password:</label>
																<input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" autofocus>
																@error('password_confirmation')
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