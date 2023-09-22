<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukUnggulan extends Model
{
    use HasFactory;

    protected $table = 'produk_unggulans';
    protected $fillable = [
        'type', 'foto', 'nama_produk', 'deskripsi'
    ];
}
