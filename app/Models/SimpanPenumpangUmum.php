<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanPenumpangUmum extends Model
{
    use HasFactory;
    protected $fillable = [
        'mobil2_id',
        'nama_penumpang',
        'alamat_penumpang',
    ];
    
    public function driver_penumpang1()
    {
        return $this->belongsTo(Plat_nomor::class, 'mobil2_id');
    }
}
