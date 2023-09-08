<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejosari extends Model
{
    use HasFactory;

    protected $table = 'rejosaris';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
