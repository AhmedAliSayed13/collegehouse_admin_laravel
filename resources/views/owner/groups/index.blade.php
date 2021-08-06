@extends('layouts-owner.index')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">All Houses</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">All Houses</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th> code</th>
                                    <th>Lead</th>
                                    <th>email</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groups as $group)
                                <tr>


                                    <td>
                                        {{$group->code}}
                                    </td>
                                    <td>
                                        {{$group->application->first_name.' '.$group->application->first_name}}
                                    </td>
                                    <td>
                                        {{$group->email}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm bg-success-light"  href="{{route('group.show',$group)}}">
                                            <i class="fe fe-eye"></i> view
                                        </a>
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
