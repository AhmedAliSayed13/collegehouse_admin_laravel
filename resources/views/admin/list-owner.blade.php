@extends('layouts-admin.index')
@section('content')
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				<div class="page-header">
					

					<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Admin</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">List Owner</li>
									
								</ul>
							</div>
							<div class="col-sm-5 col">
							<a href="{{route('admin.showAddOwner')}}"  class="btn btn-primary float-right mt-2"><i class="fa fa-plus mr-2"></i> Add Rental Owner</a>
							</div>
						</div>
				</div>
				
				<div class="row">
						<div class="col-sm-12">
							<div class="card">
								
								<div class="card-body">

									<div class="table-responsive">
									
										<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
											<div class="row text-center">
													<div class="col-sm-3">
														<!-- <div class="dataTables_length" id="DataTables_Table_0_length">
															<label>Show 
															<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
																<option value="10">10</option>
																<option value="25">25</option>
																<option value="50">50</option>
																<option value="100">100</option>
																<option value="-1">all</option>
															</select> entries
															</label>
														</div> -->
													</div>
													
											</div>
										<div class="row">
										
										<div class="col-sm-12">
										<table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
											<thead>
												<tr role="row">
													<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.953px;">Name</th>
														
													<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 148.891px;">
													Number Of House
													</th>
													
													<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 115.406px;">
													date
													</th>
												</tr>
											</thead>
											<tbody>
				
											@foreach ($owners as $owner) 
												<tr role="row" class="odd">
														<td class="sorting_1">{{$owner->fullname()}}</td>
														<td>100</td>
														<td>{{$owner->created_at->toDateString()}}</td>
														
													
												</tr>
												@endforeach
												</tbody>
										</table>
										</div>
										</div>
										<div class="row">
										<div class="col-sm-12 col-md-5">
										<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
										Showing 1 to {{ $perpage}} of {{ $perpage}} entries
										</div>
										</div>
										<div class="col-sm-12 col-md-7">
										<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
										{{ $owners->links() }}
										</div></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					
					
					
					
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
    
@stop