<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rute',
    ];

    public function platNomors()
    {
        return $this->hasMany(Plat_nomor::class);
    }
}
