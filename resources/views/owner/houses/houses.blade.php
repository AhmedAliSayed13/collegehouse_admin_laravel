@extends('layouts-owner.index')
@section('content')

			<!-- Page Wrapper -->

                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('house.create') }}" class="btn btn-primary mb-3">Create house</a>
                            <div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover  table-center mb-0">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>House type</th>
													<th>City</th>
													<th >Status</th>
													<th>Total size</th>
													<th class="text-center">Actions</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($houses as $house)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $house->name }}</td>
                                                        <td> {{$house->house_type->name}}</td>
                                                        <td> {{$house->city->name}}</td>
                                                        <td> {{$house->status}}</td>
                                                        <td> {{$house->total_size}}</td>
                                                        <td class="text-right">
                                                            <div class="actions">
                                                                {{-- <a href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
                                                                    <i class="fe fe-eye"></i> View
                                                                </a> --}}
                                                                <a href="{{ route('house.edit',$house->id ) }}" class="btn btn-sm bg-warning-light mr-2">
                                                                    <i class="fe fe-edit"></i> Edit
                                                                </a>
                                                                <form action="{{ route('house.destroy', $house->id) }}" method="POST" style="display: contents">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm bg-danger-light mr-2">
                                                                        <i class="fe fe-trash"></i> Remove</button>
                                                                </form>
                                                            </div>
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

			<!-- /Page Wrapper -->

@stop






