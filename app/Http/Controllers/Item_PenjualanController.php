<?php

namespace App\Http\Controllers;

use App\Models\Item_Penjualan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Item_PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_penjualan = Item_Penjualan::get();
        $response = [
            'message' => 'List item_penjualan fetched',
            'data' => $item_penjualan
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nota' => ['required', 'numeric'],
            'kode_barang' => ['required', 'numeric'],
            'qty' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $item_penjualan = Item_Penjualan::create($request->all());
            $response = [
                'message' => 'Item penjualan berhasil diinput',
                'data' => $item_penjualan
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_item_penjualan)
    {
        $item_penjualan = Item_Penjualan::where("nota", "=", "$id_item_penjualan")->get();
        $response = [
            'message' => 'Detail item penjualan berhasil difetch',
            'data' => $item_penjualan
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
        // Tidak ada update karena tidak ada primary key di table nya
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penjualan)
    {
        $penjualan = Item_Penjualan::findOrFail($id_penjualan);

        try {
            $penjualan->delete();
            $response = [
                'message' => 'Item Penjualan berhasil didelete'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }
}
