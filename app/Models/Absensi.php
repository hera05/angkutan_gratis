<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobil_id', 'foto', 'keterangan', 'status',
    ];


    public function mobil()
    {
        return $this->belongsTo(Plat_nomor::class, 'mobil_id');
    }
    // public function driver()
    // {
    //     return $this->belongsTo(User::class, 'name');
    // }
}
