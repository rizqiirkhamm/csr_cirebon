<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'summary';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
