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
		@include('layouts-admin.sidebar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Admin</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="{{route('application.index')}}">Applications</a>
								</li>
								<li class="breadcrumb-item active">Show</li>
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
											<div class="col-lg-5">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">Meeting information</h4>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-striped mb-0">

																<tbody>
																	<tr>
																		<td>Meeting ID</td>

																		@if(isset($application->meeting->meeting_id))
																		<td>{{$application->meeting->meeting_id}}</td>
																		@else
																		<td>-</td>
																		@endif
																	</tr>
																	<tr>
																		<td>Meeting Date</td>
																		@if(isset($application->meeting->meeting_date))
																		<td>{{str_replace('T',' ',$application->meeting->meeting_date)}}
																		</td>
																		@else
																		<td>-</td>
																		@endif
																	</tr>

																	<tr>
																		<td>Meeting Join</td>
																		@if(isset($application->meeting->meeting_url))
																		<td>
																			<h4><a target="_blank" class="f"
																					href="{{$application->meeting->meeting_url}}"><i
																						class="fa fa-external-link"></i>
																			</h4></a>
																		</td>
																		@else
																		<td>-</td>
																		@endif
																	</tr>

																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												@include('flash-message')
												<div class="table-responsive">
													<form action="{{route('admin.zoom-create')}}" method="POST">
														@csrf
														<div class="row">

															<input name="application_id" value="{{$application->id}}"
																type="hidden">
															<div class="col-sm-12 col-lg-3">

																<label class="d-block">Application Status : </label>
																<select aria-controls="DataTables_Table_0"
																	name="application_case_id"
																	class="custom-select custom-select-sm form-control form-control-sm @error('application_case_id') is-invalid @enderror">
																	<option>select Application Status </option>
																	@foreach($application_cases as $application_case)
																	<option value="{{$application_case->id}}"
																		{{ option_select(old("application_case_id",$application->application_case_id) , $application_case->id )}}>
																		{{$application_case->name}}</option>
																	@endforeach
																</select>
																@error('application_case_id')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror

															</div>

															<div class="col-sm-12 col-lg-3 mb-2">

																<label class="d-block">Metting Date : </label>
																<input Type="datetime-local" name="meeting_date"
																	min="{{Carbon\Carbon::now()->format('Y-m-d\T00:00:00')}}"
																	aria-controls="DataTables_Table_0"
																	class="custom-select custom-select-sm form-control form-control-sm">


															</div>
															<div class="col-sm-12 col-lg-3 mb-2">
																<label class="d-block"></label>
																<input type="submit" class="btn btn-info mt-3"
																	value="Save">
															</div>


														</div>
													</form>
													<table class="table table-hover mb-0">
														<thead>
															<tr>
																<th>field</th>
																<th>value</th>
															</tr>
														</thead>
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
															<tr>
																<td>
																	Requested House Type
																</td>
																<td>
																	{{$application->house_type->name}}
																</td>

															</tr>
															@for($i=0;$i<count($houses);$i++) <tr>
																<td>
																	Requested property({{$i}})
																</td>
																<td>
																	{{$houses[$i]->name}}
																</td>

																</tr>
																@endfor


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
																		Group member name (1)

																	</td>
																	<td>
																		{{$application->group_member_name_1}}
																	</td>

																</tr>
																<tr>
																	<td>
																		Group member name (2)

																	</td>
																	<td>
																		{{$application->group_member_name_2}}
																	</td>

																</tr>
																<tr>
																	<td>
																		Group member name (3)

																	</td>
																	<td>
																		{{$application->group_member_name_3}}
																	</td>

																</tr>
																<tr>
																	<td>
																		Group member name (4)

																	</td>
																	<td>
																		{{$application->group_member_name_4}}
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

																<tr>
																	<td>
																		Estimated amount you are prepared to pay per
																		person (without utilities)

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

																@if($application->reason_sign_parent_id==6 &&
																$application->both_parents_signing==1)

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

																@for($i=0;$i<count($rental_histories);$i++) <tr>
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
																			Do you have any employment history or
																			currently have a job?

																		</td>
																		<td>
																			{{get_boolean_string($application->have_employment_history)}}
																		</td>

																	</tr>


																	@if($application->have_employment_history==1)

																	@for($i=0;$i<count($employments);$i++) <tr>
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
																				Do you agree to our terms and
																				conditions?

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