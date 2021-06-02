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
           
				
                    @include('flash-message')


                    @yield('content')
					
				
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		
        @include('layouts-admin.script')
		
    </body>
</html>