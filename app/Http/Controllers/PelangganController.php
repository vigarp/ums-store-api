<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::get();
        $response = [
            'message' => 'List all user fethed',
            'data' => $pelanggan
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
            'nama' => ['required'],
            'domisili' => ['required'],
            'jenis_kelamin' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pelanggan = Pelanggan::create($request->all());
            $response = [
                'message' => 'Pelanggan baru berhasil diinput',
                'data' => $pelanggan
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e ) {
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
    public function show($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $response = [
            'message' => 'Detail pelanggan berhasil difetch',
            'data' => $pelanggan
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
    public function update(Request $request, $id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);

        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'domisili' => ['required'],
            'jenis_kelamin' => ['required'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pelanggan->update($request->all());
            $response = [
                'message' => 'Pelanggan berhasil diupdate',
                'data' => $pelanggan
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e ) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);

        try {
            $pelanggan->delete();
            $response = [
                'message' => 'Pelanggan berhasil didelete'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e ) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }
}
