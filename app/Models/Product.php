<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_product',
        'harga_satuan',
        'deskripsi',
        'foto',
    ];

    public function pesan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
