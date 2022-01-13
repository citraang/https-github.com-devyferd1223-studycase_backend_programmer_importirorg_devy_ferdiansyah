<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKeluar;
use Auth;

class BarangKeluarController extends Controller
{
    public function index(){
        $barangkeluar=BarangKeluar::all();
        $data =['barang'=>$barangkeluar];
        return response()->json([
            'PT. Edrus Edukasi Utama -- '. Auth::user()->name,
            $data], 200);
    }
    public function create(Request $request){
        $barangkeluar=new BarangKeluar();
        $barangkeluar->sku=$request->sku;
        $barangkeluar->tgl_keluar=$request->tgl_keluar;
        $barangkeluar->jml_barang=$request->jml_barang;
        $barangkeluar->petugas=Auth::user()->name;
        $barangkeluar->save();
        return "Data barang keluar sukses tersimpan";
    }
    public function update(Request $request, $id){
        $barangkeluar=BarangKeluar::where('id', $id)->firstOrFail();
        // die($barangkeluar);
        $barangkeluar->sku=$request->sku;
        $barangkeluar->tgl_keluar=$request->tgl_keluar;
        $barangkeluar->jml_barang=$request->jml_barang;
        $barangkeluar->petugas=Auth::user()->name;
        $barangkeluar->update();
        return "Data barang keluar sukses terupdate";
    }
    public function delete($id){
        $barangkeluar=BarangKeluar::where('id', $id)->firstOrFail();
        $barangkeluar->delete();
        return "Data sukses terhapus";
    }
    public function laporan_barang_keluar($type){
        if($type=='hari'){
            $barangkeluar=BarangKeluar::select(
                "sku", "tgl_keluar", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->get();
        }
        if($type=='minggu'){
            $barangkeluar=BarangKeluar::select(
                "sku", "tgl_keluar", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("YEARWEEK(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='bulan'){
            $barangkeluar=BarangKeluar::select(
                "sku", "tgl_keluar", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
        if($type=='tahun'){
            $barangkeluar=BarangKeluar::select(
                "sku", "tgl_keluar", "jml_barang", "petugas"
                )
                ->orderBy('created_at')
                ->groupBy(DB::raw("YEAR(DATE_FORMAT(created_at, '%Y-%m-%d')), MONTH(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                ->get();
        }
       // die($barang);
        $data=['barang'=>$barangkeluar];
        return response()->json([
            'Laporan Data Barang Keluar PT. Edrus Edukasi Utama',
            $data
        ], 200);
    }
}
