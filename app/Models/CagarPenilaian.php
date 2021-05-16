<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CagarPenilaian extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "cb_penilaian";
    
    protected $fillable = [
        'nilai_penting',
        'dasar_rekomendasi',
        'penjelasan_tambahan',
    ];
    
    protected $dates = ['deleted_at'];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}