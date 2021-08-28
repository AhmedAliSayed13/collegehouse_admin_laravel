@extends('layouts-owner.index')
@section('content')
<div class="page-header">
	<div class="row">
		<div class="col">
			<h3 class="page-title">Owner</h3>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('owner.dashboard')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{route('owner.index')}}">Owners</a></li>
				<li class="breadcrumb-item active">Lease</li>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-9 m-auto">
		<div class="card">
            <div class="card-body">
				<form method="POST" action="{{route('owner.store_confirm_lease')}}">
					@csrf
					<input type="hidden" name="id" value="{{$lease->id}}">
					<input type="hidden" name="owner_confirm" value="1">
					<div class="col-sm-12 col-lg-12 mb-2 text-center">
						<label class="d-block"></label>
						<input type="submit" class="btn btn-success mt-3" value="Confirm">
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- Invoice Container -->
<div class="invoice-container">

	<div class="row">
		<div class="col-sm-12 m-b-20">
			<img alt="Logo" class="inv-logo img-fluid" src="{{asset('assets/img/logo.png')}}">
		</div>
		
	</div>
	<div class="row">
		<div class="col-sm-12 m-b-20">
			<ul class="list-unstyled mb-0">
				<li>Doccure Hospital</li>
				<li>3864 Quiet Valley Lane,</li>
				<li>Sherman Oaks, CA, 91403</li>
				<li>GST No:</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-lg-12 col-xl-12 m-b-20">
			<h6>Invoice to</h6>
			<ul class="list-unstyled mb-0">
				<li>
					<h5 class="mb-0"><strong>Charlene Reed</strong></h5>
				</li>
				<li>4417 Goosetown Drive</li>
				<li>Taylorsville, NC, 28681</li>
				<li>United States</li>
				<li>8286329170</li>
				<li><a href="#">charlenereed@example.com</a></li>
			</ul>
		</div>
		
	</div>
	<div>

		<div class="invoice-info">
			<h5>Other information</h5>
			<p class="text-muted mb-0">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
				sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim
				aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae
				lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem.
				Nullam finibus pellentesque libero.
			</p>
		</div>
	</div>

</div>

<!-- /Invoice Container -->

@stop