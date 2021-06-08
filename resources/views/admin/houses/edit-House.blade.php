@extends('layouts-admin.index')
@section('content')

<!-- Page Wrapper -->


<div class="page-header">


	<div class="row">
		<div class="col-sm-7 col-auto">
			<h3 class="page-title">Admin</h3>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{route('house.index')}}">Houses</a></li>
				<li class="breadcrumb-item active">Add House</li>

			</ul>
		</div>
		<!-- <div class="col-sm-5 col">
                                <a href="{{route('admin.showAddOwner')}}"  class="btn btn-primary float-right mt-2"><i class="fa fa-plus mr-2"></i> Add Rental Owner</a>
                                </div> -->
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card">

			<div class="card-body">
				@include('flash-message')
				<form method="POST" action="{{route('house.update',$house->id)}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Assign to Rental Owner : </label>
								<select id="owner_id" type="text"
									class="  form-control @error('owner_id') is-invalid @enderror" name="owner_id"
									value="{{ old('owner_id') }}" autocomplete="owner_id" autofocus>
									<option value="">Select Owner</option>
									@foreach ($owners as $owner)
									<option value="{{$owner['id']}}"
										{{ option_select(old("owner_id",$house->owner_id) , $owner["id"] )}}>{{$owner->fullname()}}
									</option>
									@endforeach
								</select>
								@error('owner_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<h5 class="d-block mt-4">House Address</h5>
						</div>
						<div class="col-md-12">
							<div class="form-group">


								<input id="address" placeholder="Address Specifications" type="text"
									class="form-control @error('address') is-invalid @enderror" name="address"
									value="{{ old('address',$house->address) }}" autocomplete="address" autofocus>
								@error('address')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">

								<input id="status" type="text" placeholder="Status"
									class="form-control @error('status') is-invalid @enderror" name="status"
									value="{{ old('status',$house->status) }}" autocomplete="status" autofocus>
								@error('status')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<select id="city_id" type="text"
									class="form-control @error('city_id') is-invalid @enderror" name="city_id"
									 autocomplete="city_id" autofocus>
									<option value="">Select City</option>
									@foreach ($citys as $city)
									<option {{ option_select(old("city_id",$house->city_id) , $city->id )}} value="{{$city->id}}">{{$city->name}}</option>
									@endforeach

								</select>
								@error('city_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-12">
							<h5 class="d-block mt-4">House Specifications</h5>
						</div>
						<div class="col-md-12">
							<div class="form-group">

								<input id="name" placeholder="House Name" type="text"
									class="form-control @error('name') is-invalid @enderror" name="name"
									value="{{ old('name',$house->name) }}" autocomplete="name" autofocus>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<select id="house_type_id"
									class="form-control @error('house_type_id') is-invalid @enderror"
									name="house_type_id"  autocomplete="house_type_id"
									autofocus>
									<option value="option1">House Type</option>
									@foreach ($house_types as $house_type)
									<option {{ option_select(old("house_type_id",$house->house_type_id) , $house_type->id )}} value="{{$house_type->id}}">{{$house_type->name}}</option>
									@endforeach
								</select>
								@error('house_type_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<input id="num_rooms" placeholder="Number Rooms" type="number"
									class="form-control @error('num_rooms') is-invalid @enderror" name="num_rooms"
									value="{{ old('num_rooms',$house->num_rooms) }}" autocomplete="num_rooms" autofocus>
								@error('num_rooms')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<input id="num_residents" placeholder="Number Residents" type="number"
									class="form-control @error('num_residents') is-invalid @enderror"
									name="num_residents" value="{{ old('num_residents',$house->num_residents) }}" autocomplete="num_residents"
									autofocus>
								@error('num_residents')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<input id="num_bathrooms" placeholder="Number Bathrooms" type="number"
									class="form-control @error('num_bathrooms') is-invalid @enderror"
									name="num_bathrooms" value="{{ old('num_bathrooms',$house->num_bathrooms) }}" autocomplete="num_bathrooms"
									autofocus>
								@error('num_bathrooms')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<input id="num_flooers" placeholder="number Flooers" type="number"
									class="form-control @error('num_flooers') is-invalid @enderror" name="num_flooers"
									value="{{ old('num_flooers',$house->num_flooers) }}" autocomplete="num_flooers" autofocus>
								@error('num_flooers')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<input id="num_parkings" placeholder="Off-Street Parkings" type="number"
									class="form-control @error('num_parkings') is-invalid @enderror" name="num_parkings"
									value="{{ old('num_parkings',$house->num_parkings) }}" autocomplete="num_parkings" autofocus>
								@error('num_parkings')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="total_size" placeholder="Total Size" type="number"
									class="form-control @error('total_size') is-invalid @enderror" name="total_size"
									value="{{ old('total_size',$house->total_size) }}" autocomplete="total_size" autofocus>
								@error('total_size')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="num_kitchens" placeholder="Kitchens" type="number"
									class="form-control @error('num_kitchens') is-invalid @enderror" name="num_kitchens"
									value="{{ old('num_kitchens',$house->num_kitchens) }}" autocomplete="num_kitchens" autofocus>
								@error('num_kitchens')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<h5 class="d-block mt-4">Diligence Requirements</h5>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input id="annual_reset" placeholder="Annual Reset" type="text"
									class="form-control @error('annual_reset') is-invalid @enderror" name="annual_reset"
									value="{{ old('annual_reset',$house->annual_reset) }}" autocomplete="annual_reset" autofocus>
								@error('annual_reset')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-form-label col-md-2">Payments Scheduals</label>
								<div class="col-md-10 d-flex">
									@foreach ($payment_methods as $payment_method)
									<div class="radio p-3">
										<label>
											<input type="radio"  name="payment_method_id"  {{option_radio($payment_method->id,$house->payment_method_id)}}
												value="{{$payment_method->id}}"> {{$payment_method->name}}
										</label>
									</div>
									@endforeach

									@error('payment_method_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<h5 class="d-block mt-4">Property Highlights</h5>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="excellent_location" placeholder="Excellent Location" type="text"
									class="form-control @error('excellent_location') is-invalid @enderror" name="excellent_location"
									value="{{ old('excellent_location',$house->excellent_location) }}" autocomplete="excellent_location" autofocus>
								@error('excellent_location')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="safety_security" placeholder="Safety Security" type="text"
									class="form-control @error('safety_security') is-invalid @enderror" name="safety_security"
									value="{{ old('safety_security',$house->safety_security) }}" autocomplete="Safety Security" autofocus>
								@error('safety_security')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="professional_maintenance" placeholder="Professional Maintenance" type="text"
									class="form-control @error('professional_maintenance') is-invalid @enderror" name="professional_maintenance"
									value="{{ old('professional_maintenance',$house->professional_maintenance) }}" autocomplete="professional_maintenance" autofocus>
								@error('professional_maintenance')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input id="resident_account" placeholder="Resident Account" type="text"
									class="form-control @error('resident_account') is-invalid @enderror" name="resident_account"
									value="{{ old('resident_account',$house->resident_account) }}" autocomplete="resident_account" autofocus>
								@error('resident_account')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>House Description</label>
								<textarea id="image_ownership" 
									class="form-control @error('description') is-invalid @enderror"
									name="description" 
									autocomplete="description" autofocus>
									{{ old('description',$house->description) }}
									</textarea>
								@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>House About</label>
								<textarea id="about" 
									class="form-control @error('about') is-invalid @enderror"
									name="about" 
									autocomplete="about" autofocus>
									{{ old('about',$house->about) }}
									</textarea>
								@error('about')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>




						<!-- <div class="col-md-6">
							<div class="form-group">
								<label>Upload Ownership Contract</label>
								<input id="image_ownership" type="file"
									class="form-control @error('image_ownership') is-invalid @enderror"
									name="image_ownership" value="{{ old('image_ownership') }}"
									autocomplete="image_ownership" autofocus>
								@error('image_ownership')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div> -->
						<!-- <div class="col-md-6">
							<div class="form-group">
								<label>Upload lease Contract</label>
								<input id="image_lease" type="file"
									class="form-control @error('image_lease') is-invalid @enderror" name="image_lease"
									value="{{ old('image_lease') }}" autocomplete="image_lease" autofocus>
								@error('image_lease')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div> -->

						<div class="col-md-12">
							<div class="form-group">
								<label>Upload Front House Images</label>
								<input id="front_house_images" type="file"
									class="form-control @error('front_house_images') is-invalid @enderror"
									name="front_house_images[]" autocomplete="front_house_images" autofocus multiple>
								@error('front_house_images')
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


	<h4 class="card-title">House Front Images</h4>
	<div class="row">
		@foreach ($front_images as $front_image)
		<div class="col-2 d-flex">
			<div class="card flex-fill">
				<img alt="Card Image" src="{{asset('images/houses/'.$front_image->name)}}" class="card-img-top image-edit-house">
				
				<div class="card-body">
					
					<form method="post" action="{{ url('admin/house/delete-image-front')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$front_image->id}}">
						
							
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
							
						
					</form>
				</div>
			</div>
		</div>
		@endforeach
	</div>








<!-- /Page Wrapper -->
@stop