<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');


//proses register
Route::post('proses-register', 'AuthController@proses_register')->name('proses-register')->middleware('guest');

//proses login
Route::post('proses-login','AuthController@proses_login')->name('proses-login')->middleware('guest');

Route::group(['middleware' => ['auth', 'petugas']],function(){
    Route::get('/petugas', 'PetugasController@index')->name('petugas');
    Route::get('/petugas_jadwal', 'PetugasController@jadwal')->name('petugas_jadwal');
    Route::post('/petugas_jadwal_add', 'PetugasController@jadwal_add')->name('petugas_jadwal_add');
    Route::post('/petugas_jadwal_update/{id}', 'PetugasController@jadwal_update')->name('petugas_jadwal_update');
    Route::post('/petugas_jadwal_delete/{id}', 'PetugasController@jadwal_delete')->name('petugas_jadwal_delete');    

    Route::get('/petugas_pekerjaan', 'PetugasController@petugas_pekerjaan')->name('petugas_pekerjaan');
    Route::get('/petugas_pengawasan_k3', 'PetugasController@petugas_pengawasan_k3')->name('petugas_pengawasan_k3');
    Route::get('/petugas_checklist_apd', 'PetugasController@petugas_checklist_apd')->name('petugas_checklist_apd');
    Route::get('/petugas_checklist_peralatan', 'PetugasController@petugas_checklist_peralatan')->name('petugas_checklist_peralatan');
});



Route::group(['middleware' => ['auth', 'pengawas']],function(){
    Route::get('/pengawas', 'PengawasController@index')->name('pengawas');
    Route::get('/pengawas_jadwal', 'PengawasController@jadwal')->name('pengawas_jadwal');

    Route::get('/pengawas_pekerjaan', 'PengawasController@pengawas_pekerjaan')->name('pengawas_pekerjaan');
    Route::post('/pengawas_pekerjaan_add', 'PengawasController@pengawas_pekerjaan_add')->name('pengawas_pekerjaan_add');
    Route::post('/pengawas_pekerjaan_update/{id}', 'PengawasController@pengawas_pekerjaan_update')->name('pengawas_pekerjaan_update');
    Route::post('/pengawas_pekerjaan_delete/{id}', 'PengawasController@pengawas_pekerjaan_delete')->name('pengawas_pekerjaan_delete');

    Route::get('/pengawas_pengawasan_k3', 'PengawasController@pengawas_pengawasan_k3')->name('pengawas_pengawasan_k3');
    Route::post('/pengawas_pengawasan_k3_add', 'PengawasController@pengawas_pengawasan_k3_add')->name('pengawas_pengawasan_k3_add');
    Route::post('/pengawas_pengawasan_k3_update/{id}', 'PengawasController@pengawas_pengawasan_k3_update')->name('pengawas_pengawasan_k3_update');
    Route::post('/pengawas_pengawasan_k3_delete/{id}', 'PengawasController@pengawas_pengawasan_k3_delete')->name('pengawas_pengawasan_k3_delete');


    Route::get('/pengawas_checklist_apd', 'PengawasController@pengawas_checklist_apd')->name('pengawas_checklist_apd'); 
    Route::post('/pengawas_checklist_apd_add', 'PengawasController@pengawas_checklist_apd_add')->name('pengawas_checklist_apd_add');
    Route::post('/pengawas_checklist_apd_update/{id}', 'PengawasController@pengawas_checklist_apd_update')->name('pengawas_checklist_apd_update');
    Route::post('/pengawas_checklist_apd_delete/{id}', 'PengawasController@pengawas_checklist_apd_delete')->name('pengawas_checklist_apd_delete');


    Route::get('/pengawas_checklist_peralatan', 'PengawasController@pengawas_checklist_peralatan')->name('pengawas_checklist_peralatan');
    Route::post('/pengawas_checklist_peralatan_add', 'PengawasController@pengawas_checklist_peralatan_add')->name('pengawas_checklist_peralatan_add');
    Route::post('/pengawas_checklist_peralatan_update/{id}', 'PengawasController@pengawas_checklist_peralatan_update')->name('pengawas_checklist_peralatan_update');
    Route::post('/pengawas_checklist_peralatan_delete/{id}', 'PengawasController@pengawas_checklist_peralatan_delete')->name('pengawas_checklist_peralatan_delete');


    Route::get('/pengawas_laporan_pekerjaan', 'PengawasController@pengawas_laporan_pekerjaan')->name('pengawas_laporan_pekerjaan');
    Route::get('/pengawas_laporan_pekerjaan_cetak', 'PengawasController@pengawas_laporan_pekerjaan_cetak')->name('pengawas_laporan_pekerjaan_cetak');

    Route::get('/pengawas_laporan_pengawasan_k3', 'PengawasController@pengawas_laporan_pengawasan_k3')->name('pengawas_laporan_pengawasan_k3');
});




Route::group(['middleware' => ['auth', 'pimpinan']],function(){
    Route::get('/pimpinan', 'PimpinanController@index')->name('pimpinan');
    Route::get('/pimpinan_laporan_pekerjaan', 'PimpinanController@pimpinan_laporan_pekerjaan')->name('pimpinan_laporan_pekerjaan');
    Route::get('/pimpinan_laporan_pengawasan_k3', 'PimpinanController@pimpinan_laporan_pengawasan_k3')->name('pimpinan_laporan_pengawasan_k3');
});

Route::get('logout-pengawas', 'AuthController@logout')->name('logout-pengawas')->middleware(['pengawas', 'auth']);
Route::get('logout-petugas', 'AuthController@logout')->name('logout-petugas')->middleware(['petugas', 'auth']);
Route::get('logout-pimpinan', 'AuthController@logout')->name('logout-pimpinan')->middleware(['pimpinan', 'auth']);

