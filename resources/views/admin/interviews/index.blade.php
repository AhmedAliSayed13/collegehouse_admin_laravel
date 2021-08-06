@extends('layouts-admin.index')
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">All Interviews</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">All Interviews</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">All Interviews</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="formMultiSubmit" action="{{admin_url('deleteMuliteCompany')}}" method="post">
                        @csrf
                            {{ $dataTable->table(['class'=>'table table-hover mb-0 '],True) }}
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
    {!! $dataTable->scripts() !!}
@endpush
