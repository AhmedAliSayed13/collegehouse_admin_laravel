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
		@inclde('layouts-admin.header')
		<!-- /Header -->
		<!-- Sidebar -->
		@inclde('layouts-admin.sidebar')
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
											</div>
											<div class="col-md-12">
												<h5 class="d-block mt-4">Add Rental Owner</h5>
											</div>
											<div class="col-md-12">
												
												<form method="POST" action="{{ route('add-rental-owner-save') }}">
													@csrf
												  <div class="form-row mt-3">
													<div class="col">
													  <label for="first_name">First Name</label>
													  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>
													  @error('first_name')
													  <span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
													  </span>
													 @enderror
													</div>
													<div class="col">
													  <label for="last_name">Last Name</label>
													  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
													  @error('last_name')
													  <span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
													  </span>
													 @enderror
													</div>
												  </div>
										
												  <div class="form-row mt-3">
													<div class="col">
													  <label for="field_email">Email Address</label>
													  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
													  @error('email')
													  <span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
													  </span>
													  @enderror
													</div>
													<div class="col">
													  <label for="phone">Phone Number</label>
													  <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
													  @error('phone')
													  <span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
													  </span>
													 @enderror
													</div>
												  </div>
										
												  <div class="form-row mt-3">
													<div class="col">
													  <label for="field_password">Password</label>
													  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
										
														@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
													<div class="col">
													  <label for="field_confirm_password">Retype Password</label>
													  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
													</div>
												  </div>
										
												  <div class="form-row mt-3">
													<div class="col">
													  <label for="address">Address</label>
													  <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>
													  @error('address')
													  <span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
													  </span>
													 @enderror
													</div>
												  </div>
										
													<div class="form-row mt-3">
													  <div class="col">
														<label for="city">City</label>
														<select id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"   autocomplete="city" autofocus>
														  <option value="">Select City</option>
														  <option value="option1">option 1</option>
														  <option value="option2">option 2</option>
														  <option value="option3">option 3</option>
														</select>
														  @error('city')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													  </div>
													  <div class="col">
														<label for="state">State</label>
														<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}"  autocomplete="state" autofocus>
														@error('state')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													  </div>
													</div>
										
													<div class="form-row mt-3">
													  <div class="col">
														<label for="zip">Postcode/Zip</label>
														<input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}"  autocomplete="zip" autofocus>
														@error('zip')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													  </div>
										
													</div>
										
												  <button type="submit" class="index-link-signin btn btn-primary" id="sign-in-btn">Save</button>
										
												  </form>
										
												  
												</div>
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