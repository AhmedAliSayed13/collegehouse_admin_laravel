@extends('layouts-owner.index')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('calendar.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="meeting_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="time" name="meeting_time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>


@endsection


























