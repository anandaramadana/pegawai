<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index() {
        $fakultas = Fakultas::all();
        $pegawai = Pegawai::all();
        return view('pegawai', [
            'title' => 'Pegawai',
            'fakultas' => $fakultas,
            'pegawai' => $pegawai
        ]);
    }

    public function show($id)
    {
        $pegawai = Pegawai::with('fakultas')->findOrFail($id);
        return view('detail-pegawai', compact('pegawai'));
    }

    public function pegawai() {
        return view('admin/data-pegawai', [
            'title' => 'pegawai',
            'pegawai' => Pegawai::all(),
            'fakultas' => Fakultas::all(),
        ]);
    }

    public function tambah_pegawai(Request $request)
    {
        $data = $request->except(['token', 'submit']);

        $paket = Pegawai::create($data);
        if($request->has(('gambar'))){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        if ($paket->save()) {
            return redirect('/pegawai')->with('tambah_pegawai', 'Pegawai Berhasil Ditambah!');
        };
    }

    public function delete_pegawai($id)
    {
        Pegawai::find($id)->delete();
        return redirect()->back()->with("delete_pegawai","Pegawai Berhasil di Hapus");
    }

    public function update_pegawai($id)
    {
        return view('admin/update/update_pegawai', [
            'title' => 'Update Pegawai',
            'pegawai'=> Pegawai::find($id),
            'fakultas' => Fakultas::all(),
        ]);
    }

    public function edit_pegawai(Request $request)
    {
        $pegawai = Pegawai::find($request->id);
        $pegawai->fakultas_id = $request->fakultas_id;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nip = $request->nip;
        $pegawai->unit_kerja = $request->unit_kerja;
        $pegawai->fungsional = $request->fungsional;
        $pegawai->tugas_tambahan = $request->tugas_tambahan;
        $pegawai->s1 = $request->s1;
        $pegawai->s2 = $request->s2;
        $pegawai->s3 = $request->s3;
        $pegawai->email = $request->email;

        $request->validate([
            'gambar' => 'nullable|image|mimes:pjeg,png,jpg,gif,svg',
         ]);
        // Periksa apakah ada file gambar yang diunggah
        if ($request->has('gambar')) {
            // Hapus gambar lama jika ada
            if ($pegawai->gambar) {
                Storage::delete('assets/img/' . $pegawai->gambar);
            }

            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $pegawai->gambar = $request->file('gambar')->getClientOriginalName();
        }

        if ($pegawai->save()) {
            return redirect('/pegawai')->with("edit_pegawai", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/pegawai')->with("edit_pegawai", "Gagal Diupdate!");
        }
    }
}
