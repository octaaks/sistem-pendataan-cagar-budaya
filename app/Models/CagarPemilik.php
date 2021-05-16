<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CagarPemilik extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "cb_pemilik";
    
    protected $fillable = [
        'nama',
        'nik',
        'no_hp',
        'email',
        'alamat',
    ];
    
    protected $dates = ['deleted_at'];
    
    public function identitas()
    {
        return $this->belongsTo('App\Models\CagarIdentitas', 'cb_identitas_id');
    }
}