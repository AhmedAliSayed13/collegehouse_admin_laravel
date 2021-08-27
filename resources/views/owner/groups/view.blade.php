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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if($complate)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Meeting information</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">

                                    <tbody>
                                        <tr>
                                            <td>Meeting ID</td>

                                            @if(isset($meeting->meeting_id))
                                            <td>{{$meeting->meeting_id}}</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Meeting Date</td>
                                            @if(isset($meeting->meeting_date))
                                            <td>{{str_replace('T',' ',$meeting->meeting_date)}}
                                            </td>
                                            @else
                                            <td>-</td>
                                            @endif
                                        </tr>

                                        <tr>
                                            <td>Meeting Join</td>
                                            @if(isset($meeting->meeting_url))
                                            <td>
                                                <h4><a target="_blank" class="f" href="{{$meeting->meeting_url}}"><i
                                                            class="fa fa-external-link"></i>
                                                </h4></a>
                                            </td>
                                            @else
                                            <td>-</td>
                                            @endif
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    @include('flash-message')

                    <form action="{{route('owner.zoom-create')}}" method="POST">
                        @csrf
                        <div class="row">

                            <input name="group_code" value="{{$code}}" type="hidden">
                            <div class="col-sm-12 col-lg-4">

                                <label class="d-block">Group Status : </label>
                                <select name="group_status_id"
                                    class="custom-select custom-select-sm form-control form-control-sm @error('group_status_id') is-invalid @enderror">
                                    <option>select Group Status </option>
                                    @foreach($group_statuss as $group_status)
                                    <option value="{{$group_status->id}}"
                                        {{ option_select(old("group_status_id",$group_status_id) , $group_status->id )}}>
                                        {{$group_status->name}}</option>
                                    @endforeach
                                </select>
                                @error('group_status_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-sm-12 col-lg-4 mb-2">

                                <label class="d-block">Metting Date : </label>
                                <input Type="datetime-local" name="meeting_date"
                                    min="{{Carbon\Carbon::now()->format('Y-m-d\T00:00:00')}}"
                                    aria-controls="DataTables_Table_0"
                                    class="custom-select custom-select-sm form-control form-control-sm">


                            </div>
                            <div class="col-sm-12 col-lg-4 mb-2">
                                <label class="d-block"></label>
                                <input type="submit" class="btn btn-info mt-3" value="Save">
                            </div>


                        </div>
                    </form>



                </div>

                

                @else

                <div class="col-lg-12">
                    <h4 class="text-center">
                        Group Not Complate
                    </h4>
                </div>

                @endif


            </div>
        </div>



    </div>


    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tenant Rating</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('owner.rateGroup')}}" method="POST">
                        @csrf
                       
                        <div class="row">
                            @foreach ($groups as $group)
                                <input name="group_ids[]" value="{{$group->id}}" type="hidden" > 
                           
                            <div class="col-md-12">
                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>tenant Name:</label>
                                            <input type="text" value="{{$group->application->first_name.' '.$group->application->last_name}}" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Rating :</label>
                                            <input type="number" value="{{$group->rate}}" name="rates[]" max="10" min="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Notes:</label>
                                            <textarea name="notes[]"   class="form-control">{{$group->notes}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            @endforeach

                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    




    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>email</th>
                                <th>leader</th>
                                <th>complate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>


                                <td>
                                    {{$group->application->first_name.' '.$group->application->last_name}}
                                </td>
                                <td>
                                    {{$group->email}}
                                </td>
                                <td>
                                    @if($group->leader)
                                    <span class="badge badge-pill bg-success inv-badge">leader</span>
                                    @else
                                    <span class="badge badge-pill bg-danger inv-badge">Member</span>
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