@extends('layouts-tenant.index')
@section('content')

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

    <div class="row">
        <div class="col-sm-12" >
            <div class="card">
                <div class="card-body" style="margin-left: 255px; ">
                    <form action="{{ route('tenant.store_payment') }}" method="POST">
                        @csrf
                        <label for="">Send Payment</label>
                        <textarea name="message"  class="form-control" cols="30" rows="5"></textarea>
                        <button type="submit" class="btn btn-info mt-3"> Send</button>
                    </form>
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
