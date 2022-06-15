<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Seller;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Exception;
use Illuminate\Http\Request;

class ApiPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengiriman::all();
        $produk = array();

        $user = array();
        $alamatuser = array();
        $no_hp = array();

        $layanan = array();
        $asuransi = array();

        $pengirim = array();
        $alamatpengirim = array();
        $no_hppengirim = array();

        for ($i = 0;$i < count($data);$i++){
            $produk = Produk::where('Id_Produk', $data[$i]->id_produk)->value('Nama_Produk');

            $user = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('nama_user');
            $alamatuser = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('alamat_user');
            $no_hp = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('no_hp');

            $layanan = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('jenislayananpaket');
            $asuransi = Pemesanan::where('id_pemesanan', $data[$i]->id_pemesanan)->value('statusasuransi');

            $pengirim = Seller::where('id_Seller', $data[$i]->id_seller)->value('nama_seller');
            $alamatpengirim = Seller::where('id_Seller', $data[$i]->id_seller)->value('alamat_seller');
            $no_hppengirim = Seller::where('id_Seller', $data[$i]->id_seller)->value('nohp_seller');

            $data[$i]->nama_barang=$produk;

            $data[$i]->nama_penerima=$user;
            $data[$i]->alamat_penerima=$alamatuser;
            $data[$i]->no_hp=$no_hp;

            $data[$i]->jenis_layanan=$layanan;
            $data[$i]->status_asuransi=$asuransi;

            $data[$i]->nama_pengirim=$pengirim;
            $data[$i]->alamat_pengirim=$alamatpengirim;
            $data[$i]->no_hppengirim=$no_hppengirim;
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
        $data   = Pemesanan::all();

        $produk = Produk::all();
        $seller = array();

        for ($i = 0;$i < count($produk);$i++){
            $seller = Produk::where('Id_Seller', $produk[$i]->Id_Seller)->value('Id_Seller');

            $produk[$i]=$seller;
        };

        for ($i = 0;$i < count($data);$i++){
            $pengiriman = Pengiriman::create([
                'id_pemesanan'    => $data[$i]->id_pemesanan,
                'id_seller'       => $seller,
                'id_produk'       => $data[$i]->id_produk,
            ]);
        };
        
        if ($pengiriman) {
            return ApiFormatter::createApi(200, 'Success', $pengiriman);
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