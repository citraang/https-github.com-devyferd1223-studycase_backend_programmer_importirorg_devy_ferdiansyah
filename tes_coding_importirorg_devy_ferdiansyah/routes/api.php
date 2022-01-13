<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::get('roleuser', 'RoleUserController@index');
Route::post('roleuser', 'RoleUserController@create');
Route::put('roleuser/{id}', 'RoleUserController@update');
Route::delete('roleuser/{id}', 'RoleUserController@delete');

Route::get('kategoribarang', 'KategoriBarangController@index')->middleware('jwt.verify');
Route::post('kategoribarang', 'KategoriBarangController@create')->middleware('jwt.verify');
Route::put('kategoribarang/{id}', 'KategoriBarangController@update')->middleware('jwt.verify');
Route::delete('kategoribarang/{id}', 'KategoriBarangController@delete')->middleware('jwt.verify');

Route::get('barang', 'BarangController@index')->middleware('jwt.verify');
Route::post('barang', 'BarangController@create')->middleware('jwt.verify');
Route::put('barang/{id}', 'BarangController@update')->middleware('jwt.verify');
Route::delete('barang/{id}', 'BarangController@delete')->middleware('jwt.verify');

// if(Auth::user()->role_id==2){
Route::get('barangmasuk', 'BarangMasukController@index')->middleware('jwt.verify');
Route::post('barangmasuk', 'BarangMasukController@create')->middleware('jwt.verify');
Route::put('barangmasuk/{id}', 'BarangMasukController@update')->middleware('jwt.verify');
Route::delete('barangmasuk/{id}', 'BarangMasukController@delete')->middleware('jwt.verify');

Route::get('barangkeluar', 'BarangKeluarController@index')->middleware('jwt.verify');
Route::post('barangkeluar', 'BarangKeluarController@create')->middleware('jwt.verify');
Route::put('barangkeluar/{id}', 'BarangKeluarController@update')->middleware('jwt.verify');
Route::delete('barangkeluar/{id}', 'BarangKeluarController@delete')->middleware('jwt.verify');
// }

// if(Auth::user()->role_id==1){
Route::get('laporan_stok_barang/{tipe}', 'BarangController@laporan_stok_barang')->middleware('jwt.verify');
Route::get('laporan_barang_masuk/{tipe}', 'BarangMasukController@laporan_barang_masuk')->middleware('jwt.verify');
Route::get('laporan_barang_keluar/{tipe}', 'BarangKeluarController@laporan_barang_keluar')->middleware('jwt.verify');
// }

Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
Route::post('logout', 'UserController@logout');

