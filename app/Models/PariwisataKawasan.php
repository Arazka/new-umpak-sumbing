<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PariwisataKawasan extends Model
{
    use HasFactory;

    protected $table = 'pariwisata_kawasans';
    protected $fillable = [
        'kawasan_id', 'foto', 'nama_wisata', 'deskripsi'
    ];

    public function kawasans()
    {
        return $this->belongsTo(Kawasan::class);
    }
}
