<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FakultasController extends Controller
{
    public function fakultas() {
        return view('admin/data-fakultas', [
            'title' => 'fakultas',
            'fakultas' => Fakultas::all(),
        ]);
    }

    public function tambah_fakultas(Request $request)
    {
        $data = $request->except(['token', 'submit']);

        $paket = Fakultas::create($data);
        if($request->has(('gambar'))){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        if ($paket->save()) {
            return redirect('/fakultas')->with('tambah_fakultas', 'Fakultas Berhasil Ditambah!');
        };
    }

    public function delete_fakultas($id)
    {
        Fakultas::find($id)->delete();
        return redirect()->back()->with("delete_fakultas","Fakultas Berhasil di Hapus");
    }

    public function update_fakultas($id)
    {
        return view('admin/update/update_fakultas', [
            'title' => 'Update Fakultas',
            'fakultas'=> Fakultas::find($id)
        ]);
    }

    public function edit_fakultas(Request $request)
    {
        $fakultas = Fakultas::find($request->id);
        $fakultas->nama_fakultas = $request->nama_fakultas;

        $request->validate([
            'gambar' => 'nullable|image|mimes:pjeg,png,jpg,gif,svg',
         ]);
        // Periksa apakah ada file gambar yang diunggah
        if ($request->has('gambar')) {
            // Hapus gambar lama jika ada
            if ($fakultas->gambar) {
                Storage::delete('assets/img/' . $fakultas->gambar);
            }

            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $fakultas->gambar = $request->file('gambar')->getClientOriginalName();
        }

        if ($fakultas->save()) {
            return redirect('/fakultas')->with("edit_fakultas", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/fakultas')->with("edit_fakultas", "Gagal Diupdate!");
        }
    }
}
