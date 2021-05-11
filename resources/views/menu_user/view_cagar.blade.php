@extends('layouts.master')
@section('title', 'Edit Data Cagar Budaya')
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

    <!-- Styles -->
    <style>
    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
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

        <form action="/cagar/update/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- //identitas -->
            <div class="card">
                <div class="card-header text-left">
                    <h5>Identitas Cagar Budaya</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-md-2 col-form-label text-md-left">Nama CB</label>

                        <div class="col-md-8">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{$data->nama}}" autofocus>

                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_sertifikat" class="col-md-2 col-form-label text-md-left">No Sertifikat</label>

                        <div class="col-md-8">
                            <input id="no_sertifikat" type="text"
                                class="form-control @error('no_sertifikat') is-invalid @enderror" name="no_sertifikat"
                                value="{{$data->no_sertifikat}}" autofocus>

                            @error('no_sertifikat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nop_pbb" class="col-md-2 col-form-label text-md-left">NOP PBB</label>

                        <div class="col-md-8">
                            <input id="nop_pbb" type="text" class="form-control @error('nop_pbb') is-invalid @enderror"
                                name="nop_pbb" value="{{$data->nop_pbb}}" autofocus>

                            @error('nop_pbb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-form-label text-md-left">Alamat</label>

                        <div class="col-md-8">
                            <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" aria-label="With textarea" rows="3" autofocus>{{$data->alamat}}</textarea>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url_gambar" class="col-md-2 col-form-label text-md-left">URL Gambar</label>

                        <div class="col-md-8">
                            <input id="imgInp" type="file"
                                class="form-control @error('url_gambar') is-invalid @enderror" name="url_gambar"
                                value="{{$data->url_gambar}}" autofocus>

                            <img class="image-preview mt-2" id="blah" src="{{$data->url_gambar}}" alt="your image" />
                            @error('url_gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="luas" class="col-md-2 col-form-label text-md-left">Luas Area</label>

                        <div class="col-md-8">
                            <input id="luas" type="text" class="form-control @error('luas') is-invalid @enderror"
                                name="luas" value="{{$data->luas}}" autofocus>

                            @error('luas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="batas" class="col-md-2 col-form-label text-md-left">Batas-batas</label>

                        <div class="col-md-8">
                            <input id="batas" type="text" class="form-control @error('batas') is-invalid @enderror"
                                name="batas" value="{{$data->batas}}" autofocus>

                            @error('batas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="koordinat" class="col-md-2 col-form-label text-md-left">Koordinat</label>

                        <div class="col-md-8">
                            <input id="koordinat" type="text"
                                class="form-control @error('koordinat') is-invalid @enderror" name="koordinat"
                                value="{{$data->koordinat}}" autofocus>

                            @error('koordinat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- //deskripsi -->
            <div class="card">
                <div class="card-header text-left">
                    <h5>Deskripsi Cagar Budaya</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-2 col-form-label text-md-left">Deskripsi CB</label>

                        <div class="col-md-8">
                            <input id="deskripsi" type="text"
                                class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                value="{{$data->deskripsi->deskripsi}}" autofocus>

                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="latar_belakang_sejarah" class="col-md-2 col-form-label text-md-left">Latar Belakang
                            Sejarah</label>

                        <div class="col-md-8">
                            <textarea id="latar_belakang_sejarah" type="text"
                                class="form-control @error('latar_belakang_sejarah') is-invalid @enderror"
                                name="latar_belakang_sejarah" aria-label="With textarea" rows="3"
                                autofocus>{{$data->deskripsi->latar_belakang_sejarah}}</textarea>
                            @error('latar_belakang_sejarah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="riwayat_penanganan" class="col-md-2 col-form-label text-md-left">Riwayat
                            Penanganan</label>

                        <div class="col-md-8">
                            <input id="riwayat_penanganan" type="text"
                                class="form-control @error('riwayat_penanganan') is-invalid @enderror"
                                name="riwayat_penanganan" value="{{$data->deskripsi->riwayat_penanganan}}" autofocus>

                            @error('riwayat_penanganan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_hukum" class="col-md-2 col-form-label text-md-left">Status Hukum</label>

                        <div class="col-md-8">
                            <input id="status_hukum" type="text"
                                class="form-control @error('status_hukum') is-invalid @enderror" name="status_hukum"
                                value="{{$data->deskripsi->status_hukum}}" autofocus>

                            @error('status_hukum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="kepemilikan" class="col-md-2 col-form-label text-md-left">Kepemilikan</label>

                        <div class="col-md-8">
                            <input id="kepemilikan" type="text"
                                class="form-control @error('kepemilikan') is-invalid @enderror" name="kepemilikan"
                                value="{{$data->deskripsi->kepemilikan}}" autofocus>

                            @error('kepemilikan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kondisi" class="col-md-2 col-form-label text-md-left">Kondisi</label>

                        <div class="col-md-8">
                            <input id="kondisi" type="text" class="form-control @error('kondisi') is-invalid @enderror"
                                name="kondisi" value="{{$data->deskripsi->kondisi}}" autofocus>

                            @error('kondisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- //pemilik -->
            <div class="card">
                <div class="card-header text-left">
                    <h5>Pemilik Cagar Budaya</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_pemilik" class="col-md-2 col-form-label text-md-left">Nama Pemilik CB</label>

                        <div class="col-md-8">
                            <input id="nama_pemilik" type="text"
                                class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik"
                                value="{{$data->pemilik->nama}}" autofocus>

                            @error('nama_pemilik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik" class="col-md-2 col-form-label text-md-left">NIK</label>

                        <div class="col-md-8">
                            <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{$data->pemilik->nik}}" autofocus>

                            @error('nik')
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
                                name="no_hp" value="{{$data->pemilik->no_hp}}" autofocus>

                            @error('no_hp')
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
                                name="email" value="{{$data->pemilik->email}}" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="alamat_pemilik" class="col-md-2 col-form-label text-md-left">Alamat</label>

                        <div class="col-md-8">
                            <input id="alamat_pemilik" type="text"
                                class="form-control @error('alamat_pemilik') is-invalid @enderror" name="alamat_pemilik"
                                value="{{$data->pemilik->alamat}}" autofocus>

                            @error('alamat_pemilik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <!-- //penilaian -->
            <div class="card">
                <div class="card-header text-left">
                    <h5>Penilaian Kriteria Cagar Budaya</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nilai_penting" class="col-md-2 col-form-label text-md-left">Nilai Penting</label>

                        <div class="col-md-8">
                            <input id="nilai_penting" type="text"
                                class="form-control @error('nilai_penting') is-invalid @enderror" name="nilai_penting"
                                value="{{$data->penilaian->nilai_penting}}" autofocus>

                            @error('nilai_penting')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dasar_rekomendasi" class="col-md-2 col-form-label text-md-left">Dasar
                            Rekomendasi</label>

                        <div class="col-md-8">
                            <input id="dasar_rekomendasi" type="text"
                                class="form-control @error('dasar_rekomendasi') is-invalid @enderror"
                                name="dasar_rekomendasi" value="{{$data->penilaian->dasar_rekomendasi}}" autofocus>

                            @error('dasar_rekomendasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penjelasan_tambahan" class="col-md-2 col-form-label text-md-left">Penjelasan
                            Tambahan</label>

                        <div class="col-md-8">
                            <input id="penjelasan_tambahan" type="text"
                                class="form-control @error('penjelasan_tambahan') is-invalid @enderror"
                                name="penjelasan_tambahan" value="{{$data->penilaian->penjelasan_tambahan}}" autofocus>

                            @error('penjelasan_tambahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <!-- //penetapan -->
            <div class="card">
                <div class="card-header text-left">
                    <h5>Urgensi Penetapan Cagar Budaya</h5>
                </div>

                <div class="card-header">
                    <div class="form-group row">
                        <label for="latar_belakang_penetapan" class="col-md-2 col-form-label text-md-left">Latar
                            Belakang
                            Penetapan</label>

                        <div class="col-md-8">
                            <textarea id="latar_belakang_penetapan" type="text"
                                class="form-control @error('latar_belakang_penetapan') is-invalid @enderror"
                                name="latar_belakang_penetapan" aria-label="With textarea" rows="3"
                                autofocus>{{$data->penetapan->latar_belakang_penetapan}}</textarea>
                            @error('latar_belakang_penetapan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hasil_verifikasi" class="col-md-2 col-form-label text-md-left">Hasil
                            Verifikasi</label>

                        <div class="col-md-8">
                            <input id="hasil_verifikasi" type="text"
                                class="form-control @error('hasil_verifikasi') is-invalid @enderror"
                                name="hasil_verifikasi" value="{{$data->penetapan->hasil_verifikasi}}" autofocus>

                            @error('hasil_verifikasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="text-md-left col-md-6 offset-md-2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                        <div class="col-md-2 text-right">
                            <a href="" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteModal"
                                role="button" aria-disabled="true">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus {{$data->nama}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    <form method="GET" action="/cagar/delete/{{$data->id}}">
                        @csrf
                        <button href="/cagar/delete/{{$data->id}}" onclick="event.preventDefault();
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