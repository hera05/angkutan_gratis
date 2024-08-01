<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAngkutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat_nomor',
        'nama_driver',
        'nama_rute',
        'opsi',
        'sesi',
        'jumlah_penumpang',
        'gambar',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
