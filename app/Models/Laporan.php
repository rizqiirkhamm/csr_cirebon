<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_sektor',
        'id_program',
        'id_proyek',
        'judul_laporan',
        'tanggal',
        'bulan',
        'tahun',
        'realisasi',
        'deskripsi',
        'thumbnail',
        'images',
        'status',
        'pesan_admin'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program');
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    public function getThumbnailAttribute()
    {
        $images = $this->images;
        return !empty($images) ? $images[0] : 'images/thumbnail.png';
    }

    public function getImagesAttribute($value)
    {
        return is_string($value) ? json_decode($value, true) : (is_array($value) ? $value : []);
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = is_array($value) ? json_encode($value) : $value;
    }
}