<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data_pendapatan';
    protected $fillable = [
        'id_pendapatan',
        'id_seller',
        'tanggal_keseller',
        'total_pendapatan',
    ];
}
