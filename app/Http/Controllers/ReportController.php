<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\History;
use App\Models\CagarIdentitas;
use App\Models\CagarDeskripsi;
use App\Models\CagarPemilik;
use App\Models\CagarPenetapan;
use App\Models\CagarPenilaian;

class ReportController extends Controller
{
    public function index()
    {
        $semua = CagarIdentitas::all()->count();
        $myString = 'Diterima';

        $terverifikasi          = CagarPenetapan::query()->where('hasil_verifikasi', 'like', 'Terverifikasi')->get()->count();
        $tidak_terverifikasi    = CagarPenetapan::query()->where('hasil_verifikasi', 'like', 'Belum Terverifikasi')->get()->count();
        
        $deleted = CagarIdentitas::onlyTrashed()->get()->count();

        return view('menu_user.report', [
            'deleted'=>$deleted,
            'terverifikasi'=>$terverifikasi,
            'tidak_terverifikasi'=>$tidak_terverifikasi,
            'semua'=>$semua
        ]);
    }
}