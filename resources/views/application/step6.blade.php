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


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
							<li class="steps-timeline__step  steps-timeline__step--done"><span
									class="step-text">Guarantors</span></li>
							<li class="steps-timeline__step steps-timeline__step--done "><span class="step-text">Rental
									History</span></li>
							<li class="steps-timeline__step steps-timeline__step--done"><span
									class="step-text">Employment</span></li>
							<li class="steps-timeline__step steps-timeline__step--done"><span class="step-text">Terms
									and Conditions</span></li>
							<li class="steps-timeline__step steps-timeline__step--current"><span
									class="step-text">Preview Submission</span></li>
						</ol>
					</div>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-step-form">
						<header class="step-form-header">Preview Submission</header>
						<p class="step-form-decs">
							Please review all information provided and make sure they are correct. Typos in names or
							emails may delay or disqualify your application.


						</p>

						<form method="POST" action="{{route('step6-save')}}">
							{{ csrf_field() }}
							<div class="row">


								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-hover mb-0">
											<tbody>
												
												<tr>
													<td>
														Applicant first Name
													</td>
													<td>
														{{$application->first_name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant last name

													</td>
													<td>
														{{$application->last_name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant gender
													</td>
													<td>
														{{$application->gender->name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant email address

													</td>
													<td>
														{{$application->email}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant Address 1
													</td>
													<td>
														{{$application->address1}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant Address 2
													</td>
													<td>
														{{$application->address2}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant city
													</td>
													<td>
														{{$application->city->name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant state
													</td>
													<td>
														{{$application->state->name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Applicant Zip Code
													</td>
													<td>
														{{$application->zip}}
													</td>
													
												</tr>

												@if(empty($code))
													<tr>
														<td>
															Requested House Type
														</td>
														<td>
															{{$application->house_type->name}}
														</td>
														
													</tr>
												@endif

												@for($i=0;$i<count($houses);$i++)
												<tr>
													<td>
														Requested property({{$i}})
													</td>
													<td>
														{{$houses[$i]->name}}
													</td>
													
												</tr>
												@endfor

												@if(empty($code))
													@if($application->house_type_id==1)
															<tr>
																<td>
																	Group lead name
																</td>
																<td>
																	{{$application->group_lead_name}}
																</td>
																
															</tr>
															<tr>
																<td>
																	Group member email (1)

																</td>
																<td>
																	{{$application->group_member_email_1}}
																</td>
																
															</tr>
															<tr>
																<td>
																	Group member email (2)

																</td>
																<td>
																	{{$application->group_member_email_2}}
																</td>
																
															</tr>
															<tr>
																<td>
																	Group member email (3)

																</td>
																<td>
																	{{$application->group_member_email_3}}
																</td>
																
															</tr>
															<tr>
																<td>
																	Group member email (4)

																</td>
																<td>
																	{{$application->group_member_email_4}}
																</td>
																
															</tr>
													@else
														<tr>
															<td>
																Room Number

															</td>
															<td>
																{{$application->room->number}}
															</td>
															
														</tr>
														<tr>
															<td>
																Room Number

															</td>
															<td>
																{{$application->room_type->name}}
															</td>
															
														</tr>
													@endif
												@endif

												<tr>
													<td>
														Estimated amount you are prepared to pay per person (without utilities)

													</td>
													<td>
														{{$application->amount_pay_dollars}}
													</td>
													
												</tr>

												<tr>
													<td>
														Are you bringing a Car?
													</td>
													<td>
														{{get_boolean_string($application->bringing_Car)}}
													</td>
													
												</tr>

												@if($application->bringing_Car==1)
													<tr>
														<td>
															Car Make
														</td>
														<td>
															{{$application->car_make}}
														</td>
														
													</tr>
													<tr>
														<td>
															Car Model
														</td>
														<td>
															{{$application->car_model}}
														</td>
														
													</tr>
													<tr>
														<td>
															Car license plate number
														</td>
														<td>
															{{$application->driver_license_number}}
														</td>
														
													</tr>
													<tr>
														<td>
															Drivers license number
														</td>
														<td>
															{{$application->car_license_number}}
														</td>
														
													</tr>
												@endif
												<tr>
													<td>
														School
													</td>
													<td>
														{{$application->school}}
													</td>
													
												</tr>

												<tr>
													<td>
														Major
													</td>
													<td>
														{{$application->major}}
													</td>
													
												</tr>
												<tr>
													<td>
														Graduation Year
													</td>
													<td>
														{{$application->graduation_year}}
													</td>
													
												</tr>
												<tr>
													<td>
														GPA
													</td>
													<td>
														{{$application->gpa}}
													</td>
													
												</tr>
												<tr>
													<td>
														Chapters
													</td>
													<td>
														{{$application->chapter->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Preferred payment schedule:
													</td>
													<td>
														{{$application->payment_method->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Who is paying the rent ?
													</td>
													<td>
														{{$application->paying_rent->name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Are you willing to register to vote?
													</td>
													<td>
														Yes
													</td>
													
												</tr>
												<tr>
													<td>
														Do you have a problem with both parents signing?
													</td>
													<td>
														{{get_boolean_string($application->both_parents_signing)}}
													</td>
													
												</tr>
												@if($application->both_parents_signing==1)
												<tr>
													<td>
														note reason
													</td>
													<td>
														{{$application->reason_sign_parent->name}}
													</td>
													
												</tr>
													
												@endif

												@if($application->reason_sign_parent_id==6 && $application->both_parents_signing==1)

													<tr>
														<td>
															Other reason
														</td>
														<td>
															{{$application->parents_sign_not_other_reasons}}
														</td>
														
													</tr>

												@endif

												<tr>
													<td>
														Parent 1 First name

													</td>
													<td>
														{{$parent_information_1->first_name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 Last name

													</td>
													<td>
														{{$parent_information_1->last_name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Parent 1 Address 1

													</td>
													<td>
														{{$parent_information_1->address1}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 Address 2

													</td>
													<td>
														{{$parent_information_1->address2}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 City

													</td>
													<td>
														{{$parent_information_1->city->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 state

													</td>
													<td>
														{{$parent_information_1->state->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 Zip Code.

													</td>
													<td>
														{{$parent_information_1->zip}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 Phone

													</td>
													<td>
														{{$parent_information_1->phone}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 Email Address

													</td>
													<td>
														{{$parent_information_1->email}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 place of employment

													</td>
													<td>
														{{$parent_information_1->place_employment}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 1 position

													</td>
													<td>
														{{$parent_information_1->position}}
													</td>
													
												</tr>
												







												 <tr>
													<td>
														Parent 2 First name

													</td>
													<td>
														{{$parent_information_2->first_name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 Last name

													</td>
													<td>
														{{$parent_information_2->last_name}}
													</td>
													
												</tr>

												<tr>
													<td>
														Parent 2 Address 1

													</td>
													<td>
														{{$parent_information_2->address1}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 Address 2

													</td>
													<td>
														{{$parent_information_2->address2}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 City

													</td>
													<td>
														{{$parent_information_2->city->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 state

													</td>
													<td>
														{{$parent_information_2->state->name}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 Zip Code.

													</td>
													<td>
														{{$parent_information_2->zip}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 Phone

													</td>
													<td>
														{{$parent_information_2->phone}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 Email Address

													</td>
													<td>
														{{$parent_information_2->email}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 place of employment

													</td>
													<td>
														{{$parent_information_2->place_employment}}
													</td>
													
												</tr>
												<tr>
													<td>
														Parent 2 position

													</td>
													<td>
														{{$parent_information_2->position}}
													</td>
													
												</tr>


												<tr>
													<td>
														Do you have any Rental history?

													</td>
													<td>
														{{get_boolean_string($application->have_rental_history)}}
													</td>
													
												</tr>
												@if($application->have_rental_history==1)

													@for($i=0;$i<count($rental_histories);$i++)
													
														<tr>
															<td>
																Rental Address 1 ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->address1}}
															</td>
															
														</tr>
														<tr>
															<td>
																Rental Address 2 ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->address2}}
															</td>
															
														</tr>
														<tr>
															<td>
																Rental City ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->city->name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Rental state ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->state->name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Rental Zip Code ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->zip}}
															</td>
															
														</tr>


														<tr>
															<td>
																Rental Date ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->rental_date}}
															</td>
															
														</tr>
														<tr>
															<td>
																Monthly rent ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->monthly_rent}}
															</td>
															
														</tr>
														<tr>
															<td>
																Reason For Leaving ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->reason_leaving}}
															</td>
															
														</tr>
														<tr>
															<td>
																Landlord Information First Name ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->first_name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Landlord Information Last Name ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->last_name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Landlord Information Phone ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->phone}}
															</td>
															
														</tr>
														<tr>
															<td>
																Landlord Information Email ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->email}}
															</td>
															
														</tr>
														<tr>
															<td>
																Landlord Information First Name ({{$i+1}})
		
															</td>
															<td>
																{{$rental_histories[$i]->zip}}
															</td>
															
														</tr>
													@endfor
												@endif














												<tr>
													<td>
														Do you have any employment history or currently have a job?

													</td>
													<td>
														{{get_boolean_string($application->have_employment_history)}}
													</td>
													
												</tr>


												@if($application->have_employment_history==1)

													@for($i=0;$i<count($employments);$i++)
													
													<tr>
														<td>
															Employer name ({{$i+1}})
	
														</td>
														<td>
															{{$employments[$i]->employer_name}}
														</td>
														
													</tr>
													<tr>
														<td>
															Employer email ({{$i+1}})
	
														</td>
														<td>
															{{$employments[$i]->email}}
														</td>
														
													</tr>
													<tr>
														<td>
															Employer Phone ({{$i+1}})
	
														</td>
														<td>
															{{$employments[$i]->phone}}
														</td>
														
													</tr>
														<tr>
															<td>
																Employer address 1 ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->address1}}
															</td>
															
														</tr>
														<tr>
															<td>
																Employer address 2 ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->address2}}
															</td>
															
														</tr>
														<tr>
															<td>
																Employer city ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->city->name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Employer state ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->state->name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Employer Zip Code ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->zip}}
															</td>
															
														</tr>


														<tr>
															<td>
																Your position ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->position}}
															</td>
															
														</tr>
														<tr>
															<td>
																Monthly gross salary ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->monthly_gross_salary}}
															</td>
															
														</tr>
														<tr>
															<td>
																Supervisor first name ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->supervisor_first_name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Supervisor last name ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->supervisor_last_name}}
															</td>
															
														</tr>
														<tr>
															<td>
																Supervisor title ({{$i+1}})
		
															</td>
															<td>
																{{$employments[$i]->supervisor_title}}
															</td>
															
														</tr>

														
														
													@endfor
												@endif 

												<tr>
													<td>
														Do you agree to our terms and conditions?

													</td>
													<td>
														I Agree
													</td>
													
												</tr>
												<tr>
													<td>
														Your full name

													</td>
													<td>
														{{$application->applicant_full_name}}
													</td>
													
												</tr>

											</tbody>
										</table>
									</div>
								</div>













								


























































































							</div>

							<div class="row">

								<div class="col-lg-12 float-right">
									

									@if (!Auth::guest())
									<button type="submit" class="btn btn-success float-right" id="id-form1">
										 Submit
									</button>
									@else
									<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Login</a>
									@endif
									<a href="{{route('step1')}}" class="btn btn-info float-left">
										Edit <i class="fa fa-edit"></i>
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


	<!-- login Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						
						<div class="modal-body">
							
							<div class="loginbox">
                    	
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1 class="text-center">Login</h1>
								<p class="account-subtitle">Complate your Application</p>
								
								<!-- Form -->
								<form action="{{route('popup-login')}}" method="Post" id="form-popup-login">
								@csrf
									<div class="form-group">
										<input class="form-control" type="email" name="email" placeholder="Email" >
										<span class="text-danger" >
											<strong id='emailMessage'></strong>
										</span>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" placeholder="Password" >
										<span class="text-danger" >
											<strong id='passwordMessage'></strong>
										</span>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<div class="text-center dont-have">Don’t have an account? <a  href="{{route('tenant.register')}}">Register</a></div>
							</div>
                        </div>
                    </div>
							
						</div>
					</div>
				</div>
			</div>
	<!-- /Login Modal -->



	
	
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
    $('#form-popup-login').submit(function(e){
        e.preventDefault();
        var url = $(this).attr("action");
        var postdata = $(this).serialize();
        var request = $.post(url, postdata, formpostcompleted, "json");
        function formpostcompleted(data, status) {
			if(data==1)
			{
				$('#emailMessage').empty();
				$('#passwordMessage').empty();
				// e.currentTarget.submit();
				location.reload();
			}else if(data==0){
				$('#emailMessage').empty();
				$('#passwordMessage').empty();
				$('#emailMessage').append('These credentials do not match our records.');
			}else{
				$emailMessage=data['email'];
				$passwordMessage=data['password'];
				$('#emailMessage').empty();
				$('#passwordMessage').empty();
				alert($emailMessage);
				$('#emailMessage').append($emailMessage);
				$('#passwordMessage').append($passwordMessage);
				
			}
        
        }
        });
	</script>



</body>

</html>