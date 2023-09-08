<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gandusari extends Model
{
    use HasFactory;

    protected $table = 'gandusaris';
    protected $fillable = [
        'foto', 'judul', 'deskripsi',
    ];
}
