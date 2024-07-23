<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'datang_time', 'selesai_time', 'izin_time', 'izin_alasan', 'status',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'name');
    }
}
