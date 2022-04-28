<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_nota)
    {
        $history = Penjualan::join('pelanggans', 'penjualans.kode_pelanggan', '=', 'pelanggans.id_pelanggan')
            ->join('item_penjualans', 'penjualans.id_nota', '=', 'item_penjualans.nota')
            ->join('barangs', 'item_penjualans.kode_barang', '=', 'barangs.kode_barang')
            ->where('id_nota', '=', "$id_nota")
            ->get(['penjualans.id_nota', 'penjualans.kode_pelanggan', 'pelanggans.nama', 'item_penjualans.kode_barang', 'barangs.nama', 'barangs.kategori', 'barangs.harga', 'item_penjualans.qty']);
        $response = [
            'message' => 'Detail history pelanggan',
            'data' => $history
        ];
        return response()->json($response, Response::HTTP_OK);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
