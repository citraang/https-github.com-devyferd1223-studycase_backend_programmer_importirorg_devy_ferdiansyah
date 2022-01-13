<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use Auth;

class BarangMasukController extends Controller
{
    public function index(){
        $barangmasuk=BarangMasuk::all();
        $data =['barang'=>$barangmasuk];
        return response()->json([
            'PT. Edrus Edukasi Utama -- '. Auth::user()->name,
            $data], 200);
    }
    public function create(Request $request){
        $barangmasuk=new BarangMasuk();
        $barangmasuk->sku=$request->sku;
        $barangmasuk->tgl_masuk=$request->tgl_masuk;
        $barangmasuk->jml_barang=$request->jml_barang;
        $barangmasuk->petugas=Auth::user()->name;
        $barangmasuk->save();
        return "Data barang masuk sukses tersimpan";
    }
    public function update(Request $request, $id){
        $barangmasuk=BarangMasuk::where('id', $id)->firstOrFail();
        // die($barangmasuk);
        $barangmasuk->sku=$request->sku;
        $barangmasuk->tgl_masuk=$request->tgl_masuk;
        $barangmasuk->jml_barang=$request->jml_barang;
        $barangmasuk->petugas=Auth::user()->name;
        $barangmasuk->update();
        return "Data barang masuk sukses terupdate";
    }
    public function delete($id){
        $barangmasuk=BarangMasuk::where('id', $id)->firstOrFail();
        $barangmasuk->delete();
        return "Data sukses terhapus";
    }
    public function laporan_barang_masuk($type){
        if(Auth::user()->role_id<>1 && Auth::user()->role_id<>2){
            return response()->json( [
                'error'   => false,
                'message' => trans( 'Hanya dapat diakses oleh Admin dan Staff Gudang' )
            ] );
        }
        if($type=='hari'){
            $barangmasuk=BarangMasuk::select(
                "id", "sku", "tgl_masuk", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("id, sku, DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->get();
        }
        if($type=='minggu'){
            $barangmasuk=BarangMasuk::select(
                "id", "sku", "tgl_masuk", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("id, sku, YEARWEEK(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='bulan'){
            $barangmasuk=BarangMasuk::select(
                "id", "sku", "tgl_masuk", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("id, sku, MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='tahun'){
            $barangmasuk=BarangMasuk::select(
                "id", "sku", "tgl_masuk", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("id, sku, YEAR(DATE_FORMAT(created_at, '%Y-%m-%d')), MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
       // die($barang);
        $data=['barang'=>$barangmasuk];
        return response()->json([
            'Laporan Data Barang Masuk PT. Edrus Edukasi Utama',
            $data
        ], 200);
    }
}
