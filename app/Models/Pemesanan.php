<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data_pemesanan';
    protected $fillable = [
        'id_pemesanan',
        'nama_user',
        'alamat_user',
        'no_hp',
        'id_produk',
        'qty',
        'total_harga',
        'tanggal_pemesanan',
        'id_pembayaran',
        'id_pengiriman',
        'total_bayar',
        'jenislayananpaket',
        'statusasuransi',
    ];

}
