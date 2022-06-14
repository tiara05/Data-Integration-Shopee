<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Seller;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use Exception;
use Illuminate\Http\Request;

class ApiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::all();
        $produk = array();

        $user = array();
        $no_hp = array();

        $qty = array();
        $total = array();

        for ($i = 0;$i < count($data);$i++){
            $produk = Produk::where('Id_Produk', $data[$i]->id_produk)->value('Nama_Produk');
            $produk = Produk::where('Id_Produk', $data[$i]->id_produk)->value('Kategori_Produk');

            $user = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('nama_user');
            $no_hp = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('no_hp');

            $qty = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('qty');
            $total = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('total_harga');

            $data[$i]->nama_barang=$produk;

            $data[$i]->nama_penerima=$user;
            $data[$i]->no_hp=$no_hp;

            $data[$i]->qty=$qty;
            $data[$i]->total_harga=$total;
        };

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}