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
							<li class="steps-timeline__step  "><span
									class="step-text">Applicant Information</span></li>
							<li class="steps-timeline__step steps-timeline__step--current"><span class="step-text">Guarantors</span></li>
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


								
								

								<div class="col-md-6 car_field">
									<div class="form-group">
									<label>Car Make:</label>
										<input id="car_make" placeholder="Car Make" type="text"
											class="form-control @error('car_make') is-invalid @enderror"
											name="car_make" value="{{ old('car_make') }}"
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
											name="car_model" value="{{ old('car_model') }}"
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
											name="driver_license_number" value="{{ old('driver_license_number') }}"
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
											name="car_license_number" value="{{ old('car_license_number') }}"
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
										<input id="school" placeholder="school" type="text"
											class="form-control @error('school') is-invalid @enderror"
											name="school" value="{{ old('school') }}"
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
										<input id="major" placeholder="major" type="text"
											class="form-control @error('major') is-invalid @enderror"
											name="major" value="{{ old('major') }}"
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
										<input id="graduation_year" placeholder="Graduation Year" type="text"
											class="form-control @error('graduation_year') is-invalid @enderror"
											name="graduation_year" value="{{ old('graduation_year') }}"
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
										<input id="gpa" placeholder="GPA" type="number"
											class="form-control @error('gpa') is-invalid @enderror"
											name="gpa" value="{{ old('gpa') }}"
											autocomplete="gpa" autofocus>
										@error('gpa')
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
										<input class="form-check-input" type="radio" name="register_vote" id="vote_yes" value="1" checked="">
										<label class="form-check-label" for="vote_yes">
										Yes
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="register_vote" id="vote_no" value="0">
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
	<script>
		value_house_type=$('#house_type_id').val();
		if(value_house_type==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
		}else if(value_house_type==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();
		}else{
			$('.group_house_field').hide();
			$('.boarding_house_field').hide();
		}


	$('#house_type_id').on('change', function() {
		value=$(this).val();
		if(value==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
		}else if(value==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();
		}
	});
	</script>
	<script>
		value_house_type=$('#house_type_id').val();
		if(value_house_type==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
		}else if(value_house_type==2){
			
			$('.group_house_field').hide();
			$('.boarding_house_field').show();
		}else{
			$('.group_house_field').hide();
			$('.boarding_house_field').hide();
		}


	$('#house_type_id').on('change', function() {
		value=$(this).val();
		if(value==1){
			$('.group_house_field').show();
			$('.boarding_house_field').hide();
			$('.boarding_house_field input').val();
			$('.boarding_house_field select').val();
		}else if(value==2){
			
			$('.group_house_field').hide();
			$('.group_house_field input').val('');
			$('.group_house_field select').val('');
			$('.boarding_house_field').show();
		}
	});
	</script>

<script>
		bringing_Car=$('#bringing_Car').val('');
		if(bringing_Car==1){
			$('.car_field').show();
		}else{
			$('.car_field').hide();
			$('.car_field input').val('');
			$('.car_field select').val('');
		}


	$('#bringing_Car').on('change', function() {
		value=$(this).val();
		if(value==1){
			$('.car_field').show();
			
		}else{
			$('.car_field').hide();
			$('.car_field input').val('');
			$('.car_field select').val('');
		}
	});
	</script>
	






</body>

</html>