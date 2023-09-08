<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngepanrejo extends Model
{
    use HasFactory;

    protected $table = 'Ngepanrejos';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
