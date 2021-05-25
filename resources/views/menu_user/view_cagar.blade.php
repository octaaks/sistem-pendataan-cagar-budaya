@extends('layouts.master')
@section('title', 'Lihat Data Cagar Budaya')
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

        <table id="example1" class="table table-bordered table-hover ">
            <thead class="thead-dark">
                <th class="table-sub-title" colspan="2">Jumlah Cagar Budaya</th>
            </thead>
            <tr>
                <td>Nama Cagar Budaya</td>
                <td>{{$data->nama}}</td>
            </tr>
            <tr>
                <td>No Sertifikat</td>
                <td>{{$data->no_sertifikat}}</td>
            </tr>
            <tr>
                <td>NOP PBB</td>
                <td>{{$data->nop_pbb}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{$data->alamat}}</td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><img class="image-preview mt-2" id="blah" src="{{$data->url_gambar}}" /></td>
            </tr>
            <tr>
                <td>Luas Area</td>
                <td>{{$data->luas}}</td>
            </tr>
            <tr>
                <td>Batas-batas</td>
                <td>{{$data->batas}}</td>
            </tr>
            <tr>
                <td>Koordinat</td>
                <td>{{$data->koordinat}}</td>
            </tr>

            <thead class="thead-dark">
                <th class="table-sub-title" colspan="2">Deskripsi Cagar Budaya</th>
            </thead>
            <tr>
                <td>Deskripsi Cagar Budaya</td>
                <td>{{$data->deskripsi->deskripsi}}</td>
            </tr>
            <tr>
                <td>Latar Belakang Sejarah</td>
                <td>{{$data->deskripsi->latar_belakang_sejarah}}</td>
            </tr>
            <tr>
                <td>Riwayat Penanganan</td>
                <td>{{$data->deskripsi->riwayat_penanganan}}</td>
            </tr>
            <tr>
                <td>Status Hukum</td>
                <td>{{$data->deskripsi->status_hukum}}</td>
            </tr>
            <tr>
                <td>Kepemilikan</td>
                <td>{{$data->deskripsi->kepemilikan}}</td>
            </tr>

            <thead class="thead-dark">
                <th class="table-sub-title" colspan="2">Pemilik Cagar Budaya</th>
            </thead>
            <tr>
                <td>Nama Pemilik CB</td>
                <td>{{$data->pemilik->nama}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{{$data->pemilik->nik}}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>{{$data->pemilik->no_hp}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$data->pemilik->email}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{$data->pemilik->alamat}}</td>
            </tr>

            <thead class="thead-dark">
                <th class="table-sub-title" colspan="2">Penilaian Kriteria Cagar Budaya</th>
            </thead>
            <tr>
                <td>Nilai Penting</td>
                <td>{{$data->penilaian->nilai_penting}}</td>
            </tr>
            <tr>
                <td>Dasar Rekomendasi</td>
                <td>{{$data->penilaian->dasar_rekomendasi}}</td>
            </tr>
            <tr>
                <td>Penjelasan Tambahan</td>
                <td>{{$data->penilaian->penjelasan_tambahan}}</td>
            </tr>
            <tr>
            </tr>

            <thead class="thead-dark">
                <th class="table-sub-title" colspan="2">Urgensi Penetapan Cagar Budaya</th>
            </thead>
            <tr>
                <td>Latar Belakang Penetapan</td>
                <td>{{$data->penetapan->latar_belakang_penetapan}}</td>
            </tr>
            <tr>
                <td>Hasil Verifikasi</td>
                <td>{{$data->penetapan->hasil_verifikasi}}</td>
            </tr>

        </table>
        <div class="col-md-12 text-center">
            <a href="/cagar/edit/{{$data->id}}" class="center btn btn-info btn-md mt-5 mb-5" role="button"
                aria-disabled="true"><i class="fas fa-edit"></i> Edit
                Data</a>
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