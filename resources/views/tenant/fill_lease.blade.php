@extends('layouts-tenant.index')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Applications</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Last Received Applications</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tenant.store_fill_lease') }}" method="POST">
                        @csrf
                        <input name="code" value="{{$code}}" type="hidden">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Price </label>
                            <div class="col-lg-10">
                                <input type="number" required name="price" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@stop

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
@endpush