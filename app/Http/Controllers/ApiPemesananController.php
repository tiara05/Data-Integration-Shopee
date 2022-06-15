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

class ApiPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data           = Pemesanan::all();
        $toko           = array();
        $produk         = Produk::all();
        $seller         = array();

        for ($i = 0;$i < count($produk);$i++){
            $seller = Seller::where('Id_Seller', $produk[$i]->Id_Seller)->value('nama_toko');
            $produk[$i]=$seller;
        };

        for ($i = 0;$i < count($data);$i++){
            $toko = Produk::where('Id_Produk', $data[$i]->id_produk)->value('Nama_Produk');
            $data[$i]->nama_barang=$toko;
            $data[$i]->nama_toko=$seller;
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
        $request->validate([
            'nama_user'         => 'required',
            'alamat_user'       => 'required',
            'no_hp'             => 'required',
            'id_produk'         => 'required',
            'qty'               => 'required',
            'jenislayananpaket' => 'required',
            'statusasuransi'    => 'required',
        ]);

        $data = Pemesanan::all();
        $toko = array();

        for ($i = 0;$i < count($data);$i++){
            $toko = Produk::where('Id_Produk', $data[$i]->id_produk)->value('Harga');
            $data[$i]->nama_barang=$toko;
        };


        $pemesanan = Pemesanan::create([
            'nama_user'         => $request->nama_user,
            'alamat_user'       => $request->alamat_user,
            'no_hp'             => $request->no_hp,
            'id_produk'         => $request->id_produk,
            'qty'               => $request->qty,
            'jenislayananpaket' => $request->jenislayananpaket,
            'statusasuransi'    => $request->statusasuransi,
            'tanggal_pemesanan' => date('Y/m/d'),
            'total_harga'       => $toko*$request->qty,
            'total_bayar'       => $toko*$request->qty,
        ]);

        if ($pemesanan) {
            return ApiFormatter::createApi(200, 'Success', $pemesanan);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
        
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
    public function updatepengiriman(Request $request)
    {
        $data   = Pengiriman::all();
        $pemesanan   = Pemesanan::all();

        // $pemesanan = Pemesanan::findOrFail($id);

        for ($i = 0;$i < count($data);$i++){
            $pengiriman = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->update([
                'id_pengiriman'   => $data[$i]->id_pengiriman,
            ]);
        };

        if ($pemesanan) {
            return ApiFormatter::createApi(200, 'Success Update', $pemesanan);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function updatepembayaran(Request $request)
    {
        $data   = Pembayaran::all();
        $pemesanan   = Pemesanan::all();

        // $pemesanan = Pemesanan::findOrFail($id);

        for ($i = 0;$i < count($data);$i++){
            $pengiriman = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->update([
                'id_pembayaran'   => $data[$i]->id_pembayaran,
            ]);
        };

        if ($pemesanan) {
            return ApiFormatter::createApi(200, 'Success Update', $pemesanan);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
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