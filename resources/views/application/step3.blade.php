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
							<li class="steps-timeline__step  steps-timeline__step--done"><span class="step-text">Guarantors</span></li>
							<li class="steps-timeline__step steps-timeline__step--current"><span class="step-text">Rental History</span></li>
							<li class="steps-timeline__step"><span class="step-text">Employment</span></li>
							<li class="steps-timeline__step"><span class="step-text">Terms and Conditions</span></li>
							<li class="steps-timeline__step"><span class="step-text">Preview Submission</span></li>
						</ol>
					</div>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-step-form">
						<header class="step-form-header">Rental History</header>
						<p class="step-form-decs">
						Your rental history is used to determine your eligibility for renting with us. A good rental history increases your chances of approval.


						</p>

						<form method="POST" action="{{route('step3-save')}}" >
							{{ csrf_field() }}
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p>
											Do you have any Rental history?
											</p>
											<div class="form-check form-check-inline">
												<input required {{ option_radio(old("have_rental_history" , $application->have_rental_history),1)}} class="form-check-input @error('have_rental_history') is-invalid @enderror"    type="radio"  name="have_rental_history" id="vote_yes" value="1" >
												<label class="form-check-label" for="vote_yes">
													Yes
												</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input @error('have_rental_history') is-invalid @enderror" {{ option_radio(old("have_rental_history" , $application->have_rental_history),0)}} type="radio"  name="have_rental_history" id="vote_no"  value="0">
												<label class="form-check-label" for="vote_no">
													No
												</label>
											</div>
											@error('have_rental_history')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>


									@if(!empty($rental_histories))
											@foreach($rental_histories as $rental_history )
													<div class="col-md-12">
														<h4 class="d-block mt-4">Rental Address:</h4>
													</div>
													<div class="col-md-6">
														<div class="form-group">
														<label>Address 1</label>
														<textarea id="address1"  required class="form-control @error('address1') is-invalid @enderror"
															name="address1[]" autocomplete="address1" autofocus>{{ old('address1',$rental_history->address1) }}</textarea>
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
														<textarea id="address2" required class="form-control @error('address2') is-invalid @enderror"
															name="address2[]" autocomplete="address2" autofocus>
																	{{ old('address2',$rental_history->address2) }}
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
															<select id="city_id" required
																class=" form-control @error('city_id') is-invalid @enderror"
																name="city_id[]"  autocomplete="city_id"
																autofocus>
																<option value="">Select City</option>
																@foreach ($citys as $city)
																<option value="{{$city->id}}"
																	{{ option_select(old("city_id",$rental_history->city_id) , $city->id )}}>{{$city->name}}
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
															<select id="state_id" required
																class=" form-control @error('state_id') is-invalid @enderror"
																name="state_id[]"  autocomplete="state_id"
																autofocus>
																<option value="">Select City</option>
																@foreach ($states as $state)
																<option value="{{$state->id}}"
																	{{ option_select(old("state_id",$rental_history->state_id) , $state->id )}}>{{$state->name}}
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
															<input id="zip" placeholder="Zip Code" type="text" required
																class="form-control @error('zip') is-invalid @enderror"
																name="zip[]" value="{{ old('zip',$rental_history->zip) }}" autocomplete="zip"
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
															<label>Rental Date:</label>
															<input id="rental_date" type="date" placeholder="rental_date" required
																class="form-control @error('rental_date') is-invalid @enderror"
																name="rental_date[]" value="{{ old('rental_date',$rental_history->rental_date) }}" autocomplete="rental_date"
																autofocus>
																@error('rental_date')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label>Monthly rent:</label>
															<input id="monthly_rent" type="number" placeholder="monthly_rent" required
																class="form-control @error('monthly_rent') is-invalid @enderror"
																name="monthly_rent[]" value="{{ old('monthly_rent',$rental_history->monthly_rent) }}" autocomplete="monthly_rent"
																autofocus>
																@error('monthly_rent')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

														</div>
													</div>

													 
								<div class="col-md-12">
										<div class="form-group">
											<label>Reason For Leaving:</label>
											<input id="reason_leaving" type="text" placeholder="reason_leaving" required
												class="form-control @error('reason_leaving') is-invalid @enderror"
												name="reason_leaving[]" value="{{ old('reason_leaving',$rental_history->reason_leaving) }}" autocomplete="reason_leaving"
												autofocus>
												@error('reason_leaving')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>
									
													
												
											
									
									
									
									
									
									
									
									
									
									
									


									

									

									
									<div class="col-md-12">
										<h4 class="d-block mt-4">Landlord Information:</h4>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input id="first_name" type="text" placeholder="First Name" required
												class="form-control @error('first_name') is-invalid @enderror"
												name="first_name[]" value="{{ old('first_name',$rental_history->first_name) }}" autocomplete="first_name"
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
											<input id="last_name" type="text" placeholder="Last Name" required
												class="form-control @error('last_name') is-invalid @enderror"
												name="last_name[]" value="{{ old('last_name',$rental_history->last_name) }}" autocomplete="last_name"
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
											<label>Phone:</label>
											<input id="phone" type="text" placeholder="phone" required
												class="form-control @error('phone') is-invalid @enderror"
												name="phone[]" value="{{ old('phone',$rental_history->phone) }}" autocomplete="phone"
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
											<input id="email" type="email" placeholder="email" required
												class="form-control @error('email') is-invalid @enderror"
												name="email[]" value="{{ old('email',$rental_history->email) }}" autocomplete="email"
												autofocus>
												@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>

											@endforeach

										@else
										<div class="col-md-12">
											<h4 class="d-block mt-4">Rental Address:</h4>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											<label>Address 1</label>
											<textarea id="address1"  required class="form-control @error('address1') is-invalid @enderror"
												name="address1[]" autocomplete="address1" autofocus>
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
											<textarea id="address2" required class="form-control @error('address2') is-invalid @enderror"
												name="address2[]" autocomplete="address2" autofocus>
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
												<select id="city_id" required
													class=" form-control @error('city_id') is-invalid @enderror"
													name="city_id[]"  autocomplete="city_id"
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
												<select id="state_id" required
													class=" form-control @error('state_id') is-invalid @enderror"
													name="state_id[]"  autocomplete="state_id"
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
												<input id="zip" placeholder="Zip Code" type="text" required
													class="form-control @error('zip') is-invalid @enderror"
													name="zip[]" value="{{ old('zip') }}" autocomplete="zip"
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
												<label>Rental Date:</label>
												<input id="rental_date" type="date" placeholder="rental_date" required
													class="form-control @error('rental_date') is-invalid @enderror"
													name="rental_date[]" value="{{ old('rental_date') }}" autocomplete="rental_date"
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
												<label>Monthly rent:</label>
												<input id="monthly_rent" type="number" placeholder="monthly_rent" required
													class="form-control @error('monthly_rent') is-invalid @enderror"
													name="monthly_rent[]" value="{{ old('monthly_rent') }}" autocomplete="monthly_rent"
													autofocus>
													@error('monthly_rent')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror

											</div>
										</div>

										 
								<div class="col-md-12">
										<div class="form-group">
											<label>Reason For Leaving:</label>
											<input id="reason_leaving" type="text" placeholder="reason_leaving" required
												class="form-control @error('reason_leaving') is-invalid @enderror"
												name="reason_leaving[]" value="{{ old('reason_leaving') }}" autocomplete="reason_leaving"
												autofocus>
												@error('reason_leaving')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>
									
													
												
											
									
									
									
									
									
									
									
									
									
									
									


									

									

									
									<div class="col-md-12">
										<h4 class="d-block mt-4">Landlord Information:</h4>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input id="first_name" type="text" placeholder="First Name" required
												class="form-control @error('first_name') is-invalid @enderror"
												name="first_name[]" value="{{ old('first_name') }}" autocomplete="first_name"
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
											<input id="last_name" type="text" placeholder="Last Name" required
												class="form-control @error('last_name') is-invalid @enderror"
												name="last_name[]" value="{{ old('last_name') }}" autocomplete="last_name"
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
											<label>Phone:</label>
											<input id="phone" type="text" placeholder="phone" required
												class="form-control @error('phone') is-invalid @enderror"
												name="phone[]" value="{{ old('phone') }}" autocomplete="phone"
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
											<input id="email" type="email" placeholder="email" required
												class="form-control @error('email') is-invalid @enderror"
												name="email[]" value="{{ old('email') }}" autocomplete="email"
												autofocus>
												@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

										</div>
									</div>
									@endif



									
									



									

									




									

									



								
								



								


								
								

								



								

								
							</div>
							<div class="row rental-info" >
							
									<div class=" rental-cont">
										
									</div>
								
							</div>
							<div class="row">
							<div class="add-more  ml-4">
                                            <a href="javascript:void(0);" class="add-rental"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
									<div class="col-lg-12 float-right">
										<button type="submit" class="btn btn-primary float-right" id="id-form1">
											Next
										</button>
										<a href="{{route('step2')}}" class="btn btn-primary float-left" >
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
	<script src="{{ asset('js/profile-settings.js') }}"></script>
	
	<script>
		have_rental_history=$('input[name="have_rental_history"]:checked').val();

		
		 if(have_rental_history=="0"){
			$("form input[type=text]").prop("disabled", true);
			$("form select").prop("disabled", true);
			$("form input[type=email]").prop("disabled", true);
			$("form input[type=date]").prop("disabled", true);
			$("form textarea").prop("disabled", true);
		}else if(have_rental_history=="1"){
			$("form input[type=text]").prop("disabled", false);
			$("form select").prop("disabled", false);
			$("form input[type=email]").prop("disabled", false);
			$("form input[type=date]").prop("disabled", false);
			$("form textarea").prop("disabled", false);
		}

		
		
		$('input[type="radio"]').on('change', function() {
		
		value=$('input[name="have_rental_history"]:checked').val();
		
		if(value!="1"){
			$("form input[type=text]").prop("disabled", true);
			$("form select").prop("disabled", true);
			$("form input[type=email]").prop("disabled", true);
			$("form input[type=date]").prop("disabled", true);
			$("form textarea").prop("disabled", true);
		}else{
			$("form input[type=text]").prop("disabled", false);
			$("form select").prop("disabled", false);
			$("form input[type=email]").prop("disabled", false);
			$("form input[type=date]").prop("disabled", false);
			$("form textarea").prop("disabled", false);
		}
	});

	
	</script>
	<script>

