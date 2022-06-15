<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Pendapatan;
use App\Models\Pemesanan;
use Exception;
use Illuminate\Http\Request;

class ApiSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::all();
        $tanggal = array();
        $total = array();

        for ($i = 0;$i < count($data);$i++){
            $tanggal = Pendapatan::where('id_seller', $data[$i]->id_Seller)->value('tanggal_keseller');
            $total = Pendapatan::where('id_seller', $data[$i]->id_Seller)->value('total_pendapatan');
            
            $data[$i]->tanggal_release=$tanggal;
            $data[$i]->total_pendapatan=$total;
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
    public function update(Request $request)
    {
        $data   = Pendapatan::all();
        $seller   = Seller::all();

        // $pemesanan = Pemesanan::findOrFail($id);

        for ($i = 0;$i < count($data);$i++){
            $pengiriman = Seller::where('id_pendapatan', $data[$i]->id_pendapatan)->update([
                'id_pendapatan'   => $data[$i]->id_pendapatan,
            ]);
        };

        if ($seller) {
            return ApiFormatter::createApi(200, 'Success Update', $seller);
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