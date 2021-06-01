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
												<form method="POST" action="{{route('add-house-save')}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Assign to Rental Owner : </label>
																<select id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ old('owner_id') }}" autocomplete="owner_id" autofocus>
																<option value="">Select Owner</option>
																@foreach ($owners as $owner) 
																	<option value="{{$owner['uid']}}">{{$owner['first_name'].' '.$owner['last_name']}}</option>
																@endforeach
																</select>
																@error('owner_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-12">
															<h5 class="d-block mt-4">House Address</h5>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																

																<input id="address" placeholder="Address Specifications" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
																@error('address')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="status" type="text" placeholder="Status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" autocomplete="status" autofocus>
																@error('status')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="city" placeholder="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>
																@error('city')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-12">
															<h5 class="d-block mt-4">House Specifications</h5>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																
																<input id="name" placeholder="House Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
																@error('name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<select id="type"  class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" autocomplete="type" autofocus>
																	<option value="option1">option 1</option>
																	<option value="option2">option 2</option>
																	<option value="option3">option 3</option>
																</select>
																@error('type')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="num_rooms" placeholder="Number Rooms" type="number" class="form-control @error('num_rooms') is-invalid @enderror" name="num_rooms" value="{{ old('num_rooms') }}" autocomplete="num_rooms" autofocus>
																@error('num_rooms')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="num_residents" placeholder="Number Residents" type="number" class="form-control @error('num_residents') is-invalid @enderror" name="num_residents" value="{{ old('num_residents') }}" autocomplete="num_residents" autofocus>
																@error('num_residents')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="bathrooms" placeholder="Number Bathrooms" type="number" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" value="{{ old('bathrooms') }}" autocomplete="bathrooms" autofocus>
																@error('bathrooms')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="flooers" placeholder="number Flooers" type="number" class="form-control @error('flooers') is-invalid @enderror" name="flooers" value="{{ old('flooers') }}" autocomplete="flooers" autofocus>
																@error('flooers')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="parking" placeholder="Off-Street Parking" type="number" class="form-control @error('parking') is-invalid @enderror" name="parking" value="{{ old('parking') }}" autocomplete="parking" autofocus>
																@error('parking')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="total_size" placeholder="Total Size" type="number" class="form-control @error('total_size') is-invalid @enderror" name="total_size" value="{{ old('total_size') }}" autocomplete="total_size" autofocus>
																@error('total_size')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																
																<input id="kitchens" placeholder="Kitchens" type="number" class="form-control @error('kitchens') is-invalid @enderror" name="kitchens" value="{{ old('kitchens') }}" autocomplete="kitchens" autofocus>
																@error('kitchens')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>
														</div>
														<div class="col-md-12">
															<h5 class="d-block mt-4">Diligence Requirements</h5>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																
																<input id="annual_reset" placeholder="Annual Reset"  type="text"  class="form-control @error('annual_reset') is-invalid @enderror" name="annual_reset" value="{{ old('annual_reset') }}" autocomplete="annual_reset" autofocus>
																
																@error('annual_reset')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror

															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-form-label col-md-2">Payments Scheduals</label>
																<div class="col-md-10 d-flex">
																	<div class="radio p-3">
																		<label>
																			<input type="radio" checked name="payment" value="Annual"> Annual
																		</label>
																	</div>
																	<div class="radio p-3">
																		<label>
																			<input type="radio" name="payment" value="Monthly"> Monthly 
																		</label>
																	</div>
																	<div class="radio p-3">
																		<label>
																			<input type="radio" name="payment" value="Quarterly"> Quarterly
																		</label>
																	</div>
																	@error('payment')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload Ownership Contract</label>
																<input id="ownership"  type="file"  class="form-control @error('ownership') is-invalid @enderror" name="ownership" value="{{ old('ownership') }}" autocomplete="ownership" autofocus>
																@error('ownership')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload lease Contract</label>
																<input id="lease"  type="file"  class="form-control @error('lease') is-invalid @enderror" name="lease" value="{{ old('lease') }}" autocomplete="lease" autofocus>
																@error('lease')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>

														<div class="col-md-12">
															<h5 class="d-block mt-4">Property Media Gallery</h5>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload Front View Image</label>
																<input id="front"  type="file"  class="form-control @error('front') is-invalid @enderror" name="front" value="{{ old('front') }}" autocomplete="lease" autofocus>
																@error('front')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload Hall  Images</label>
																<input id="hall"  type="file"  class="form-control @error('hall') is-invalid @enderror" name="hall" value="{{ old('hall') }}" autocomplete="hall" autofocus>
																@error('hall')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload Bedroom  Images</label>
																<input id="bedroom_images"  type="file"  class="form-control @error('bedroom_images') is-invalid @enderror" name="bedroom_images" value="{{ old('bedroom_images') }}" autocomplete="bedroom_images" autofocus>
																@error('bedroom_images')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Upload Kitchen  Images</label>
																<input id="kitchen_images"  type="file"  class="form-control @error('kitchen_images') is-invalid @enderror" name="kitchen_images" value="{{ old('kitchen_images') }}" autocomplete="kitchen_images" autofocus>
																@error('kitchen_images')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label>Upload Diagram  Images</label>
																<input id="diagram"  type="file"  class="form-control @error('diagram') is-invalid @enderror" name="diagram" value="{{ old('diagram') }}" autocomplete="diagram" autofocus>
																@error('diagram')
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