	
@extends('layouts-owner.index')
@section('content')
    <div class="row">
					<div class="col-md-12 " >
						
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">

										<div class="row">

											<div class="col-md-12">
												@include('flash-message')
												
												<form method="POST" action="{{route('owner.updatemeeting',$meetings->id)}}">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label> Meeting Date:</label>

																<input id="meeting_date" type="date" class="form-control @error('meeting_date') is-invalid @enderror" name="meeting_date" value="{{ old('meeting_date') }}"  autofocus>
																@error('meeting_date')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
															@method('PUT')
																<button type="submit" class="btn btn-primary" id="id-form1">
														Update info
													</button>
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
@stop               