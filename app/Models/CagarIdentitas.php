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
        return $this->hasOne('App\Models\CagarDeskripsi', 'cb_identitas_id');
    }
    
    public function pemilik()
    {
        return $this->hasOne('App\Models\CagarPemilik', 'cb_identitas_id');
    }
    
    public function penetapan()
    {
        return $this->hasOne('App\Models\CagarPenetapan', 'cb_identitas_id');
    }
    
    public function penilaian()
    {
        return $this->hasOne('App\Models\CagarPenilaian', 'cb_identitas_id');
    }
}