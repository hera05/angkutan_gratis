<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanPenumpang extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobil1_id',
        'penumpang_id',
    ];

    public function driver_penumpang()
    {
        return $this->belongsTo(Plat_nomor::class, 'mobil1_id');
    }
    public function penumpang()
    {
        return $this->belongsTo(DataPelajar::class, 'penumpang_id');
    }
}
