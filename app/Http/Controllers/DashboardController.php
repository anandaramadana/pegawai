<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
        $pegawai = DB::table('dosens')->count();
        $fakultas = DB::table('fakultases')->count();
        $admin = DB::table('users')->where('role', 'admin')->count();

        $jumlahFakultas = DB::table('fakultases')
        ->join('dosens', 'fakultases.id', '=', 'dosens.fakultas_id')
        ->select('fakultases.nama_fakultas', DB::raw('COUNT(dosens.id) as total_pegawai'))
        ->groupBy('fakultases.nama_fakultas')
        ->get();

        // Memisahkan data menjadi dua array: satu untuk label dan satu untuk data
        $labels = $jumlahFakultas->pluck('nama_fakultas')->toArray();
        $total_pegawai = $jumlahFakultas->pluck('total_pegawai')->toArray();

        return view('admin/dashboard', compact('fakultas','pegawai','admin','labels','total_pegawai'));
    }
}
