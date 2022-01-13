<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sku',
        'tgl_masuk',
        'jml_barang',
        'petugas',
        'created_at',
        'updated_at'
    ];
}
