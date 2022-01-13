<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBarang;
use Auth;

class KategoriBarangController extends Controller
{
    public function index(){
        $kategoribarang=KategoriBarang::all();
        $data=['kategoribarang'=>$kategoribarang];
        return response()->json([
            'PT. Edrus Edukasi Utama',
            $data
        ], 200);
    }
    public function create(Request $request){
        $kategoribarang=new KategoriBarang();
        $kategoribarang->nama_kategori=$request->nama_kategori;
        $kategoribarang->save();
        return "Data kategori barang sukses tersimpan";
    }
    public function update(Request $request, $id){
        $kategoribarang=KategoriBarang::where('id', $id)->firstOrFail();
        // die($kategoribarang);
        $kategoribarang->nama_kategori=$request->nama_kategori;
        $kategoribarang->update();
        return "Data kategori barang sukses terupdate";
    }

    public function delete($id){
        $kategoribarang=KategoriBarang::where('id', $id)->firstOrFail();
        $kategoribarang->delete();
        return "Data sukses terhapus";
    }
}
