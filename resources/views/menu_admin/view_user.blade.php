@extends('layouts.master')
@section('title', 'Akun Pengguna')
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

<body>

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
    <div class="container">

        <form action="/user/update/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- //user -->
            <div class="card">
                <!-- <div class="card-header text-left">
                    <h5>Urgensi Penetapan Cagar Budaya</h5>
                </div> -->

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th>NIP</th>
                            <td>{{$data->nip}}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>{{$data->no_hp}}</td>
                        </tr>
                    </table>
                    <div class="col-md-12 text-center">
                        <a href="/user/edit/{{$data->id}}" class="center btn btn-info btn-md mt-5 mb-5" role="button"
                            aria-disabled="true"><i class="fas fa-edit"></i> Edit
                            Data</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Akun?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus akun <b>{{$data->name}} </b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    <form method="GET" action="/user/delete/{{$data->id}}">
                        @csrf
                        <button href="/user/delete/{{$data->id}}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-danger">Hapus</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
    readURL(this);
});
</script>
@endsection