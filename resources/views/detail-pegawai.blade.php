@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <!-- Gambar Profil Pegawai -->
        <div class="col-md-4 mb-4">
            <div class="card-detail">
                <img src="{{ asset('assets/img/'. $pegawai->gambar) }}" class="card-img-top" alt="{{ $pegawai->nama_pegawai }}">
            </div>
        </div>

        <!-- Detail Data Pegawai -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="m-0 text-dark">Profil</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Nama</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->nama_pegawai }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>NIP</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->nip }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Unit Kerja</strong></div>
                        <div class="col-sm-8">:{{ $pegawai->unit_kerja }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Fungsional</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->fungsional }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Golongan</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->golongan }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Tugas Tambahan</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->tugas_tambahan }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Fakultas</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->fakultas->nama_fakultas }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Email</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->email }}</div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="m-0 text-dark">Riwayat Pendidikan</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>S3</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->s3 }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>S2</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->s2 }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>S1</strong></div>
                        <div class="col-sm-8">: {{ $pegawai->s1 }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-secondary">
                <a class="text-white" href="/list-pegawai">Kembali</a>
            </button>
        </div>
    </div>
</div>
@endsection
