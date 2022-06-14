<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Seller;
use Exception;
use Illuminate\Http\Request;

class ApiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();

        $namaseller = array();
        $toko = array();

        for ($i = 0;$i < count($data);$i++){
            $seller = Seller::where('Id_Seller', $data[$i]->Id_Seller)->value('nama_seller');
            $toko = Seller::where('Id_Seller', $data[$i]->Id_Seller)->value('nama_toko');
            
            $data[$i]->namaseller=$seller;
            $data[$i]->toko=$toko;
        };

        if ($data) {
            return ApiFormatter::createApi(200, 'Success GET', $data);
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