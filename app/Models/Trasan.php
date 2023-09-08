<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trasan extends Model
{
    use HasFactory;

    protected $table = 'trasans';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
