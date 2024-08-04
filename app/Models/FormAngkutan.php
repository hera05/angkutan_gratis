<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAngkutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'petugas_id',
        'plat_nomor_id',
        'opsi',
        'sesi',
        'gambar',
       
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
    public function plat_nomor()
    {
        return $this->belongsTo(Plat_nomor::class, 'plat_nomor_id');
    }
}
