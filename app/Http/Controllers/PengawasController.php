<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPengawasan;
use App\Pekerjaan;
use App\PengawasanK3;
use App\ChecklistApd;
use App\ChecklistPeralatan;
use App\Peralatan;
use App\Apd;
use Auth;
use File;
use PDF;
use DB;
use Illuminate\Support\Facades\Storage;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalPengawasan::OrderBy('id','DESC')->get();
        return view('pengawas.index',compact('jadwal'));
    }

    public function jadwal()
    {

       $jadwal = JadwalPengawasan::OrderBy('id','DESC')->get();

       return view('pengawas.jadwal',compact('jadwal'));
   }

    //=======================================================================================================

   public function pengawas_pekerjaan()
   {

    $list_jadwal = JadwalPengawasan::OrderBy('id','DESC')->get();
    $data_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();

    return view('pengawas.pekerjaan',compact('data_pekerjaan','list_jadwal'));
}

public function pengawas_pekerjaan_add(Request $request)
{

    $add_data = new Pekerjaan();


    $add_data->pekerjaan = $request->input('pekerjaan');
    $add_data->plk_pekerjaan = $request->input('plk_pekerjaan');
    $add_data->no_pk = $request->input('no_pk');
    $add_data->hari_tgl = $request->input('hari_tgl');
    $add_data->wkt_pekerjaan_awal = $request->input('wkt_pekerjaan_awal');
    $add_data->wkt_pekerjaan_akhir = $request->input('wkt_pekerjaan_akhir');
    $add_data->id_jadwal_pengawasan = $request->input('id_jadwal_pengawasan');

    $add_data->save();

    return redirect('/pengawas_pekerjaan')->with('success', 'Data Pekerjan Berhasil Ditambahkan');
}


public function pengawas_pekerjaan_update(Request $request, $id)
{

  $data_update = Pekerjaan::where('id', $id)->first();


  $input = [
   'pekerjaan' => $request->pekerjaan,
   'plk_pekerjaan' => $request->plk_pekerjaan,
   'no_pk' => $request->no_pk,
   'hari_tgl' => $request->hari_tgl,
   'wkt_pekerjaan_awal' => $request->wkt_pekerjaan_awal,
   'wkt_pekerjaan_akhir' => $request->wkt_pekerjaan_akhir,


];


$data_update->update($input);

return redirect('/pengawas_pekerjaan')->with('success', 'Data Pekerjan Berhasil Diupdate');
}

public function pengawas_pekerjaan_delete($id)
{
  $delete = Pekerjaan::findOrFail($id);
  $delete->delete();

  return redirect('/pengawas_pekerjaan')->with('success', 'Data Pekerjan Berhasil Dihapus');
}

    //========================================================================================================
public function pengawas_pengawasan_k3()
{   

    $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();

    $data_pengawasan_k3 = PengawasanK3::OrderBy('id','DESC')->get();


    return view('pengawas.pengawasan_k3',compact('data_pengawasan_k3','list_pekerjaan'));
}


public function pengawas_pengawasan_k3_add(Request $request)
{



    $add_data = new PengawasanK3();


    $add_data->area = $request->input('area');
    $add_data->daerah_padam = $request->input('daerah_padam');
    $add_data->titik_lampu_gardu = $request->input('titik_lampu_gardu');
    $add_data->pengawas_k3 = $request->input('pengawas_k3');
    $add_data->pengawas_vendor = $request->input('pengawas_vendor');
    $add_data->jml_petugas = $request->input('jml_petugas');
    $add_data->sop = $request->input('sop');
    $add_data->ibpr = $request->input('ibpr');
    $add_data->jsa = $request->input('jsa');
    $add_data->working_permit = $request->input('working_permit');
    $add_data->arahan_pekerja = $request->input('arahan_pekerja');
    $add_data->pengecekan_komunikasi = $request->input('pengecekan_komunikasi');
    $add_data->unsafe_action = $request->input('unsafe_action');
    $add_data->unsafe_kondisi = $request->input('unsafe_kondisi');
    $add_data->id_pekerjaan = $request->input('id_pekerjaan');


    if($request->hasFile('dok_brief')){
        $file = $request->file('dok_brief');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/dok_brief/', $filename);
        $add_data->dok_brief = $filename;

    }else{
        echo "Gagal upload gambar";
    }

    if($request->hasFile('dok_pelaksanaan')){
        $file = $request->file('dok_pelaksanaan');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/dok_pelaksanaan/', $filename);
        $add_data->dok_pelaksanaan = $filename;

    }else{
        echo "Gagal upload gambar";
    }

    $add_data->save();

    return redirect('/pengawas_pengawasan_k3')->with('success', 'Data Pengawas Pengawasan K3 Berhasil Ditambahkan');
}


