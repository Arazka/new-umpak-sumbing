<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PariwisataDesa extends Model
{
    use HasFactory;

    protected $table = 'pariwisata_desas';
    protected $fillable = [
        'desa_id','foto', 'nama_wisata', 'deskripsi'
    ];

    public function desas()
    {
        return $this->belongTo(Desa::class);
    }
}
