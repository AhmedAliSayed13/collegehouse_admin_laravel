<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts-owner.style')
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            @include('layouts-owner.header')
			<!-- /Header -->

			<!-- Sidebar -->
            @include('layouts-owner.sidebar')
			<!-- /Sidebar -->

			<!-- Page Wrapper -->


                    @include('flash-message')

                    <!-- Page Wrapper -->
                    <div class="page-wrapper">
                        <div class="content container-fluid">

                                        @yield('content')
                        </div>
                    </div>

			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->


        @include('layouts-owner.script')

    </body>
</html>
