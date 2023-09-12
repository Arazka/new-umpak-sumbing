<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';
    protected $fillable = [
        'foto', 'nama_desa', 'sejarah', 'foto_kawasan'
    ];

    public function pariwisata_desas()
    {
        return $this->hasMany(PariwisataDesa::class);
    }
}
