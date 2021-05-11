<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CagarIdentitas;
use App\Models\CagarDeskripsi;
use App\Models\CagarPemilik;
use App\Models\CagarPenetapan;
use App\Models\CagarPenilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('url_gambar');
        $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'res/img/cb';
        $file->move($tujuan_upload, $nama_file);
        
        $identitas = new CagarIdentitas;
        $identitas -> nama           = $request-> nama         ;
        $identitas -> no_sertifikat  = $request-> no_sertifikat;
        $identitas -> nop_pbb        = $request-> nop_pbb      ;
        $identitas -> alamat         = $request-> alamat       ;

        if ($request->url_gambar) {
            $identitas -> url_gambar     = "/".$tujuan_upload.'/'.$nama_file;
        } else {
            $identitas -> url_gambar     = "/".$tujuan_upload.'/'.'default.png';
        }
        
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
        $param = $request->all();
        
        $data_identitas = [
            'nama'          => $param['nama'],
            'no_sertifikat' => $param['no_sertifikat'],
            'nop_pbb'       => $param['nop_pbb'],
            'alamat'        => $param['alamat'],
            // 'url_gambar                 ' => $param['url_gambar'],
            'luas'          => $param['luas'],
            'batas'         => $param['batas'],
            'koordinat'     => $param['koordinat'],
            
        ];
        $data_deskripsi = [
            'deskripsi'                 => $param['deskripsi'],
            'latar_belakang_sejarah'    => $param['latar_belakang_sejarah'],
            'riwayat_penanganan'        => $param['riwayat_penanganan'],
            'status_hukum'              => $param['status_hukum'],
            'kepemilikan'               => $param['kepemilikan'],
            'kondisi'                   => $param['kondisi'],

        ];
        $data_pemilik = [
            'nama'      => $param['nama_pemilik'],
            'nik'       => $param['nik'],
            'no_hp'     => $param['no_hp'],
            'email'     => $param['email'],
            'alamat'    => $param['alamat_pemilik'],

        ];
        $data_penetapan = [
            'latar_belakang_penetapan'  => $param['latar_belakang_penetapan'],
            'hasil_verifikasi'          => $param['hasil_verifikasi'],

        ];
        $data_penilaian = [
            'nilai_penting'         => $param['nilai_penting'],
            'dasar_rekomendasi'     => $param['dasar_rekomendasi'],
            'penjelasan_tambahan'   => $param['penjelasan_tambahan']
        ];

        $file = $request->file('url_gambar');

        // Kalo pas diedit gambar diganti / masukin gambar
        if ($file) {
            // menyimpan data file yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'res/img/cb';
            $file->move($tujuan_upload, $nama_file);
            
            $data_identitas['url_gambar'] = "/".$tujuan_upload."/".$nama_file; // Update field photo
        }

        try {
            DB::table('cb_identitas')   -> where('id', '=', $id) -> update($data_identitas);
            DB::table('cb_deskripsi')   -> where('cb_identitas_id', '=', $id) -> update($data_deskripsi);
            DB::table('cb_pemilik')     -> where('cb_identitas_id', '=', $id) -> update($data_pemilik);
            DB::table('cb_penetapan')   -> where('cb_identitas_id', '=', $id) -> update($data_penetapan);
            DB::table('cb_penilaian')   -> where('cb_identitas_id', '=', $id) -> update($data_penilaian);
                        
            return redirect('/cagar')->with('success', 'Data tersimpan!');
        } catch (\Exception $e) {
            // dd($e);
            return redirect('/cagar')->with('error', 'Terjadi kesalahan! Data tidak tersimpan!');
        }
    }
    
    public function destroy($id)
    {
        $data_identitas = CagarIdentitas::find($id);
        // dd($data_identitas->url_gambar);
        $data_deskripsi = CagarDeskripsi::where('cb_identitas_id', '=', $id)->first();
        $data_pemilik   = CagarPemilik::where('cb_identitas_id', '=', $id)->first();
        $data_penetapan = CagarPenetapan::where('cb_identitas_id', '=', $id)->first();
        $data_penilaian = CagarPenilaian::where('cb_identitas_id', '=', $id)->first();

        if (!$data_identitas) {
            return redirect('/cagar')->with('error', 'Terjadi kesalahan! Data tidak terhapus!');
        }
        
        $path = public_path().$data_identitas->url_gambar;
        unlink($path);

        File::delete($path);
        
        $data_identitas->delete();
        $data_deskripsi->delete();
        $data_pemilik  ->delete();
        $data_penetapan->delete();
        $data_penilaian->delete();

        return redirect('/cagar')->with('success', 'Data terhapus!');
    }
}