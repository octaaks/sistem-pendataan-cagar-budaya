@extends('layouts.master')
@section('title', 'Edit Akun Pengguna')
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
                    <div class="form-group row">
                        <label for="nip" class="col-md-2 col-form-label text-md-left">NIP</label>

                        <div class="col-md-8">
                            <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror"
                                name="nip" value="{{$data->nip}}" autofocus>

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
                                name="name" value="{{$data->name}}" autofocus>

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
                                name="email" value="{{$data->email}}" autofocus autocomplete="off" autocorrect="off"
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
                            <span class="small-info">
                                Abaikan jika tidak ingin mengganti password / kata sandi!
                            </span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" value=""
                                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                            <input class="mt-3" type="checkbox" onclick="myFunction()"> Show Password
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
                                name="no_hp" value="{{$data->no_hp}}" autofocus>

                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="text-md-left col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-success" value=""><i class="fas fa-save mr-2"></i>
                                Simpan</button>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteModal"
                                role="button" aria-disabled="true"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        </div>
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

function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection