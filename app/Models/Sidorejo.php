<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidorejo extends Model
{
    use HasFactory;

    protected $table = 'sidorejos';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
