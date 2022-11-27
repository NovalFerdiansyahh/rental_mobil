<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mobil', 'merk_mobil', 'jumlah_seat', 'plat_nomor', 'harga_sewa'
    ];
}
