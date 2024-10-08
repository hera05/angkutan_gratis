<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelajar',
        'alamat_pelajar'
    ];

    public function simpan_penumpang()
    {
        return $this->hasMany(SimpanPenumpang::class);
    }
}
