@extends('layouts-owner.index')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper groups">
                <div class="content container-fluid">
                    <div class="card">
                        <div class="card-header">
                            All Groups
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    @foreach ($groups as $group)
                                        {{ $group }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                      </div>
				</div>
			</div>
			<!-- /Page Wrapper -->

@stop






