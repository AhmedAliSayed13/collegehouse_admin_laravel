@extends('layouts-admin.index')
@section('content')
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
			<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Admin</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active">Change Password</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="profile-header">
							<div class="row align-items-center">
								<div class="col-auto profile-image">
									<a href="#">
										<img class="rounded-circle" alt="User Image"
											src="{{ asset('images/profile/defult.png') }}">
									</a>
								</div>
								<div class="col ml-md-n2 profile-user-info">
									<h4 class="user-name mb-0" id="data_fullname">{{Auth::user()->fullname()  }} </h4>
									<h6 class="text-muted" id="data_type">{{Auth::user()->role->name}}</h6>
								</div>
								<div class="col-auto profile-btn">


								</div>
							</div>
						</div>



						<!-- Personal Details Tab -->


						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">

										<div class="row">

											<div class="col-md-12">
												@include('flash-message')
												
												<form method="POST" action="{{route('admin.changepassword.save')}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Old Password :</label>

																<input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"  autocomplete="old_password" autofocus>
																@error('old_password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label>New Password:</label>

																<input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"  autocomplete="new_password" autofocus>
																@error('new_password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
																<label>Confirm Password :</label>
																<input id="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="password_confirmation" autofocus>
																@error('password_confirmation')
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
@stop