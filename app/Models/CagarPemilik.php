<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarPemilik extends Model
{
    use HasFactory;
    
    protected $table = "cb_pemilik";
    
    protected $fillable = [
        'nama',
        'nik',
        'no_hp',
        'email',
        'alamat',
    ];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}