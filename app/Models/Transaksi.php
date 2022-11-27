<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'tanggal_penyewaan', 'mobil', 'lama_penyewaan', 'pembayaran_via', 'keterangan', 'harga_sewa', 'total_harga'
    ];
}
