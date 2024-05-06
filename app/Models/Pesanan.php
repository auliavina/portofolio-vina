<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_product',
        'nama',
        'no_hp',
        'alamat',
        'jumlah',
        'status',
        'bukti_pembayaran',
        'harga_total',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
