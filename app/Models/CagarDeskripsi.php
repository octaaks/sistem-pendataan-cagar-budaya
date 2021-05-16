<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CagarDeskripsi extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "cb_deskripsi";
    
    protected $fillable = [
        'deskripsi',
        'latar_belakang_sejarah',
        'riwayat_penanganan',
        'status_hukum',
        'kepemilikan',
        'kondisi'
    ];

    protected $dates = ['deleted_at'];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}