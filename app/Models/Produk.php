<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = 'data_produk';

    public function seller(){
        return $this->belongsTo('App\Models\Seller','id');
    }
}
