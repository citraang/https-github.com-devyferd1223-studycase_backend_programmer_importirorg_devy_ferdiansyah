<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sku',
        'tgl_keluar',
        'jml_barang',
        'petugas',
        'created_at',
        'updated_at'
    ];
}