public function pengawas_edit_pengawasan_k3($id)
{   

    $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();

    $data_pengawasan_k3 = PengawasanK3::OrderBy('id','DESC')->where('id',$id)->get();


    return view('pengawas.edit.edit_pengawasan_k3',compact('data_pengawasan_k3','list_pekerjaan'));
}



public function pengawas_pengawasan_k3_update(Request $request, $id)
{

  $data_update = PengawasanK3::where('id', $id)->first();


  $input = [
   'area' => $request->area,
   'daerah_padam' => $request->daerah_padam,
   'titik_lampu_gardu' => $request->titik_lampu_gardu,
   'pengawas_k3' => $request->pengawas_k3,
   'pengawas_vendor' => $request->pengawas_vendor,
   'jml_petugas' => $request->jml_petugas,
   'sop' => $request->sop,
   'ibpr' => $request->ibpr,
   'jsa' => $request->jsa,
   'working_permit' => $request->working_permit,
   'arahan_pekerja' => $request->arahan_pekerja,
   'pengecekan_komunikasi' => $request->pengecekan_komunikasi,
   'unsafe_action' => $request->unsafe_action,
   'unsafe_kondisi' => $request->unsafe_kondisi,

];

if ($file = $request->file('dok_brief')) {
   if ($data_update->dok_brief) {
    File::delete('uploads/dok_brief/' . $data_update->dok_brief);
}
$nama_file = $file->getClientOriginalName();
$path = $file->store('public/uploads/dok_brief');
$file->move(public_path() . '/uploads/dok_brief/', $nama_file);
$input['dok_brief'] = $nama_file;
}

if ($file = $request->file('dok_pelaksanaan')) {
   if ($data_update->dok_pelaksanaan) {
    File::delete('uploads/dok_pelaksanaan/' . $data_update->dok_pelaksanaan);
}
$nama_file = $file->getClientOriginalName();
$path = $file->store('public/uploads/dok_pelaksanaan');
$file->move(public_path() . '/uploads/dok_pelaksanaan/', $nama_file);
$input['dok_pelaksanaan'] = $nama_file;
}


$data_update->update($input);

return redirect('/pengawas_pengawasan_k3')->with('success', 'Data Pengawas Pengawasan K3 Berhasil Diupdate');
}

public function pengawas_pengawasan_k3_delete($id)
{
  $delete = PengawasanK3::findOrFail($id);
  $delete->delete();

  return redirect('/pengawas_pengawasan_k3')->with('success', 'Data Pengawas Pengawasan K3 Berhasil Dihapus');

}
//=============================================================================================================

public function pengawas_checklist_apd()
{   
 $list_apd = Apd::all();
 $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();
 $data_apd = ChecklistApd::OrderBy('id','DESC')->get();
 $data_apd = DB::table('checklist_apd')
 ->join('apd', 'checklist_apd.id_apd', '=', 'apd.id')
 ->select('checklist_apd.*','apd.nama_apd')
 ->orderBy('checklist_apd.id','DESC')
 ->get();

 return view('pengawas.checklist_apd',compact('data_apd','list_apd','list_pekerjaan'));
}

public function pengawas_checklist_apd_add(Request $request)
{

    $add_data = new ChecklistApd();


    $add_data->nama_personel = $request->input('nama_personel');
    $add_data->id_apd = $request->input('id_apd');
    $add_data->hasil_sebelum = $request->input('hasil_sebelum');
    $add_data->hasil_saat = $request->input('hasil_saat');
    $add_data->hasil_setelah = $request->input('hasil_setelah');
    $add_data->id_pekerjaan = $request->input('id_pekerjaan');

    $add_data->save();

    return redirect('/pengawas_checklist_apd')->with('success', 'Data checklist apd Berhasil Ditambahkan');
}


public function pengawas_edit_checklist_apd(Request $request, $id)
{   
   $list_apd = Apd::all();
   $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();
   $data_apd = DB::table('checklist_apd')
   ->join('apd', 'checklist_apd.id_apd', '=', 'apd.id')
   ->select('checklist_apd.*','apd.nama_apd')
   ->orderBy('checklist_apd.id','DESC')
   ->where('checklist_apd.id', $id)
   ->get();


 return view('pengawas.edit.edit_checklist_apd',compact('data_apd','list_apd','list_pekerjaan'));
}



