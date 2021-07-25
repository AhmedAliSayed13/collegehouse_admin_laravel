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
	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">

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
							<li class="steps-timeline__step  steps-timeline__step--current" ><span
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

						<form method="POST" action="{{route('step1-save')}}" >
							{{ csrf_field() }}
							<div class="row">




								<div class="col-md-6">
									<div class="form-group">
										<label>First Name:</label>
										<input id="first_name" required type="text" placeholder="First Name"
											class="form-control @error('first_name') is-invalid @enderror"
											name="first_name" value="{{ old('first_name',$application->first_name) }}" autocomplete="first_name"
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
										<input id="last_name" required type="text" placeholder="Last Name"
											class="form-control @error('last_name') is-invalid @enderror"
											name="last_name" value="{{ old('last_name',$application->last_name) }}" autocomplete="last_name"
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
										<select id="gender_id" required
											class=" form-control @error('gender_id') is-invalid @enderror"
											name="gender_id" value="{{ old('gender_id') }}" autocomplete="gender_id"
											autofocus>
											<option value="">Select Gender</option>
											@foreach ($genders as $gender)
											<option value="{{$gender->id}}"
												{{ option_select(old("gender_id",$application->gender_id) , $gender->id )}}>{{$gender->name}}
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
										<input id="email" placeholder="email" type="email" required
											class="form-control @error('email') is-invalid @enderror"
											name="email" value="{{ old('email',$application->email) }}" autocomplete="email"
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
										<input id="birthday" placeholder="Birthday" type="date" required
											class="form-control @error('birthday') is-invalid @enderror"
											name="birthday" value="{{ old('birthday',$application->birthday) }}"
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
										<input id="phone"  type="text" placeholder="Phone" required
											class="form-control @error('phone') is-invalid @enderror"
											name="phone" value="{{ old('phone',$application->phone) }}"
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
										<input id="ssn"  type="text" placeholder="ssn" required
											class="form-control @error('ssn') is-invalid @enderror"
											name="ssn" value="{{ old('ssn',$application->ssn) }}"
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
									<textarea id="address1" class="form-control @error('address1') is-invalid @enderror" required
										name="address1" autocomplete="address1" autofocus>
												{{ old('address1',$application->address1) }}
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
									<textarea id="address2" class="form-control @error('address2') is-invalid @enderror" required
										name="address2" autocomplete="address2" autofocus>
												{{ old('address2',$application->address2) }}
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
											name="city_id"  autocomplete="city_id" required
											autofocus>
											<option value="">Select City</option>
											@foreach ($citys as $city)
											<option value="{{$city->id}}"
												{{ option_select(old("city_id",$application->city_id) , $city->id )}}>{{$city->name}}
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
											name="state_id"  autocomplete="state_id" required
											autofocus>
											<option value="">Select City</option>
											@foreach ($states as $state)
											<option value="{{$state->id}}"
												{{ option_select(old("state_id",$application->state_id) , $state->id )}}>{{$state->name}}
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
											class="form-control @error('zip') is-invalid @enderror" required
											name="zip" value="{{ old('zip',$application->zip) }}" autocomplete="zip"
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
											name="house_type_id"  autocomplete="house_type_id" required
											autofocus>
											<option value="">Select Housing Type</option>
											@foreach ($house_types as $house_type)
											<option value="{{$house_type->id}}"
												{{ option_select(old("house_type_id",$application->house_type_id) , $house_type->id )}}>{{$house_type->name}}
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

								<div class="col-md-12  group_house_field">
									<div class="form-group">
										<label>Requested Property For Rent:</label>
										<select id="requested_houses" class=" form-control @error('requested_houses') is-invalid @enderror"
											name="requested_houses"  autocomplete="requested_houses" required
											autofocus >
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

								<div class="col-md-12 group_house_field">
									<h4 class="d-block mt-4">Group Members:</h4>
								</div>

								<div class="col-md-12 group_house_field">
									<div class="form-group">
										<label>Group lead name:</label>
										<input id="group_lead_name" placeholder="Group lead name" type="text" required
											class="form-control @error('group_lead_name') is-invalid @enderror"
											name="group_lead_name" value="{{ old('group_lead_name',$application->group_lead_name) }}" autocomplete="group_lead_name"
											autofocus>
										@error('group_lead_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								
								

								<!-- <div class="col-md-12 group_house_field">
									<div class="form-group">
									
									<div class="add-more  ml-4">
										<a href="javascript:void(0);" class="add-rental"><i class="fa fa-plus-circle"></i>
											Add More
											</a>
									</div>
									
									</div>
								</div> -->

								<div class="col-md-6 group_house_field">
									<div class="form-group">
										<label>Group member email (1):</label>
										<input id="group_member_email_1" placeholder="Group member email (1)" type="email"
											class="form-control @error('group_member_email_1') is-invalid @enderror"
											name="group_member_email_1" value="{{ $application->group_member_email_1 }}" autocomplete="group_member_email_1"
											autofocus>
										@error('group_member_email_1')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 group_house_field">
									<div class="form-group">
										<label>Group member email (2):</label>
										<input id="group_member_email_2" placeholder="Group member email (2)" type="email"
											class="form-control @error('group_member_email_2') is-invalid @enderror"
											name="group_member_email_2" value="{{ old('group_member_email_2',$application->group_member_email_2) }}" autocomplete="group_member_email_2"
											autofocus>
										@error('group_member_email_2')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>


								<div class="col-md-6 group_house_field">
									<div class="form-group">
										<label>Group member email (3):</label>
										<input id="group_member_email_3" placeholder="Group member email (3)" type="email"
											class="form-control @error('group_member_email_3') is-invalid @enderror"
											name="group_member_email_3" value="{{ old('group_member_email_3',$application->group_member_email_3) }}" autocomplete="group_member_email_3"
											autofocus>
										@error('group_member_email_3')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 group_house_field">
									<div class="form-group">
										<label>Group member email (4):</label>
										<input id="group_member_email_4" placeholder="Group member email (4)" type="email"
											class="form-control @error('group_member_email_4') is-invalid @enderror"
											name="group_member_email_4" value="{{ old('group_member_email_4',$application->group_member_email_4) }}" autocomplete="group_member_email_4"
											autofocus>
										@error('group_member_email_4')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								

								
								

								<div class="col-md-12 boarding_house_field">
									<div class="form-group">
										<label>Requested Property For Rent:</label>
										<select id="requested_houses"
											class=" form-control @error('requested_houses') is-invalid @enderror" 
											name="requested_houses"  autocomplete="requested_houses"
											autofocus >
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

								<div class="col-md-6 boarding_house_field">
									<div class="form-group">
										<label>Room Number:</label>
										<select id="room_id"
											class="form-control @error('room_id') is-invalid @enderror" 
											name="room_id"  autocomplete="room_id"
											autofocus>

											
											@foreach ($rooms as $room)
											<option value="{{$room->id}}"
												{{ option_select(old("room_id",$application->room_id) , $room->id )}}>{{$room->number}}
											</option>
											@endforeach
										</select>
										@error('room_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 boarding_house_field">
									<div class="form-group">
										<label>Room Type:</label>
										<select id="room_type_id"
											class="form-control @error('room_type_id') is-invalid @enderror" 
											name="room_type_id"  autocomplete="room_type_id"
											autofocus>

											
											@foreach ($room_types as $room_type)
											<option value="{{$room_type->id}}"
												{{ option_select(old("room_type_id",$application->room_type_id) , $room_type->id )}}>{{$room_type->name}}
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
									<h4 class="d-block mt-4">Estimated amount you are prepared to pay per person (without utilities):</h4>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
									<label>Estimated amount to pay in dollars</label>
										<input id="amount_pay_dollars" placeholder="Estimated amount to pay in dollars" type="number"
											class="form-control @error('amount_pay_dollars') is-invalid @enderror" required
											name="amount_pay_dollars" value="{{ old('amount_pay_dollars',$application->amount_pay_dollars) }}" autocomplete="amount_pay_dollars"
											autofocus>
										@error('amount_pay_dollars')
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
											class=" form-control @error('bringing_Car') is-invalid @enderror" required
											name="bringing_Car"  autocomplete="bringing_Car"
											autofocus>
											
											<option {{ option_select(old("bringing_Car",$application->bringing_Car) , 0 )}} value="0"  >No</option>
											<option {{ option_select(old("bringing_Car",$application->bringing_Car) , 1 )}} value="1"  >Yes</option>
										</select>
										@error('bringing_Car')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>

								<div class="col-md-6 car_field">
									<div class="form-group">
									<label>Car Make:</label>
										<input id="car_make" placeholder="Car Make" type="text"
											class="form-control @error('car_make') is-invalid @enderror" 
											name="car_make" value="{{ old('car_make',$application->car_make) }}"
											autocomplete="car_make" autofocus>
										@error('car_make')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 car_field">
									<div class="form-group">
									<label>Car Model:</label>
										<input id="car_model" placeholder="Car Model" type="text"
											class="form-control @error('car_model') is-invalid @enderror" 
											name="car_model" value="{{ old('car_model',$application->car_model) }}"
											autocomplete="car_model" autofocus>
										@error('car_model')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 car_field">
									<div class="form-group">
									<label>Car license plate number:</label>
										<input id="driver_license_number" placeholder="Car license plate number" type="text" 
											class="form-control @error('driver_license_number') is-invalid @enderror"
											name="driver_license_number" value="{{ old('driver_license_number',$application->driver_license_number) }}"
											autocomplete="driver_license_number" autofocus>
										@error('driver_license_number')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6 car_field">
									<div class="form-group">
									<label>Drivers license number:</label>
										<input id="car_license_number" placeholder="Drivers license number" type="text" 
											class="form-control @error('car_license_number') is-invalid @enderror"
											name="car_license_number" value="{{ old('car_license_number',$application->car_license_number) }}"
											autocomplete="car_license_number" autofocus>
										@error('car_license_number')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>



								

								
								<div class="col-md-6">
									<div class="form-group">
									<label>School:</label>
										<input id="school" placeholder="school" type="text" required
											class="form-control @error('school') is-invalid @enderror"
											name="school" value="{{ old('school',$application->school) }}"
											autocomplete="school" autofocus>
										@error('school')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<label>Major:</label>
										<input id="major" placeholder="major" type="text" required
											class="form-control @error('major') is-invalid @enderror"
											name="major" value="{{ old('major',$application->major) }}"
											autocomplete="major" autofocus>
										@error('major')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<label>Graduation Year:</label>
										<input id="graduation_year" placeholder="Graduation Year" type="text" required
											class="form-control @error('graduation_year') is-invalid @enderror"
											name="graduation_year" value="{{ old('graduation_year',$application->graduation_year) }}"
											autocomplete="graduation_year" autofocus>
										@error('graduation_year')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<label>GPA:</label>
										<input id="gpa" placeholder="GPA" type="number" required
											class="form-control @error('gpa') is-invalid @enderror"
											name="gpa" value="{{ old('gpa',$application->gpa) }}"
											autocomplete="gpa" autofocus>
										@error('gpa')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Chapters:</label>
										<select id="chapter_id"
											class="form-control @error('chapter_id') is-invalid @enderror" required
											name="chapter_id"  autocomplete="chapter_id"
											autofocus>

											
											@foreach ($chapters as $chapter)
											<option value="{{$chapter->id}}"
												{{ option_select(old("chapter_id",$application->chapter_id) , $chapter->id )}}>{{$chapter->name}}
											</option>
											@endforeach
										</select>
										@error('chapter_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Preferred payment schedule:</label>
										<select id="payment_method_id"
											class="form-control @error('payment_method_id') is-invalid @enderror" required
											name="payment_method_id"  autocomplete="payment_method_id"
											autofocus>

											
											@foreach ($payment_methods as $payment_method)
											<option value="{{$payment_method->id}}"
												{{ option_select(old("payment_method_id",$application->payment_method_id) , $payment_method->id )}}>{{$payment_method->name}}
											</option>
											@endforeach
										</select>
										@error('payment_method_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Who is paying the rent ?</label>
										<select id="paying_rent_id"
											class="form-control @error('paying_rent_id') is-invalid @enderror" required
											name="paying_rent_id"  autocomplete="paying_rent_id"
											autofocus>

											
											@foreach ($paying_rents as $paying_rent)
											<option value="{{$paying_rent->id}}"
												{{ option_select(old("paying_rent_id",$application->paying_rent_id) , $paying_rent->id )}}>{{$paying_rent->name}}
											</option>
											@endforeach
										</select>
										@error('paying_rent_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-md-12">
									<h6>
									It is so important that you register to vote in Collage Park (it will make a difference for YOU and future Terps). Pass this on to everyone you know - this CAN really make a difference for YOU living in College Park. Are you willing to register to vote?
									</h6>
								</div>

								<div class="col-md-12">
									<div class="form-group">
									<div class="form-check form-check-inline">
										<input   @if($application->register_vote==1) checked @endif class="form-check-input @error('register_vote') is-invalid @enderror" type="radio" name="register_vote" id="vote_yes" value="1"  required>
										<label class="form-check-label" for="vote_yes">
										Yes
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input   @if($application->register_vote==0) checked @endif  class="form-check-input @error('register_vote') is-invalid @enderror" type="radio" name="register_vote" id="vote_no" value="0" required>
										<label class="form-check-label" for="vote_no">
										No
										</label>
									</div>
									@error('register_vote')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
										
										
									</div>
								</div>


								
								<div class="col-lg-12 float-right">
									<button type="submit" class="btn btn-primary float-right" id="id-form1">
										Next
									</button>
								</div>

							</div>
							
								
							

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
	<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script>
		value_house_type=$('#house_type_id').val();
		if(value_house_type==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();

			$(".boarding_house_field").attr("required", false);
			$(".group_house_field").attr("required", true);
		}else if(value_house_type==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();
			$(".boarding_house_field").attr("required", true);
			$(".group_house_field").attr("required", false);
		}else{
			$('.group_house_field').hide();
			$('.boarding_house_field').hide();
			$(".boarding_house_field").attr("required", false);
			$(".group_house_field").attr("required", false);
		}


	$('#house_type_id').on('change', function() {
		value=$(this).val();
		if(value==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
			$(".boarding_house_field").attr("required", false);
			$(".group_house_field").attr("required", true);
		}else if(value==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();

			$(".boarding_house_field").attr("required", true);
			$(".group_house_field").attr("required", false);
		}
	});
	</script>
	<script>
		value_house_type=$('#house_type_id').val();
		if(value_house_type==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
			$(".boarding_house_field").attr("required", false);
			$(".group_house_field").attr("required", true);
		}else if(value_house_type==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();

			$(".boarding_house_field").attr("required", true);
			$(".group_house_field").attr("required", false);
		}else{
			$('.group_house_field').hide();
			$('.boarding_house_field').hide();
			$(".boarding_house_field").attr("required", false);
			$(".group_house_field").attr("required", false);
		}


	$('#house_type_id').on('change', function() {
		value=$(this).val();
		if(value==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
			$('.boarding_house_field input').val();
			$('.boarding_house_field select').val();
			$(".boarding_house_field input").attr("required", false);
			$(".boarding_house_field select").attr("required", false);
			$(".group_house_field select").attr("required", true);
			$(".group_house_field input").attr("required", true);
		}else if(value==2){
			
			$('.group_house_field').hide();
			$('.group_house_field input').val('');
			$('.group_house_field select').val('');
			$('.boarding_house_field').show();

			$(".boarding_house_field input").attr("required", true);
			$(".boarding_house_field select").attr("required", true);
			$(".group_house_field select").attr("required", false);
			$(".group_house_field input").attr("required", false);
		}
	});
	</script>

	<script>
		bringing_Car=$('#bringing_Car').val();
		if(bringing_Car==1){
			$('.car_field').show();
			$(".car_field input").attr("required", true);
			$(".car_field select").attr("required", true);
		}else{
			$('.car_field').hide();
			$('.car_field input').val('');
			$('.car_field select').val('');
			$(".car_field select").attr("required", false);
			$(".car_field input").attr("required", false);
		}
		$('#bringing_Car').on('change', function() {
			value=$(this).val();
			if(value==1){
				$(".car_field select").attr("required", false);
				$(".car_field input").attr("required", false);
				$('.car_field').show();
			}else{
				$('.car_field').hide();
				$('.car_field input').val('');
				$(".car_field input").attr("required", true);
				$(".car_field select").attr("required", true);
				$('.car_field select').val('');
				
			}
		});
	</script>
	<script>
		$('document').ready(function()
		{
			$('textarea').each(function(){
					value=$(this).val();
					if(value.length > 0)
						$(this).val($(this).val().trim());
					}
				);
		});
	</script>






<script>
		$(".rental-info").on('click','.trash', function () {
			$(this).closest('.rental-cont').remove();
			return false;
    	});

    $(".add-rental").on('click', function () {
		
		
									
										
										
									
		
		var rentalcontent ='<div class="col-md-12 form-row rental-cont">' +
		 '<div class="col-md-5 group_house_field">' +
		'<div class="form-group">'+
		'<label>Group member name :</label>'+
		'<input id="group_member_name" required placeholder="Group member name " type="text" class="form-control @error('group_member_name') is-invalid @enderror" name="group_member_name[]"  autocomplete="group_member_name" autofocus>'+
		'</div>'+
		'</div>'+

		
									
		'<div class="col-md-5 group_house_field">'+
		'<div class="form-group">'+
		'<label>Group Email:</label>'+
		'<input id="group_member_email" required placeholder="Group member Email" type="email" class="form-control " name="group_member_email[]"  autocomplete="group_member_email" autofocus>'+
		'</div>'+
		'</div>'+
		'<div class="col-12 col-md-2 mb-2 group_house_field "><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="fa fa-trash"></i></a></div>' +
		'</div>'
		;
		
        $(".rental-info").append(rentalcontent);
        return false;
		
    });

	</script>



</body>

</html>