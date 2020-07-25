<script src="{{ asset('dashboard/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('dashboard/js/paper-dashboard.min.js?v=2.0.1') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>


@yield('js')
