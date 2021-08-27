 <!-- jQuery -->
 <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

 <!-- Bootstrap Core JS -->
 <script src="{{ asset('assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

 <!-- Slimscroll JS -->
 <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

 <!-- Datatables JS -->
 <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>


 <script src="{{ asset('assets/js/script.js') }}"></script>
 <script src="{{ asset('library/dropzone/dropzone.js') }}"></script>
 <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
 <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('/js/profile-settings.js') }}"></script>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 @include('sweet::alert')





 @stack('scripts')
