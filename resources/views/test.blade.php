<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.8 image upload example - HDTuto.com</title>

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

</head>



<body>

    <div class="container">



        <div class="panel panel-primary">

            <div class="panel-heading">
                <h2>Laravel 5.8 image upload example - HDTuto.com</h2>
            </div>

            <form method="POST" action="{{route('admin.zoom-edit')}}">
                {{ csrf_field() }}
                @method('PATCH')
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meeting Date:</label>
                                <input type="hidden" name="meeting_id" value="99499381527">
                            <input id="meeting_date" type="datetime-local"
                                
                                class="form-control @error('meeting_date') is-invalid @enderror" name="meeting_date"
                               
                                autofocus>
                            @error('meeting_date')
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

</body>



</html>