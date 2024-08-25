<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLaporan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan');
    }
}
