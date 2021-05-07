<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarPenilaian extends Model
{
    use HasFactory;
    
    protected $table = "cb_penilaian";
    
    protected $fillable = [
        'nilai_penting',
        'dasar_rekomendasi',
        'penjelasan_tambahan',
    ];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas');
    }
}