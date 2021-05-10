<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CagarIdentitas;
use App\Models\CagarDeskripsi;
use App\Models\CagarPemilik;
use App\Models\CagarPenetapan;
use App\Models\CagarPenilaian;

class CagarController extends Controller
{
    public function index()
    {
        $data = CagarIdentitas::all();
        return view('menu_user.cagar', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu_user.form_cagar');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $identitas = new CagarIdentitas;
        $identitas -> nama           = $request-> nama         ;
        $identitas -> no_sertifikat  = $request-> no_sertifikat;
        $identitas -> nop_pbb        = $request-> nop_pbb      ;
        $identitas -> alamat         = $request-> alamat       ;
        $identitas -> url_gambar     = $request-> url_gambar   ;
        $identitas -> luas           = $request-> luas         ;
        $identitas -> batas          = $request-> batas        ;
        $identitas -> koordinat      = $request-> koordinat    ;
        $identitas -> save();

        $deskripsi = new CagarDeskripsi;
        $deskripsi -> deskripsi                 = $request -> deskripsi             ;
        $deskripsi -> latar_belakang_sejarah    = $request -> latar_belakang_sejarah;
        $deskripsi -> riwayat_penanganan        = $request -> riwayat_penanganan    ;
        $deskripsi -> status_hukum              = $request -> status_hukum          ;
        $deskripsi -> kepemilikan               = $request -> kepemilikan           ;
        $deskripsi -> kondisi                   = $request -> kondisi               ;
        
        $deskripsi->identitas()->associate($identitas);
        $deskripsi -> save();

        $pemilik = new CagarPemilik;
        $pemilik -> nama    = $request -> nama_pemilik   ;
        $pemilik -> nik     = $request -> nik            ;
        $pemilik -> no_hp   = $request -> no_hp          ;
        $pemilik -> email   = $request -> email          ;
        $pemilik -> alamat  = $request -> alamat_pemilik ;
        
        $pemilik->identitas()->associate($identitas);
        $pemilik -> save();

        $penetapan = new CagarPenetapan;
        $penetapan -> latar_belakang_penetapan  = $request -> latar_belakang_penetapan ;
        $penetapan -> hasil_verifikasi          = $request -> hasil_verifikasi         ;
        
        $penetapan->identitas()->associate($identitas);
        $penetapan -> save();

        $penilaian = new CagarPenilaian;
        $penilaian -> nilai_penting         = $request -> nilai_penting       ;
        $penilaian -> dasar_rekomendasi     = $request -> dasar_rekomendasi   ;
        $penilaian -> penjelasan_tambahan   = $request -> penjelasan_tambahan ;
        
        $penilaian->identitas()->associate($identitas);
        $penilaian -> save();

        return redirect('/cagar')->with('success', 'Data tersimpan!');
    }
    
    public function show($id)
    {
        $data = CagarIdentitas::find($id);
        return view('menu_user.view_cagar', ['data'=>$data]);
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}