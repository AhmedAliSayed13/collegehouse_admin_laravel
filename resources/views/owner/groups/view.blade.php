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
    {{-- @if($complate) --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Meeting information</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            @include('flash-message')

                            <form method="POST" action="{{route('admin.zoom-edit')}}">
                                {{ csrf_field() }}
                                @method('PATCH')


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Meeting Date:</label>

                                            <input id="meeting_date" type="datetime-local"
                                                min="{{Carbon\Carbon::now()->format('Y-m-d\T00:00:00')}}"
                                                class="form-control @error('meeting_date') is-invalid @enderror"
                                                name="meeting_date" value="{{ old('meeting_date') }}"
                                                autocomplete="meeting_date" autofocus>
                                            @error('meeting_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Meeting Status:</label>
                                            <select id="meeting_case_id"
                                                class="form-control @error('meeting_case_id') is-invalid @enderror"
                                                name="meeting_case_id" autocomplete="meeting_case_id" autofocus>
                                                <option>Select status </option>

                                            </select>
                                            @error('city_id')
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



        </div>
    {{-- @endif --}}
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>email</th>
                                <th>leader</th>
                                <th>complate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>


                                <td>
                                    {{$group->application->id}}
                                </td>
                                <td>
                                    {{$group->application->email}}
                                </td>
                                <td>
                                    @if($group->leader)
                                    <span class="badge badge-pill bg-success inv-badge">leader</span>
                                    @else
                                    <span class="badge badge-pill bg-danger inv-badge">--</span>
                                    @endif
                                </td>

                                <td>
                                    @if($group->complate)
                                    <span class="badge badge-pill bg-success inv-badge">Group Complate</span>
                                    @else
                                    <span class="badge badge-pill bg-danger inv-badge">Group Not Complate</span>
                                    @endif
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