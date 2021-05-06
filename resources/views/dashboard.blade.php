@extends('layouts/master')
@section('title', 'Ulang Tahun jemaat')
@section('content')

<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css-home/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css-home/weekpicker.css') }}">

</head>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">

    </div>
    <!-- /.card-body -->
</div>


<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- <script src="{{ asset('daterangepicker/newpicker.js') }}"></script> -->
<!-- Page specific script -->
<script>
$(document).ready(function() {});
$(document).ready(function() {
    moment.locale('en', {
        week: {
            dow: 1
        } // Monday is the first day of the week
    });

    //Initialize the datePicker(I have taken format as mm-dd-yyyy, you can     //have your owh)
    $("#weeklyDatePicker").datetimepicker({
        format: 'DD-MM-YYYY'
    });

    //Get the value of Start and End of Week
    $('#weeklyDatePicker').on('dp.change', function(e) {
        var value = $("#weeklyDatePicker").val();
        var firstDate = moment(value, "DD-MM-YYYY").day(1).format("DD-MM-YYYY");
        var lastDate = moment(value, "DD-MM-YYYY").day(7).format("DD-MM-YYYY");
        $("#weeklyDatePicker").val(firstDate + " - " + lastDate);

        $('#weekBtn').click(function() {
            window.location = 'http://localhost:8000/admin/week?range=' + firstDate + " - " +
                lastDate;
        });
    });


});

jQuery(document).ready(function($) {
    /* now you can use $ */

    $("#tb1").DataTable({
        // "ajax": 'http://localhost:8000/api/week?range=' + moment().format("YYYY-MM-DD") + ' - ' + moment().format("YYYY-MM-DD"),
        "searching": false,
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#tb1_wrapper .col-md-6:eq(0)');

    $("#tb2").DataTable({
        "searching": false,
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#tb2_wrapper .col-md-6:eq(0)');
});
</script>

@endsection