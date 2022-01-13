<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    protected $table = 'kategori_barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_kategori',
        'created_at',
        'updated_at'
    ];
}
