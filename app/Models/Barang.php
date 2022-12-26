<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'kode', 'nama', 'merk', 'satuan', 'keterangan', 'kondisi', 'depresiasi', 'lama', 'harga', 'lokasi', 'jumlah', 'tgl_input'
    ];
}
