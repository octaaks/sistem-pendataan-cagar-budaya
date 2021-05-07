<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarIdentitas extends Model
{
    use HasFactory;
    
    protected $table = "cb_identitas";
    
    protected $fillable = [
        'nama',
        'no_sertifikat',
        'nop_pbb',
        'alamat',
        'url_gambar',
        'luas',
        'batas',
        'koordinat',
    ];
    
    public function deskripsi()
    {
        return $this->hasOne('App\Models\CagarDeskripsi');
    }
    
    public function pemilik()
    {
        return $this->hasMany('App\Models\CagarPemilik');
    }
    
    public function penetapan()
    {
        return $this->hasOne('App\Models\CagarPenetapan');
    }
    
    public function penilaian()
    {
        return $this->hasOne('App\Models\CagarPenilaian');
    }
}