$(".rental-info").on('click','.trash', function () {
		$(this).closest('.rental-cont').remove();
		return false;
    });

    $(".add-rental").on('click', function () {
		check=$('input[name="have_rental_history"]:checked').val();
		if(check=="1"){

		
		var rentalcontent = '<div class="col-md-12 form-row rental-cont">' +
		'<div class="col-md-12"><h4 class="d-block mt-4">Rental Address:</h4></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Address 1</label><textarea id="address1"  required class="form-control"name="address1[]" autocomplete="address1" autofocus></textarea></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Address 2</label><textarea id="address2" required class="form-control "name="address2[]" autocomplete="address2" autofocus></textarea></div></div>'+
		'<div class="col-md-5"><div class="form-group"><label>City:</label><select id="city_id" required class=" form-control" name="city_id[]"  autocomplete="city_id" autofocus> <option >Select City</option>';
		@foreach($citys as $city)
			rentalcontent=rentalcontent+'<option value="{{$city->id}}">{{$city->name}}</option>';
		@endforeach
		rentalcontent=rentalcontent+'</select></div></div>'+
		'<div class="col-md-4"><div class="form-group"><label>State:</label><select id="state_id" required class=" form-control" name="state_id[]"  autocomplete="state_id" autofocus><option >Select City</option>';
		@foreach($states as $state)
			rentalcontent=rentalcontent+'<option value="{{$state->id}}">{{$state->name}}</option>';
		@endforeach
		rentalcontent=rentalcontent+'</select></div></div>'+
		'<div class="col-md-3"><div class="form-group"><label>Zip Code:</label><input id="zip" placeholder="Zip Code" type="text" required class="form-control " name="zip[]"  autocomplete="zip" autofocus></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Rental Date:</label><input id="rental_date" type="date" placeholder="rental_date" required class="form-control " name="rental_date[]"  autocomplete="rental_date" autofocus></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Monthly rent:</label><input id="monthly_rent" type="number" placeholder="monthly_rent" required class="form-control " name="monthly_rent[]"  autocomplete="monthly_rent" autofocus></div></div>'+
		'<div class="col-md-12"><div class="form-group"><label>Reason Leaving:</label><input id="reason_leaving" type="text" placeholder="Reason Leaving" required class="form-control " name="reason_leaving[]"  autocomplete="reason_leaving" autofocus></div></div>'+
		'<div class="col-md-12"><h4 class="d-block mt-4">Landlord Information:</h4></div>'+
		'<div class="col-md-6"><div class="form-group"><label>First Name:</label><input id="first_name" type="text" placeholder="First Name" required class="form-control " name="first_name[]"  autocomplete="first_name" autofocus></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Last Name:</label><input id="last_name" type="text" placeholder="Last Name" required class="form-control " name="last_name[]"  autocomplete="last_name" autofocus></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Phone:</label><input id="phone" type="text" placeholder="Phone" required class="form-control " name="phone[]"  autocomplete="phone" autofocus></div></div>'+
		'<div class="col-md-6"><div class="form-group"><label>Email:</label><input id="email" type="email" placeholder="Email" required class="form-control " name="email[]"  autocomplete="email" autofocus></div></div>'+




		'<div class="col-12 col-md-2 mb-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="fa fa-trash"></i></a></div>' +
		'</div>';
		
        $(".rental-info").append(rentalcontent);
        return false;
		}
    });




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