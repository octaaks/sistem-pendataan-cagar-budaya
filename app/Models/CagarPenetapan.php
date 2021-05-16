<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CagarPenetapan extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "cb_penetapan";
    
    protected $fillable = [
        'latar_belakang_penetapan',
        'hasil_verifikasi'
    ];

    protected $dates = ['deleted_at'];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}