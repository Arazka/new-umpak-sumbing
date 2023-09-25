<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLembaga extends Model
{
    use HasFactory;

    protected $table = 'profil_lembagas';
    protected $fillable = [
        'type', 'sejarah', 'visi_dan_misi', 'tugas_dan_fungsi'
    ];
}
