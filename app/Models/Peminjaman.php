<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_peminjaman', 'kode_barang', 'id_peminjam', 'jumlah_pinjam', 'tgl_pinjam', 'batas', 'tgl_kembali', 'kondisi_awal', 'kondisi_kembali', 'terlambat', 'denda', 'status'
    ];
}
