@extends('layouts/master')
@section('title', 'Rekap Data Cagar Budaya')
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

</head>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
</div>
@endif
<div class="row">
<div class="col-lg-6">
<div class="card" style="height: 320px;">
    <!-- /.card-header -->

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>Jumlah Cagar Budaya</th>
                <td>{{$semua}}</td>
            </tr>
            <tr>
                <th>Jumlah Cagar Budaya (Sudah Ditetapkan)</th>
                <td>{{$terverifikasi}}</td>
            </tr>
            <tr>
                <th>Jumlah Cagar Budaya (Belum Ditetapkan)</th>
                <td>{{$tidak_terverifikasi}}</td>
            </tr>
            <tr>
                <th>Jumlah Cagar Budaya Dihapus</th>
                <td>{{$deleted}}</td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
</div>
</div>

<div class="col-lg-6">
<div id="chartHolder" class="card" style="height: 320px;">
    <div class="card-body">
        <div id="piechart" style="height: 100%;"></div>
    </div>
</div>
</div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Page specific script -->
<script>

var x = {!!json_encode($terverifikasi)!!};
var y = {!!json_encode($tidak_terverifikasi)!!};

google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var chartHolder = document.getElementById("chartHolder");

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Terverifikasi', parseInt(x)],
        ['Tidak Terverifikasi', parseInt(y)]
    ]);

    var options = {
        title: 'Jumlah Cagar Budaya Kota Salatiga'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    if(x>0||y>0){
        chart.draw(data, options);
        chartHolder.style.display = "block";
    }else{
        chartHolder.style.display = "none";
    }
}

jQuery(document).ready(function($) {
    /* now you can use $ */
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
@endsection