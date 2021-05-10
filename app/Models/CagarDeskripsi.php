<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarDeskripsi extends Model
{
    use HasFactory;
    
    protected $table = "cb_deskripsi";
    
    protected $fillable = [
        'deskripsi',
        'latar_belakang_sejarah',
        'riwayat_penanganan',
        'status_hukum',
        'kepemilikan',
        'kondisi'
    ];

    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}