	
	
	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	

	<!-- Custom JS -->
	<script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>


<!-- Bootstrap Core JS -->
<!-- <script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script> -->

<!-- Slimscroll JS -->
<!-- <script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/js/jquery.fancybox.min.js')}}"></script> -->
<!-- Custom JS -->
<!-- <script  src="{{asset('js/script.js')}}"></script>
<script  src="{{asset('js/mask.js')}}"></script>
<script  src="{{asset('js/jquery.maskedinput.min.js')}}"></script> -->
<!-- DataTables -->

<!-- Bootstrap Tagsinput JS -->
<!-- <script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
</script> -->




@stack('scripts')

