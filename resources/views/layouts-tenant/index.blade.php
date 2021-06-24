<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts-tenant.style')
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include('layouts-tenant.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
            @include('layouts-tenant.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
           
				
                    @include('flash-message')


                    @yield('content')
					
				
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		
        @include('layouts-tenant.script')
		
    </body>
</html>