public function pengawas_checklist_apd_update(Request $request, $id)
{

  $data_update = ChecklistApd::where('id', $id)->first();


  $input = [
   'nama_personel' => $request->nama_personel,
   'id_apd' => $request->id_apd,
   'hasil_sebelum' => $request->hasil_sebelum,
   'hasil_saat' => $request->hasil_saat,
   'hasil_setelah' => $request->hasil_setelah,
];


$data_update->update($input);

return redirect('/pengawas_checklist_apd')->with('success', 'Data checklist apd Berhasil Diupdate');
}

public function pengawas_checklist_apd_delete($id)
{
  $delete = ChecklistApd::findOrFail($id);
  $delete->delete();

  return redirect('/pengawas_checklist_apd')->with('success', 'Data checklist apd Berhasil Dihapus');
}


//=============================================================================================================
public function pengawas_checklist_peralatan()
{

    $list_peralatan = Peralatan::all();
    $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();
    $data_peralatan = ChecklistPeralatan::OrderBy('id','DESC')->get();

    return view('pengawas.checklist_peralatan',compact('data_peralatan','list_peralatan','list_pekerjaan'));
}

public function pengawas_checklist_peralatan_add(Request $request)
{

    $add_data = new ChecklistPeralatan();
    

    $add_data->jumlah = $request->input('jumlah');
    $add_data->sat = $request->input('sat');
    $add_data->hasil_sebelum = $request->input('hasil_sebelum');
    $add_data->hasil_setelah = $request->input('hasil_setelah');
    $add_data->keterangan = $request->input('keterangan');
    $add_data->id_peralatan = $request->input('id_peralatan');
    $add_data->id_pekerjaan = $request->input('id_pekerjaan');

    if($request->hasFile('dok_pemasangan')){
        $file = $request->file('dok_pemasangan');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/dok_pemasangan/', $filename);
        $add_data->dok_pemasangan = $filename;

    }else{
        echo "Gagal upload gambar";
    }

    $add_data->save();

    return redirect('/pengawas_checklist_peralatan')->with('success', 'Data checklist peralatan Berhasil Ditambahkan');
}


public function pengawas_edit_checklist_peralatan(Request $request, $id)
{   

    $list_peralatan = Peralatan::all();
    $list_pekerjaan = Pekerjaan::OrderBy('id','DESC')->get();
    $data_peralatan = ChecklistPeralatan::OrderBy('id','DESC')->where('id',$id)->get();


 return view('pengawas.edit.edit_checklist_peralatan',compact('list_peralatan','list_pekerjaan','data_peralatan'));
}



public function pengawas_checklist_peralatan_update(Request $request, $id)
{

  $data_update = ChecklistPeralatan::where('id', $id)->first();


  $input = [
   'nama_peralatan' => $request->nama_peralatan,
   'jumlah' => $request->jumlah,
   'sat' => $request->sat,
   'hasil_sebelum' => $request->hasil_sebelum,
   'hasil_setelah' => $request->hasil_setelah,
   'keterangan' => $request->keterangan,
];

if ($file = $request->file('dok_pemasangan')) {
   if ($data_update->dok_pemasangan) {
    File::delete('uploads/dok_pemasangan/' . $data_update->dok_pemasangan);
}
$nama_file = $file->getClientOriginalName();
$path = $file->store('public/uploads/dok_pemasangan');
$file->move(public_path() . '/uploads/dok_pemasangan/', $nama_file);
$input['dok_pemasangan'] = $nama_file;
}


$data_update->update($input);

return redirect('/pengawas_checklist_peralatan')->with('success', 'Data checklist peralatan Berhasil Diupdate');
}

public function pengawas_checklist_peralatan_delete($id)
{
  $delete = ChecklistPeralatan::findOrFail($id);
  $delete->delete();

  return redirect('/pengawas_checklist_peralatan')->with('success', 'Data checklist peralatan Berhasil Dihapus');
}



