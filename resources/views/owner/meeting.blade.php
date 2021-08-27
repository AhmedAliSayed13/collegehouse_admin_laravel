@extends('layouts-owner.index')
@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Last Received Meetings</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Last Received Meetings</li>
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
                                <th>meeting id</th>
                                <th>meeting date</th>
                                <th>meeting url</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meetings as $meeting)
                            <tr>
                                <td>{{$meeting->meeting_id}}</td>
                                <td>{{$meeting->meeting_date}}</td>
                                <td>{{$meeting->meeting_url}}</td>

                                <td>
                                    <form action="{{route('owner.deletemeeting',$meeting->id)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="delete_ancor btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('owner.editmeeting',$meeting->id)}}"
                                        class="edit_ancor btn btn-warning">
                                        <i class="fa fa-edit"></i>
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