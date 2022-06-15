<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Seller;
use App\Models\Pemesanan;
use App\Models\Pendapatan;
use Exception;
use Illuminate\Http\Request;

class ApiPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendapatan::all();
        $total = array();

        $seller = array();

        for ($i = 0;$i < count($data);$i++){

            $seller = Seller::where('id_Seller', $data[$i]->id_seller)->value('nama_seller');

            $data[$i]->nama_seller=$seller;
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
        $data           = Pendapatan::all();
        $produk         = Produk::all();
        $seller         = array();

        for ($i = 0;$i < count($produk);$i++){
            $seller = Seller::where('Id_Seller', $produk[$i]->Id_Seller)->value('id_Seller');
            $produk[$i]=$seller;
        };

        $total = Pemesanan::sum(Pemesanan::raw('data_pemesanan.total_harga'));

        $pendapatan = Pendapatan::create([
            'id_seller'       => $seller,
            'tanggal_keseller'=> date('Y/m/d'),
            'total_pendapatan'=> $total,
        ]);

        if ($pendapatan) {
            return ApiFormatter::createApi(200, 'Success Post', $pendapatan);
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