//=============================================================================================================
public function pengawas_laporan_pekerjaan()
{

   $data_pengawasan = DB::table('pengawasan_k3')
   ->join('pekerjaan', 'pengawasan_k3.id_pekerjaan', '=', 'pekerjaan.id')
   ->join('jadwal_pengawasan', 'pekerjaan.id_jadwal_pengawasan', '=', 'jadwal_pengawasan.id')
   ->select('pengawasan_k3.*','pekerjaan.*','jadwal_pengawasan.*')
   ->orderBy('pengawasan_k3.id','DESC')
   ->get();



   foreach ($data_pengawasan as  $key => $value) {

     $c_apd = ChecklistApd::where('id_pekerjaan', $value->id_pekerjaan)->orderBy('id','DESC')->first();
     $c_peralatan = ChecklistPeralatan::where('id_pekerjaan', $value->id_pekerjaan)->orderBy('id','DESC')->first();

     if ($c_apd != null) {

         $value->nama_personel = $c_apd->nama_personel;
         $value->id_apd = $c_apd->id_apd;
         $value->hasil_sebelum = $c_apd->hasil_sebelum;
         $value->hasil_saat = $c_apd->hasil_saat;
         $value->hasil_setelah = $c_apd->hasil_setelah;
     }

     if ($c_peralatan != null) {

         $value->jumlah = $c_peralatan->jumlah;
         $value->sat = $c_peralatan->sat;
         $value->hasil_sebelum = $c_peralatan->hasil_sebelum;
         $value->hasil_setelah = $c_peralatan->hasil_setelah;
         $value->keterangan = $c_peralatan->keterangan;
         $value->id_peralatan = $c_peralatan->id_peralatan;
         $value->dok_pemasangan = $c_peralatan->dok_pemasangan;
     }

 }



    //return $data_pengawasan;

 return view('pengawas.laporan_pekerjaan',compact('data_pengawasan'));
}



public function pengawas_laporan_pengawasan_k3()
{

    $data_pengawasan = DB::table('pengawasan_k3')
    ->join('pekerjaan', 'pengawasan_k3.id_pekerjaan', '=', 'pekerjaan.id')
    ->select('pengawasan_k3.*','pekerjaan.pekerjaan','pekerjaan.plk_pekerjaan','pekerjaan.no_pk','pekerjaan.hari_tgl','pekerjaan.wkt_pekerjaan_awal','pekerjaan.wkt_pekerjaan_akhir','pekerjaan.id_jadwal_pengawasan')
    ->orderBy('pengawasan_k3.id','DESC')
    ->get();
//return $data_pengawasan;

    return view('pengawas.laporan_pengawasan_k3',compact('data_pengawasan'));
}



public function pengawas_laporan_pengawasan_k3_cetak(){

 $data_pengawasan = DB::table('pengawasan_k3')
 ->join('pekerjaan', 'pengawasan_k3.id_pekerjaan', '=', 'pekerjaan.id')
 ->select('pengawasan_k3.*','pekerjaan.*')
 ->orderBy('pengawasan_k3.id','DESC')
 ->get();

        // dd($data_pengawasan);
 view()->share('data_pengawasan', $data_pengawasan);

 $pdf = PDF::loadview('pengawas.cetak_laporan_pengawasan_k3', $data_pengawasan)->setPaper('A4','landscape');

 return $pdf->stream('laporan_pengawasan_k3.pdf');
        //return view('admin.fishmarket.lihat_pdf');
}


public function pengawas_laporan_pekerjaan_cetak(){

    $data_pengawasan = DB::table('pengawasan_k3')
    ->join('pekerjaan', 'pengawasan_k3.id_pekerjaan', '=', 'pekerjaan.id')
    ->join('jadwal_pengawasan', 'pekerjaan.id_jadwal_pengawasan', '=', 'jadwal_pengawasan.id')
    ->select('pengawasan_k3.*','pekerjaan.*','jadwal_pengawasan.*')
    ->orderBy('pengawasan_k3.id','DESC')
    ->get();


    foreach ($data_pengawasan as  $key => $value) {

       $c_apd = ChecklistApd::where('id_pekerjaan', $value->id_pekerjaan)->orderBy('id','DESC')->first();
       $c_peralatan = ChecklistPeralatan::where('id_pekerjaan', $value->id_pekerjaan)->orderBy('id','DESC')->first();

       if ($c_apd != null) {

           $value->nama_personel = $c_apd->nama_personel;
           $value->id_apd = $c_apd->id_apd;
           $value->hasil_sebelum = $c_apd->hasil_sebelum;
           $value->hasil_saat = $c_apd->hasil_saat;
           $value->hasil_setelah = $c_apd->hasil_setelah;
       }

       if ($c_peralatan != null) {

           $value->jumlah = $c_peralatan->jumlah;
           $value->sat = $c_peralatan->sat;
           $value->hasil_sebelum = $c_peralatan->hasil_sebelum;
           $value->hasil_setelah = $c_peralatan->hasil_setelah;
           $value->keterangan = $c_peralatan->keterangan;
           $value->id_peralatan = $c_peralatan->id_peralatan;
           $value->dok_pemasangan = $c_peralatan->dok_pemasangan;
       }

   }


        // dd($data_pengawasan);
   view()->share('data_pengawasan', $data_pengawasan);

   $pdf = PDF::loadview('pengawas.cetak_laporan_pekerjaan', $data_pengawasan)->setPaper('A4','landscape');

   return $pdf->stream('laporan_pekerjaan.pdf');
        //return view('admin.fishmarket.lihat_pdf');
}



    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
