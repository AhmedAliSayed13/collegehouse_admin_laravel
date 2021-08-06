@extends('admin.layout.index')
@section('content')

    <!-- Page Wrapper -->

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Tag</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Tag</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Tag</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('tag.update',$tag->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">name</label>
                                    <div class="col-md-10">
                                        <input type="text" value="{{old('name',$tag->name)}}" class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <!-- /Main Wrapper -->

@stop


