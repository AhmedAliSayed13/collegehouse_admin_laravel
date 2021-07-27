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
							<li class="steps-timeline__step  steps-timeline__step--done"><span
									class="step-text">Applicant Information</span></li>
							<li class="steps-timeline__step steps-timeline__step--current "><span class="step-text">Guarantors</span></li>
							<li class="steps-timeline__step"><span class="step-text">Rental History</span></li>
							<li class="steps-timeline__step"><span class="step-text">Employment</span></li>
							<li class="steps-timeline__step"><span class="step-text">Terms and Conditions</span></li>
							<li class="steps-timeline__step"><span class="step-text">Preview Submission</span></li>
						</ol>
					</div>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-step-form">
						<header class="step-form-header">Guarantors</header>
						<p class="step-form-decs">Your guarantors are financially responsible for any outstanding payments under the terms of your lease in case you were unable to pay. All guarantors listed will be contacted automatically for confirmation. Please list your guarantors and provide valid email addresses for them.</p>

						<form method="POST" action="{{route('step2-save')}}" >
							{{ csrf_field() }}
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p>
												Both parents are required to sign the guaranty. Is there any problems with that?
											</p>
											<div class="form-check form-check-inline">
												<input class="form-check-input @error('both_parents_signing') is-invalid @enderror"    type="radio" {{ (old("both_parents_signing", $application->both_parents_signing)==1)?'checked':''}} name="both_parents_signing" id="vote_yes" value="1" >
												<label class="form-check-label" for="vote_yes">
													Yes 
												</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input @error('both_parents_signing') is-invalid @enderror" type="radio"  name="both_parents_signing" id="vote_no" {{ (old("both_parents_signing", $application->both_parents_signing)==0)?'checked':''}} value="0">
												<label class="form-check-label" for="vote_no">
													No 
												</label>
											</div>
											@error('both_parents_signing')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="col-md-12" id="reason_sign_parent_id-div">
										<div class="form-group">
											<label>If yes, please note reason:</label>
											<select id="reason_sign_parent_id"
												class=" form-control @error('reason_sign_parent_id') is-invalid @enderror"
												name="reason_sign_parent_id"  autocomplete="reason_sign_parent_id"
												autofocus>
												<option value="">Select Reason</option>
												@foreach ($reason_sign_parents as $reason_sign_parent)
												<option value="{{$reason_sign_parent->id}}"
													{{ option_select(old("reason_sign_parent_id",$application->reason_sign_parent_id) ,$reason_sign_parent->id  )}}>{{$reason_sign_parent->name}}
												</option>
												@endforeach
											</select>
											@error('reason_sign_parent_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>

									<div class="col-md-12" id='other-div'>
										<div class="form-group">
											<label>Other:</label>
											<input id="parents_sign_not_other_reasons" placeholder="Other" type="text"
												class="form-control @error('parents_sign_not_other_reasons') is-invalid @enderror"
												name="parents_sign_not_other_reasons" value="{{ old('parents_sign_not_other_reasons',$application->parents_sign_not_other_reasons) }}" autocomplete="group_member_name_4"
												autofocus>
											@error('parents_sign_not_other_reasons')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>


									<div class="col-md-12">
										<h4 class="d-block mt-4">Parent 1 Information:</h4>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input id="first_name" type="text" placeholder="First Name"
												class="form-control @error('first_name') is-invalid @enderror"
												name="first_name" value="{{ old('first_name',$parent_information_1->first_name) }}" autocomplete="first_name"
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
												name="last_name" value="{{ old('last_name',$parent_information_1->last_name) }}" autocomplete="last_name"
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
										<label>Address 1</label>
										<textarea id="address1" class="form-control @error('address1') is-invalid @enderror"
											name="address1" autocomplete="address1" autofocus>
													{{ old('address1',$parent_information_1->address1) }}
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
													{{ old('address2',$parent_information_1->address2) }}
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
													{{ option_select(old("city_id",$parent_information_1->city_id) , $city->id )}}>{{$city->name}}
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
													{{ option_select(old("state_id",$parent_information_1->state_id) , $state->id )}}>{{$state->name}}
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
												name="zip" value="{{ old('zip',$parent_information_1->zip) }}" autocomplete="zip"
												autofocus>
											@error('zip')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>




									<div class="col-md-6">
										<div class="form-group">
											<label>Phone:</label>
											<input id="phone" type="text" placeholder="Phone"
												class="form-control @error('phone') is-invalid @enderror"
												name="phone" value="{{ old('phone',$parent_information_1->phone) }}" autocomplete="phone"
												autofocus>
												@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Email:</label>
											<input id="email" type="email" placeholder="email"
												class="form-control @error('email') is-invalid @enderror"
												name="email" value="{{ old('email',$parent_information_1->email) }}" autocomplete="email"
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
											<label>Place of employment:</label>
											<input id="place_employment" type="text" placeholder="Place of employment"
												class="form-control @error('place_employment') is-invalid @enderror"
												name="place_employment" value="{{ old('place_employment',$parent_information_1->place_employment) }}" autocomplete="first_name"
												autofocus>
												@error('place_employment')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>position:</label>
											<input id="position" type="text" placeholder="position"
												class="form-control @error('position') is-invalid @enderror"
												name="position" value="{{ old('position',$parent_information_1->position) }}" autocomplete="position"
												autofocus>
												@error('position')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>




									<div class="col-md-12">
										<h4 class="d-block mt-4">Parent 2 Information:</h4>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input id="first_name_2" type="text" placeholder="First Name"
												class="form-control @error('first_name_2') is-invalid @enderror"
												name="first_name_2" value="{{ old('first_name_2',$parent_information_2->first_name) }}" autocomplete="first_name_2"
												autofocus>
												@error('first_name_2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name:</label>
											<input id="last_name_2" type="text" placeholder="Last Name"
												class="form-control @error('last_name_2') is-invalid @enderror"
												name="last_name_2" value="{{ old('last_name_2',$parent_information_2->last_name) }}" autocomplete="last_name_2"
												autofocus>
												@error('last_name_2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										<label>Address 1</label>
										<textarea id="address1_2" class="form-control @error('address1_2') is-invalid @enderror"
											name="address1_2" autocomplete="address1_2" autofocus>
													{{ old('address1_2',$parent_information_2->address1) }}
													</textarea>
											@error('address1_2')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
										<label>Address 2</label>
										<textarea id="address2_2" class="form-control @error('address2_2') is-invalid @enderror"
											name="address2_2" autocomplete="address2_2" autofocus>
													{{ old('address2_2',$parent_information_2->address2) }}
													</textarea>
											@error('address2_2')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<label>City:</label>
											<select id="city_id_2"
												class=" form-control @error('city_id_2') is-invalid @enderror"
												name="city_id_2"  autocomplete="city_id_2"
												autofocus>
												<option value="">Select City</option>
												@foreach ($citys as $city)
												<option value="{{$city->id}}"
													{{ option_select(old("city_id_2",$parent_information_2->city_id) , $city->id )}}>{{$city->name}}
												</option>
												@endforeach
											</select>
											@error('city_id_2')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>State:</label>
											<select id="state_id_2"
												class=" form-control @error('state_id_2') is-invalid @enderror"
												name="state_id_2"  autocomplete="state_id_2"
												autofocus>
												<option value="">Select State</option>
												@foreach ($states as $state)
												<option value="{{$state->id}}"
													{{ option_select(old("state_id",$parent_information_2->state_id) , $state->id )}}>{{$state->name}}
												</option>
												@endforeach
											</select>
											@error('state_id_2')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Zip Code:</label>
											<input id="zip_2" placeholder="Zip Code" type="text"
												class="form-control @error('zip_2') is-invalid @enderror"
												name="zip_2" value="{{ old('zip_2',$parent_information_2->zip) }}" autocomplete="zip_2"
												autofocus>
											@error('zip_2')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label>Phone:</label>
											<input id="phone_2" type="text" placeholder="Phone"
												class="form-control @error('phone_2') is-invalid @enderror"
												name="phone_2" value="{{ old('phone_2',$parent_information_1->phone) }}" autocomplete="phone_2"
												autofocus>
												@error('phone_2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Email:</label>
											<input id="email_2" type="email" placeholder="email"
												class="form-control @error('email_2') is-invalid @enderror"
												name="email_2" value="{{ old('email_2',$parent_information_1->email) }}" autocomplete="email_2"
												autofocus>
												@error('email_2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label>Place of employment:</label>
											<input id="place_employment_2" type="text" placeholder="Place of employment"
												class="form-control @error('place_employment_2') is-invalid @enderror"
												name="place_employment_2" value="{{ old('place_employment_2',$parent_information_2->place_employment) }}" autocomplete="place_employment_2"
												autofocus>
												@error('place_employment_2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>position:</label>
											<input id="position_2" type="text" placeholder="position"
												class="form-control @error('position_2') is-invalid @enderror"
												name="position_2" value="{{ old('position_2',$parent_information_2->position) }}" autocomplete="position_2"
												autofocus>
												@error('position_2')
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
									<a href="{{route('step1')}}" class="btn btn-primary float-left" >
									Previous
									</a>
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

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>
	
	<script>
		parents_sign_not=$('input[name="both_parents_signing"]:checked').val();
		reason_sign_parent_id=$('#reason_sign_parent_id').val();

		
		if(parents_sign_not=="1"){
			$('#reason_sign_parent_id-div').show();	
			if(reason_sign_parent_id==4){
				$('#other-div').show();	
			}else{
				$('#other-div').hide();
			}
		}else if(parents_sign_not=="0"){
			$('#other-div').hide();
			$('#reason_sign_parent_id-div').hide();
			$('#parents_sign_not_other_reasons').val('');
		}

		
		


	$('input[type="radio"]').on('change', function() {
		
		value=$(this).val();
		
		if(value=="1"){
			$('#reason_sign_parent_id-div').show();
			if(reason_sign_parent_id==4){
				$('#other-div').show();	
			}
			
		}else{
			
			$('#reason_sign_parent_id-div').hide();
			$('#other-div').hide();
			$('#reason_sign_parent_id-div').prop("selectedIndex", 0);
			$('#parents_sign_not_other_reasons').val('');
			
		}
	});
	
	


	$('#reason_sign_parent_id').on('change', function() {
		
		value=$(this).val();
		
		if(value==4){
			$('#other-div').show();
			
		}else{
			
			
			$('#other-div').hide();
			
			$('#parents_sign_not_other_reasons').val('');
			
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

</body>

</html>