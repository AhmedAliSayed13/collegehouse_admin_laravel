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
	<style>


	</style>
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">



		<!-- Page Wrapper -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 m-auto appliction-padding">




					<!-- Personal Details Tab -->


					<!-- Personal Details -->

					<h4 class="text-center">Welcome to our Community! We are excited to have you join us!</h4>
					<p class="text-center">Please complete this application accurately and we will be in touch with you
						shortly after with your next steps.</p>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-timeline-application">
						<ol class="steps-timeline text-center">
							<li class="steps-timeline__step  steps-timeline__step--current"><span
									class="step-text">Applicant Information</span></li>
							<li class="steps-timeline__step"><span class="step-text">Guarantors</span></li>
							<li class="steps-timeline__step"><span class="step-text">Rental History</span></li>
							<li class="steps-timeline__step"><span class="step-text">Employment</span></li>
							<li class="steps-timeline__step"><span class="step-text">Terms and Conditions</span></li>
							<li class="steps-timeline__step"><span class="step-text">Preview Submission</span></li>
						</ol>
					</div>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-step-form">
						<header class="step-form-header">Applicant Information</header>
						<p class="step-form-decs">Your information will be used to create your profile with us. Please
							complete all required fields accurately.</p>

						<form method="POST" action="{{route('house.store')}}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="row">




								<div class="col-md-6">
									<div class="form-group">
										<label>First Name:</label>
										<input id="first_name" type="text" placeholder="First Name"
											class="form-control @error('first_name') is-invalid @enderror"
											name="first_name" value="{{ old('first_name') }}" autocomplete="first_name"
											autofocus>
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
										<input id="last_name" type="text" placeholder="Last Name"
											class="form-control @error('last_name') is-invalid @enderror"
											name="last_name" value="{{ old('last_name') }}" autocomplete="last_name"
											autofocus>
										@error('last_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label>Gender:</label>
										<select id="gender_id"
											class=" form-control @error('gender_id') is-invalid @enderror"
											name="gender_id" value="{{ old('gender_id') }}" autocomplete="gender_id"
											autofocus>
											<option value="">Select Gender</option>
											@foreach ($genders as $gender)
											<option value="{{$gender->id}}"
												{{ option_select(old("owner_id") , $gender->id )}}>{{$gender->name}}
											</option>
											@endforeach
										</select>
										@error('gender_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Email Address:</label>
										<input id="email" placeholder="email" type="email"
											class="form-control @error('email') is-invalid @enderror"
											name="num_rooms" value="{{ old('email') }}" autocomplete="email"
											autofocus>
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Birthday:</label>
										<input id="birthday" placeholder="Birthday" type="date"
											class="form-control @error('birthday') is-invalid @enderror"
											name="birthday" value="{{ old('birthday') }}"
											autocomplete="birthday" autofocus>
										@error('birthday')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Mobile/Phone Number:</label>
										<input id="phone"  type="text" placeholder="Phone"
											class="form-control @error('phone') is-invalid @enderror"
											name="phone" value="{{ old('phone') }}"
											autocomplete="phone" autofocus>
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>SSN:</label>
										<input id="ssn"  type="text" placeholder="ssn"
											class="form-control @error('ssn') is-invalid @enderror"
											name="ssn" value="{{ old('ssn') }}"
											autocomplete="ssn" autofocus>
										@error('ssn')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-12">
									<h4 class="d-block mt-4">Address:</h4>
								</div>




								<div class="col-md-6">
									<div class="form-group">
									<label>Address 1</label>
									<textarea id="address1" class="form-control @error('address1') is-invalid @enderror"
										name="address1" autocomplete="address1" autofocus>
												{{ old('address1') }}
												</textarea>
										@error('address1')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Address 2</label>
									<textarea id="address2" class="form-control @error('address2') is-invalid @enderror"
										name="address2" autocomplete="address2" autofocus>
												{{ old('address2') }}
												</textarea>
										@error('address2')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>


								<div class="col-md-5">
									<div class="form-group">
										<label>City:</label>
										<select id="city_id"
											class=" form-control @error('city_id') is-invalid @enderror"
											name="city_id"  autocomplete="city_id"
											autofocus>
											<option value="">Select City</option>
											@foreach ($citys as $city)
											<option value="{{$city->id}}"
												{{ option_select(old("city_id") , $city->id )}}>{{$city->name}}
											</option>
											@endforeach
										</select>
										@error('city_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>State:</label>
										<select id="city_id"
											class=" form-control @error('state_id') is-invalid @enderror"
											name="state_id"  autocomplete="state_id"
											autofocus>
											<option value="">Select City</option>
											@foreach ($states as $state)
											<option value="{{$state->id}}"
												{{ option_select(old("state_id") , $state->id )}}>{{$state->name}}
											</option>
											@endforeach
										</select>
										@error('state_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Zip Code:</label>
										<input id="zip" placeholder="Zip Code" type="text"
											class="form-control @error('zip') is-invalid @enderror"
											name="zip" value="{{ old('zip') }}" autocomplete="zip"
											autofocus>
										@error('zip')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Requested Housing Type:</label>
										<select id="house_type_id"
											class=" form-control @error('house_type_id') is-invalid @enderror"
											name="house_type_id"  autocomplete="house_type_id"
											autofocus>
											<option value="">Select Housing Type</option>
											@foreach ($house_types as $house_type)
											<option value="{{$house_type->id}}"
												{{ option_select(old("house_type_id") , $house_type->id )}}>{{$house_type->name}}
											</option>
											@endforeach
										</select>
										@error('house_type_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Requested Property For Rent:</label>
										<select id="requested_houses"
											class=" form-control @error('requested_houses') is-invalid @enderror"
											name="requested_houses"  autocomplete="requested_houses"
											autofocus>
											@foreach ($house_groups as $house_group)
											<option value="{{$house_group->id}}"
												{{ option_select(old("requested_houses") , $house_group->id )}}>{{$house_group->name}}
											</option>
											@endforeach
										</select>
										@error('house_type_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-12">
									<h4 class="d-block mt-4">Group Members:</h4>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Group lead name:</label>
										<input id="group_lead_name" placeholder="Group lead name" type="text"
											class="form-control @error('group_lead_name') is-invalid @enderror"
											name="group_lead_name" value="{{ old('group_lead_name') }}" autocomplete="group_lead_name"
											autofocus>
										@error('group_lead_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Group member name (1):</label>
										<input id="group_member_name_1" placeholder="Group member name (1)" type="text"
											class="form-control @error('group_member_name_1') is-invalid @enderror"
											name="group_member_name_1" value="{{ old('group_member_name_1') }}" autocomplete="group_member_name_1"
											autofocus>
										@error('group_member_name_1')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Group member name (2):</label>
										<input id="group_member_name_2" placeholder="Group member name (2)" type="text"
											class="form-control @error('group_member_name_1') is-invalid @enderror"
											name="group_member_name_2" value="{{ old('group_member_name_2') }}" autocomplete="group_member_name_2"
											autofocus>
										@error('group_member_name_2')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Group member name (3):</label>
										<input id="group_member_name_3" placeholder="Group member name (3)" type="text"
											class="form-control @error('group_member_name_1') is-invalid @enderror"
											name="group_member_name_3" value="{{ old('group_member_name_3') }}" autocomplete="group_member_name_3"
											autofocus>
										@error('group_member_name_3')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Group member name (4):</label>
										<input id="group_member_name_4" placeholder="Group member name (4)" type="text"
											class="form-control @error('group_member_name_1') is-invalid @enderror"
											name="group_member_name_4" value="{{ old('group_member_name_4') }}" autocomplete="group_member_name_4"
											autofocus>
										@error('group_member_name_4')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Requested Property For Rent:</label>
										<select id="requested_houses"
											class=" form-control @error('requested_houses') is-invalid @enderror"
											name="requested_houses"  autocomplete="requested_houses"
											autofocus>
											@foreach ($house_boardings as $house_boardings)
											<option value="{{$house_boardings->id}}"
												{{ option_select(old("requested_houses") , $house_boardings->id )}}>{{$house_boardings->name}}
											</option>
											@endforeach
										</select>
										@error('house_type_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Room Type:</label>
										<select id="room_type_id"
											class="form-control @error('room_type_id') is-invalid @enderror"
											name="room_type_id"  autocomplete="room_type_id"
											autofocus>

											
											@foreach ($room_types as $room_type)
											<option value="{{$room_type->id}}"
												{{ option_select(old("room_type_id") , $room_type->id )}}>{{$room_type->name}}
											</option>
											@endforeach
										</select>
										@error('room_type_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>











								<div class="col-md-12">
									<div class="form-group">
										<label>Are you bringing a Car?:</label>
										<select id="bringing_Car"
											class=" form-control @error('bringing_Car') is-invalid @enderror"
											name="bringing_Car"  autocomplete="bringing_Car"
											autofocus>
											<option value="0" {{ option_select(old("bringing_Car") , 0 )}}>NO</option>
											<option value="1" {{ option_select(old("bringing_Car") , 1 )}}>Yes</option>
										</select>
										@error('bringing_Car')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>




								

								<div class="col-md-6">
									<div class="form-group">
										<input id="total_size" placeholder="Total Size" type="number"
											class="form-control @error('total_size') is-invalid @enderror"
											name="total_size" value="{{ old('total_size') }}" autocomplete="total_size"
											autofocus>
										@error('total_size')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="num_kitchens" placeholder="Kitchens" type="number"
											class="form-control @error('num_kitchens') is-invalid @enderror"
											name="num_kitchens" value="{{ old('num_kitchens') }}"
											autocomplete="num_kitchens" autofocus>
										@error('num_kitchens')
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
										<input id="annual_reset" placeholder="Annual Reset" type="text"
											class="form-control @error('annual_reset') is-invalid @enderror"
											name="annual_reset" value="{{ old('annual_reset') }}"
											autocomplete="annual_reset" autofocus>
										@error('annual_reset')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>

								<div class="col-md-12">
									<h5 class="d-block mt-4">Property Highlights</h5>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="excellent_location" placeholder="Excellent Location" type="text"
											class="form-control @error('excellent_location') is-invalid @enderror"
											name="excellent_location" value="{{ old('excellent_location') }}"
											autocomplete="excellent_location" autofocus>
										@error('excellent_location')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="safety_security" placeholder="Safety Security" type="text"
											class="form-control @error('safety_security') is-invalid @enderror"
											name="safety_security" value="{{ old('safety_security') }}"
											autocomplete="Safety Security" autofocus>
										@error('safety_security')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="professional_maintenance" placeholder="Professional Maintenance"
											type="text"
											class="form-control @error('professional_maintenance') is-invalid @enderror"
											name="professional_maintenance"
											value="{{ old('professional_maintenance') }}"
											autocomplete="professional_maintenance" autofocus>
										@error('professional_maintenance')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="resident_account" placeholder="Resident Account" type="text"
											class="form-control @error('resident_account') is-invalid @enderror"
											name="resident_account" value="{{ old('resident_account') }}"
											autocomplete="resident_account" autofocus>
										@error('resident_account')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>House Description</label>
										<textarea id="image_ownership"
											class="form-control @error('description') is-invalid @enderror"
											name="description" autocomplete="description" autofocus>
													{{ old('description') }}
													</textarea>
										@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>House About</label>
										<textarea id="about" class="form-control @error('about') is-invalid @enderror"
											name="about" autocomplete="about" autofocus>
													{{ old('about') }}
													</textarea>
										@error('about')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label>Upload Ownership Contract</label>
										<input id="image_ownership" type="file"
											class="form-control @error('image_ownership') is-invalid @enderror"
											name="image_ownership" value="{{ old('image_ownership') }}"
											autocomplete="image_ownership" autofocus>
										@error('image_ownership')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Upload lease Contract</label>
										<input id="image_lease" type="file"
											class="form-control @error('image_lease') is-invalid @enderror"
											name="image_lease" value="{{ old('image_lease') }}"
											autocomplete="image_lease" autofocus>
										@error('image_lease')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Upload Front House Images</label>
										<input id="front_house_images" type="file"
											class="form-control @error('front_house_images') is-invalid @enderror"
											name="front_house_images[]" autocomplete="front_house_images" autofocus
											multiple>
										@error('front_house_images')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Upload Video</label>
										<input id="video" type="file"
											class="form-control @error('video') is-invalid @enderror" name="video"
											autocomplete="video" autofocus multiple>
										@error('video')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Upload pdf</label>
										<input id="pdf" type="file"
											class="form-control @error('pdf') is-invalid @enderror" name="pdf"
											autocomplete="pdf" autofocus>
										@error('pdf')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>



								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Floor</h4>
											<div class="education-info">
												<div class="row form-row education-cont">
													<div class="col-12 col-md-10 col-lg-11">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-2">
																<div class="form-group">
																	<label>Size</label>
																	<input type="number" name="flooer_size[]" required
																		class="form-control  @error('flooer_size') is-invalid @enderror">

																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-2">
																<div class="form-group">
																	<label>Bathrooms</label>
																	<input type="number" required class="form-control"
																		name="flooer_bathroom[]">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-2">
																<div class="form-group">
																	<label>Rooms</label>
																	<input type="number" class="form-control" required
																		name="flooer_room[]">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<div class="form-group">
																	<label>describe</label>
																	<input type="text" class="form-control" required
																		name="flooer_describe[]">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<div class="form-group">
																	<label>image</label>
																	<input type="file" class="form-control"
																		accept="image/*" required name="flooer_image[]">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="add-more">
												<a href="javascript:void(0);" class="add-education"><i
														class="fa fa-plus-circle"></i> Add More</a>
											</div>
										</div>
									</div>
								</div>


							</div>
							<button type="submit" class="btn btn-primary" id="id-form1">
								Update info
							</button>

						</form>
					</div>


					<!-- /Personal Details -->


					<!-- /Personal Details Tab -->




				</div>
			</div>

		</div>
	</div>
	<!-- /Page Wrapper -->


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