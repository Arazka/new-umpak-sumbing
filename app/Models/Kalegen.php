<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalegen extends Model
{
    use HasFactory;

    protected $table = 'kalegens';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
