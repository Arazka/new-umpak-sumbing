<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    use HasFactory;

    protected $table = 'kawasans';
    protected $fillable = [
        'foto', 'nama_kawasan'
    ];

    public function pariwisata_kawasans()
    {
        return $this->hasMany(PariwisataKawasan::class);
    }
}
