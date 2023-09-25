<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpkpBKAD extends Model
{
    use HasFactory;

    protected $table = 'rpkp_bkads';
    protected $fillable = [
        'foto', 'deskripsi'
    ];
}
