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
												<form method="POST" action="{{route('add-room-save')}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Select House : </label>
																<select id="house_id" type="text" class="form-control @error('house_id') is-invalid @enderror" name="house_id" value="{{ old('house_id') }}" autocomplete="house_id" autofocus>
																<option value="">Select House</option>
																@foreach ($houses as $key=>$house) 
																	<option value="{{$key}}">{{$house['name']}}</option>
																@endforeach
																</select>
																@error('house_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-12">
															<h5 class="d-block mt-4">Room Information</h5>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<input id="name" placeholder="Title" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
																@error('name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<input id="location" placeholder="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autocomplete="location" autofocus>
																@error('location')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="price" type="text" placeholder="Rent/Month" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
																@error('price')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="beds" placeholder="Deds" type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{ old('beds') }}" autocomplete="beds" autofocus>
																@error('beds')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
																
																<input id="size" placeholder="Size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" autocomplete="size" autofocus>
																@error('size')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														
														
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12">
																	<h5 class="d-block mt-4">House Describe</h5>
																</div>
																<textarea id="house_describe" placeholder="House Describe" type="text" class="form-control @error('house_describe') is-invalid @enderror" name="house_describe"  autocomplete="house_describe" autofocus>
																	{{ old('house_describe') }}
																</textarea>
																	@error('house_describe')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>

														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12">
																	<h5 class="d-block mt-4"> About Room</h5>
																</div>
																<textarea   type="text" class="form-control @error('about_room') is-invalid @enderror" name="about_room"  autocomplete="about_room" autofocus>
																	{{ old('about_room') }}
																</textarea>
																	@error('about_room')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

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