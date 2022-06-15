<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data_pembayaran';
    protected $fillable = [
        'id_pembayaran',
        'id_pemesanan',
        'id_produk',
        'id_seller',
        'tanggal_pembayaran',
        'Status',
    ];
}
