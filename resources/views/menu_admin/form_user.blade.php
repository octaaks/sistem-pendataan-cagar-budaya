@extends('layouts.master')
@section('title', 'Tambah Akun Pengguna')
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

        <form action="{{ route("store_user") }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- //user -->
            <div class="card">
                <!-- <div class="card-header text-left">
                    <h5>Urgensi Penetapan Cagar Budaya</h5>
                </div> -->

                <div class="card-body">
                    <div class="form-group row">
                        <label for="nip" class="col-md-2 col-form-label text-md-left">NIP</label>

                        <div class="col-md-8">
                            <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror"
                                name="nip" value="" autofocus>

                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-left">Nama</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>

                        <div class="col-md-8">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="" autofocus autocomplete="off" autocorrect="off"
                                autocapitalize="off" spellcheck="false">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-left">Password</label>

                        <div class="col-md-8">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" value=""
                                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-md-2 col-form-label text-md-left">No HP</label>

                        <div class="col-md-8">
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" value="" autofocus>

                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="text-md-right col-md-8 offset-md-2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>

        </form>
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