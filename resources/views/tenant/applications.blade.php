@extends('layouts-tenant.index')
@section('content')
    <!-- Page Header -->
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
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12" >
            <div class="card">
                <div class="card-body" style="margin-left: 255px; margin-top: 107px;">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                   <th>Application Id</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Gender Id</th>
									<th>Email</th>
									<th>Birthday</th>
									<th>phone</th>
									<th>ssn</th>
									<th>Address1</th>
									<th>Address2</th>
									<th>city name</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    	<tr>
                                            <td>{{$application->id}}</td>
                                            <td>{{$application->first_name}}</td>
                                             <td>{{$application->last_name}}</td>
                                             <td>{{$application->gender_id}}</td>
                                             <td>{{$application->email}}</td>
                                             <td>{{$application->birthday}}</td>
                                             <td>{{$application->phone}}</td>
                                             <td>{{$application->ssn}}</td>
                                             <td>{{$application->address1}}</td>
                                             <td>{{$application->address2}}</td>
                                             <td>{{$application->city->name}}</td>
                                             {{--  <td>{{$application->address1}}</td>  --}}

                                           <td>
                                                <a  href="" class="btn btn-success btn-sm table-btn"><i class="fas fa-eye"></i></a>
                                                {{--  <a class="  btn btn-danger btn-sm table-btn mx-1"><i class="icofont-ui-delete"></i> </a>  --}}
                                           </td>
										</tr>
                             @endforeach
                            </tbody>
                        </table>
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




















