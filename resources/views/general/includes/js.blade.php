<script src="{{ asset('dashboard/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chart JS -->
<script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('dashboard/js/paper-dashboard.min.js?v=2.0.1') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>


@yield('js')

<script>
    $(document).ready(function () {

        @foreach(['danger', 'success'] as $msg)
        @if(Session::has('alert-'.$msg))
        var msg = '@php echo Session("alert-".$msg); @endphp';

        @if($msg == 'success')
        alertSuccess(msg);
        @endif

        @if($msg == 'danger')
        alertDanger(msg);
        @endif

        @endif
        @endforeach
    });

    function alertDanger(msg) {
        $.notify({
            icon: "nc-icon nc-bell-55",
            message: msg

        }, {
            type: 'danger',
            timer: 5000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }

    function alertSuccess(msg) {
        $.notify({
            icon: "nc-icon nc-bell-55",
            message: msg

        }, {
            type: 'success',
            timer: 5000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }

</script>
