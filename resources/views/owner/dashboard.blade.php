@extends('layouts-owner.index')
@section('content')

        <div class="row">
            <div class="col-md-12 col-lg-5">

                <!-- Recent Orders -->
                <div class="card">

                <div class="card-header">
                        <h5 class="card-title">Send mail to accepted tenant</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('acceptedLeader') }}">
                            @csrf
                            <div class="form-group">
                             <label>Enter Your Email</label>
                             <input type="text" name="email" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                             <input type="submit" name="send" class="btn btn-info" value="Send" />
                            </div>
                           </form>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-12 col-lg-7">

                <!-- Recent Orders -->
                <div class="card">
                <div class="card-header">
                        <h5 class="card-title">Upcoming interview</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">

                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
                                                <a > Ruby Perrin <span class="text-primary d-block">Team Leader</span></a>
                                            </h2>
                                        </td>

                                        <td class="text-right">9/3/2019 </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
                                                <a > Ruby Perrin <span class="text-primary d-block">Team Leader</span></a>
                                            </h2>
                                        </td>

                                        <td class="text-right">9/3/2019 </td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-12 col-lg-5">

                <!-- Invoice Chart -->
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title">Statistic</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">

                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
                                                <a > 5480 <span class="text-primary d-block">Total owners</span></a>
                                            </h2>
                                        </td>

                                        <td class="text-right">+341 <span class="text-primary d-block"> New</span></td>

                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Invoice Chart -->

            </div>



            <div class="col-md-12 col-lg-7">

                <!-- Recent Orders -->
                <div class="card">
                <div class="card-header">
                        <h5 class="card-title">Last Received Applications</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>House</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a >Dr. Ruby Perrin</a>
                                            </h2>
                                        </td>
                                        <td>Dental</td>
                                        <td>Dental</td>
                                        <td>9/3/2019 </td>

                                        <td >
                                            Pending
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-12 col-lg-5">

                <!-- Invoice Chart -->
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title">Upcoming Payment</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">

                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/profile/defult.png')}}" alt="User Image"></a>
                                                <a > Rental <span class="text-primary d-block">Deposits</span></a>
                                            </h2>
                                        </td>

                                        <td class="text-right">521$ <span class="text-primary d-block"> From 34 owner</span></td>

                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Invoice Chart -->

            </div>
        </div>
@stop






