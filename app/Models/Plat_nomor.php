<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat_nomor extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek_mobil',
        'plat_nomor',
        'no_stnk',
        'status_pajak',
        'uji_kir',
        'jumlah_kursi',
        'user_id',
        'rute_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

    public function presensis()
    {
        return $this->hasMany(Absensi::class);
    }
    public function angkutans()
    {
        return $this->hasMany(FormAngkutan::class, 'plat_nomor_id');
    }
}
