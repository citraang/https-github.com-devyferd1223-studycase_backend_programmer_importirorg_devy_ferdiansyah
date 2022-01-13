<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Barang;
use DB;

class BarangController extends Controller
{
    //
    public function index(){
        $barang=Barang::all();
        $data=['barang'=>$barang];
        return response()->json([
            'PT. Edrus Edukasi Utama -- '. Auth::user()->name,
            $data
        ], 200);
    }
    public function create(Request $request){
        $barang=new Barang();
        $barang->sku=$request->sku;
        $barang->id_kategori=$request->id_kategori;
        $barang->nama_barang=$request->nama_barang;
        $barang->harga_barang=$request->harga_barang;
        $barang->stok_barang=$request->stok_barang;
        $barang->save();
        return "Data barang sukses tersimpan";
    }
    public function update(Request $request, $sku){
        $barang=Barang::where('sku', $sku)->firstOrFail();
        // die($barang);
        $barang->nama_barang=$request->nama_barang;
        $barang->harga_barang=$request->harga_barang;
        $barang->stok_barang=$request->stok_barang;
        $barang->id_kategori=$request->id_kategori;
        $barang->update();
        return "Data barang sukses terupdate";
    }
    public function delete($sku){
        $barang=Barang::where('sku', $sku)->firstOrFail();
        $barang->delete();
        return "Data sukses terhapus";
    }
    public function laporan_stok_barang($type){
        if(Auth::user()->role_id<>1){
            return response()->json( [
                'error'   => false,
                'message' => trans( 'Hanya dapat diakses oleh Admin' )
            ] );
        }
        if($type=='hari'){
            $barang=Barang::select(
                "sku", "nama_barang", "stok_barang"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->get();
        }
        if($type=='minggu'){
            $barang=Barang::select(
                "sku", "nama_barang", "stok_barang"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("YEARWEEK(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='bulan'){
            $barang=Barang::select(
                "sku", "nama_barang", "stok_barang"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='tahun'){
            $barang=Barang::select(
                "sku", "nama_barang", "stok_barang"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("YEAR(DATE_FORMAT(created_at, '%Y-%m-%d')), MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
       // die($barang);
        $data=['barang'=>$barang];
        return response()->json([
            'Laporan Data STOK Barang PT. Edrus Edukasi Utama',
            $data
        ], 200);
    }

}
