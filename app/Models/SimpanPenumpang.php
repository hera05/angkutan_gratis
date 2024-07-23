<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanPenumpang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_penumpang',
        'alamat_penumpang',
        'jenis_penumpang'
    ];
}
