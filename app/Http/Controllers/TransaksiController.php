<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
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
        $table = Transaksi::create([
            "nama" => $request->nama,
            "tanggal_penyewaan" => $request->tanggal_penyewaan,
            "mobil" => $request->mobil,
            "lama_penyewaan" => $request->lama_penyewaan,
            "pembayaran_via" => $request->pembayaran_via,
            "keterangan" => $request->keterangan,
            "harga_sewa" => $request->harga_sewa,
            "total_harga" => $request->total_harga
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
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = Transaksi::find($id);
        if($transaksi){
            $transaksi->nama = $request->nama ? $request->nama : $transaksi->nama;
            $transaksi->tanggal_penyewaan = $request->tanggal_penyewaan ? $request->tanggal_penyewaan : $transaksi->tanggal_penyewaan;
            $transaksi->mobil = $request->mobil ? $request->mobil : $transaksi->mobil;
            $transaksi->lama_penyewaan = $request->lama_penyewaan ? $request->lama_penyewaan : $transaksi->lama_penyewaan;
            $transaksi->pembayaran_via = $request->pembayaran_via ? $request->pembayaran_via : $transaksi->pembayaran_via;
            $transaksi->keterangan = $request->keterangan ? $request->keterangan : $transaksi->keterangan;
            $transaksi->harga_sewa = $request->harga_sewa ? $request->harga_sewa : $transaksi->harga_sewa;
            $transaksi->total_harga = $request->total_harga ? $request->total_harga : $transaksi->total_harga;
            $transaksi->save();

            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = Transaksi::where('id',$id)->first();
        if($transaksi){
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ], 200);
         } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
         } 
    }
}
