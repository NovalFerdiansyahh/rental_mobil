<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return $mobil;
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
        $table = Mobil::create([
            "nama_mobil" => $request->nama_mobil,
            "merk_mobil" => $request->merk_mobil,
            "jumlah_seat" => $request->jumlah_seat,
            "plat_nomor" => $request->plat_nomor,
            "harga_sewa" => $request->harga_sewa
        ]);
         return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
         ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::find($id);
        if ($mobil) {
            return response()->json([
                'status' => 200,
                'data' => $mobil
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
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
        $mobil = Mobil::find($id);
        if($mobil){
            $mobil->nama_mobil = $request->nama_mobil ? $request->nama_mobil : $mobil->nama_mobil;
            $mobil->merk_mobil = $request->merk_mobil ? $request->merk_mobil : $mobil->merk_mobil;
            $mobil->jumlah_seat = $request->jumlah_seat ? $request->jumlah_seat : $mobil->jumlah_seat;
            $mobil->plat_nomor = $request->plat_nomor ? $request->plat_nomor : $mobil->plat_nomor;
            $mobil->harga_sewa = $request->harga_sewa ? $request->harga_sewa : $mobil->harga_sewa;
            $mobil->save();

            return response()->json([
                'status' => 200,
                'data' => $mobil
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
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
        $mobil = Mobil::where('id',$id)->first();
        if($mobil){
            return response()->json([
                'status' => 200,
                'data' => $mobil
            ], 200);
         } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
         } 
    }
}
