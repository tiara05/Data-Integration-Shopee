<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'data_pengiriman';
    protected $fillable = [
        'id_pengiriman',
        'id_pemesanan',
        'id_produk',
        'id_seller',
    ];

    protected $hidden = [];
}
