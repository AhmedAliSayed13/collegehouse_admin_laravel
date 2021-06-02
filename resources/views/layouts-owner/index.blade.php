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


                    @yield('content')
					
				
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		
        @include('layouts-owner.script')
		
    </body>
</html>