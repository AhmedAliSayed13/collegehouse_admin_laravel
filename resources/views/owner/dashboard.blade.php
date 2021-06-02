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


	<!-- firebase files start -->
	
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" >
			
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			
            @include('layouts-owner.header')
			<!-- /Header -->
			<!-- Sidebar -->
			
            @include('layouts-owner.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
				
					<div class="row">
						<div class="col-md-12 col-lg-7">
						
							<!-- Recent Orders -->
							<div class="card">
							<div class="card-header">
									<h5 class="card-title">Upcoming interview</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
															<a > Ruby Perrin <span class="text-primary d-block">Team Leader</span></a>
														</h2>
													</td>
													
													<td class="text-right">9/3/2019 </td>
													
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
															<a > Ruby Perrin <span class="text-primary d-block">Team Leader</span></a>
														</h2>
													</td>
													
													<td class="text-right">9/3/2019 </td>
													
												</tr>
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-12 col-lg-5">
						
							<!-- Invoice Chart -->
							<div class="card ">
								<div class="card-header">
									<h5 class="card-title">Statistic</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
															<a > 5480 <span class="text-primary d-block">Total owners</span></a>
														</h2>
													</td>
													
													<td class="text-right">+341 <span class="text-primary d-block"> New</span></td>
													
												</tr>
												
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	



						<div class="col-md-12 col-lg-7">
						
							<!-- Recent Orders -->
							<div class="card">
							<div class="card-header">
									<h5 class="card-title">Last Received Applications</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Type</th>
													<th>House</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a >Dr. Ruby Perrin</a>
														</h2>
													</td>
													<td>Dental</td>
													<td>Dental</td>
													<td>9/3/2019 </td>
													
													<td >
														Pending
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-12 col-lg-5">
						
							<!-- Invoice Chart -->
							<div class="card ">
								<div class="card-header">
									<h5 class="card-title">Upcoming Payment</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
															<a > Rental <span class="text-primary d-block">Deposits</span></a>
														</h2>
													</td>
													
													<td class="text-right">521$ <span class="text-primary d-block"> From 34 owner</span></td>
													
												</tr>
												
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
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
		<script  src="{{ asset('assets/js/script.js') }}"></script>


		
		


		
    </body>
</html>