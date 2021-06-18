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
							<li class="steps-timeline__step  steps-timeline__step--done"><span
									class="step-text">Guarantors</span></li>
							<li class="steps-timeline__step steps-timeline__step--done "><span class="step-text">Rental
									History</span></li>
							<li class="steps-timeline__step steps-timeline__step--done"><span
									class="step-text">Employment</span></li>
							<li class="steps-timeline__step steps-timeline__step--current"><span class="step-text">Terms and Conditions</span></li>
							<li class="steps-timeline__step"><span class="step-text">Preview Submission</span></li>
						</ol>
					</div>
				</div>
				<div class="col-md-9 m-auto ">
					<div class="div-step-form">
						<header class="step-form-header">Terms and Conditions</header>
						<p class="step-form-decs">
							Please carefully read and agree to the terms and conditions to submit your application.


						</p>

						<form method="POST" action="{{route('step5-save')}}">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<p>
											I understand that this is a routine application to establish credit, character, employment, and rental history. I also understand that this is NOT an agreement to rent and that all applications must be approved. I authorize verification of references given. I declare that the statements above are true and correct, and I agree that the landlord may terminate my agreement entered into in reliance on any misstatement made above.
										</p>
										
										
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<div class="form-check">
											<input required class="form-check-input @error('terms_and_conditions') is-invalid @enderror" type="checkbox" value="1" id="invalidCheck2"
												name="terms_and_conditions">
											<label class="form-check-label" for="invalidCheck2">
												I agree to the terms and conditions
											</label>
										</div>
										@error('terms_and_conditions')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>


							









								
								<div class="col-md-12">
									<div class="form-group">
										<label>Agreed By:</label>
										<input id="applicant_full_name" placeholder="Type Your Full Name" type="text"
											required class="form-control @error('applicant_full_name') is-invalid @enderror"
											name="applicant_full_name"
											value="{{ old('applicant_full_name',$application->applicant_full_name) }}"
											autocomplete="applicant_full_name" autofocus>
										@error('applicant_full_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>
								</div>
								


								

								
								

								

								

								

								


								

								



								
								

							
























								






































							</div>
							
							<div class="row">
								
								<div class="col-lg-12 float-right">
									<button type="submit" class="btn btn-primary float-right" id="id-form1">
										Preview Submission
									</button>
									<a href="{{route('step3')}}" class="btn btn-primary float-left">
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




	

</body>

</html>