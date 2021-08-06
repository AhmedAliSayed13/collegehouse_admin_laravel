<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts-admin.style')
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    @include('layouts-admin.header')
    <!-- /Header -->

    <!-- Sidebar -->
    @include('layouts-admin.sidebar')
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">




                    @yield('content')



        </div>
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@include('layouts-admin.script')
</body>
</html>
