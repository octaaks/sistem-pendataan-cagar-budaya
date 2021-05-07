<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarPenetapan extends Model
{
    use HasFactory;
    
    protected $table = "cb_identitas";
    
    protected $fillable = [
        'latar_belakang_penetapan',
        'hasil_verifiksai',
    ];

    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas');
    }
}