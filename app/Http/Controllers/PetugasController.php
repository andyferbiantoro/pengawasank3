<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPengawasan;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalPengawasan::OrderBy('id','DESC')->get();
        return view('petugas.index',compact('jadwal'));
    }

    public function jadwal()
    {

        $jadwal = JadwalPengawasan::OrderBy('id','DESC')->get();

        return view('petugas.jadwal',compact('jadwal'));
    }

    public function petugas_pekerjaan()
    {
        return view('petugas.pekerjaan');
    }

    public function petugas_pengawasan_k3()
    {
        return view('petugas.pengawasan_k3');
    }

    public function petugas_checklist_apd()
    {
        return view('petugas.checklist_apd');
    }

    public function petugas_checklist_peralatan()
    {
        return view('petugas.checklist_peralatan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwal_add(Request $request)
    {
        
        $add_data = new JadwalPengawasan();
        

        $add_data->no_surat_tugas = $request->input('no_surat_tugas');
        $add_data->tgl_surat_tugas  = $request->input('tgl_surat_tugas');
        $add_data->pekerjaan = $request->input('pekerjaan');
        $add_data->no_pk = $request->input('no_pk');
        $add_data->lokasi = $request->input('lokasi');
        $add_data->titik_tumpu = $request->input('titik_tumpu');
        $add_data->koordinat = $request->input('koordinat');
        $add_data->penyulang = $request->input('penyulang');
        $add_data->pelaksana = $request->input('pelaksana');
        $add_data->pengawas = $request->input('pengawas');
        $add_data->id_user = $request->input('id_user');
        $add_data->level = $request->input('level');

        
        if($request->hasFile('arsip_surat_tugas')){
            $file = $request->file('arsip_surat_tugas');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/arsip_surat_tugas/', $filename);
            $add_data->arsip_surat_tugas = $filename;

        }else{
            echo "Gagal upload gambar";
        }

        $add_data->save();

        return redirect('/petugas_jadwal')->with('success', 'Jadwal Berhasil Ditambahkan');
    }

    public function jadwal_update(Request $request, $id)
     {

          $data_update = JadwalPengawasan::where('id', $id)->first();


          $input = [
               'no_surat_tugas' => $request->no_surat_tugas,
               'tgl_surat_tugas' => $request->tgl_surat_tugas,
               'pekerjaan' => $request->pekerjaan,
               'no_pk' => $request->no_pk,
               'lokasi' => $request->lokasi,
               'titik_tumpu' => $request->titik_tumpu,
               'koordinat' => $request->koordinat,
               'penyulang' => $request->penyulang,
               'pelaksana' => $request->pelaksana,
               'pengawas' => $request->pengawas,
               
          ];

          if ($file = $request->file('arsip_surat_tugas')) {
               if ($data_update->arsip_surat_tugas) {
                    File::delete('uploads/arsip_surat_tugas/' . $data_update->arsip_surat_tugas);
               }
               $nama_file = $file->getClientOriginalName();
               $path = $file->store('public/uploads/arsip_surat_tugas');
               $file->move(public_path() . '/uploads/arsip_surat_tugas/', $nama_file);
               $input['arsip_surat_tugas'] = $nama_file;
              
          }


          $data_update->update($input);

           return redirect('/petugas_jadwal')->with('success', 'Jadwal Berhasil Diupdate');
     }

     public function jadwal_delete($id)
     {
          $delete = JadwalPengawasan::findOrFail($id);
          File::delete('uploads/arsip_surat_tugas/' . $delete->arsip_surat_tugas);
          $delete->delete();

          return redirect('/petugas_jadwal')->with('success', 'Jadwal Berhasil Dihapus');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    
}
