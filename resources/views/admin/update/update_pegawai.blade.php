@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Edit Pegawai</p>
            </div>
            <div class="card-body">
                <form action="update_pegawai" id="rooms-setting" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Nama</strong></label>
                                <input class="form-control" type="text" id="nama_pegawai" value="{{$pegawai->nama_pegawai}}" name="nama_pegawai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="fakultas_id" class="form-label"><strong>Fakultas</strong></label>
                                <select name="fakultas_id" class="form-select form-control form-control-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                    <option selected hidden>Pilih Fakultas</option>
                                    @foreach ($fakultas as $p)
                                        <option value="{{ $p->id }}"{{ $p->id == $pegawai->fakultas_id ? 'selected' : '' }}>{{ $p->nama_fakultas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>NIP</strong></label>
                                <input class="form-control" type="text" id="nip" value="{{$pegawai->nip}}" name="nip">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Unit Kerja</strong></label>
                                <input class="form-control" type="text" id="unit_kerja" value="{{$pegawai->unit_kerja}}" name="unit_kerja">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Fungsional</strong></label>
                                <input class="form-control" type="text" id="fungsional" value="{{$pegawai->fungsional}}" name="fungsional">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Tugas Tambahan</strong></label>
                                <input class="form-control" type="text" id="tugas_tambahan" value="{{$pegawai->tugas_tambahan}}" name="tugas_tambahan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>S1</strong></label>
                                <input class="form-control" type="text" id="s1" value="{{$pegawai->s1}}" name="s1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>S2</strong></label>
                                <input class="form-control" type="text" id="s2" value="{{$pegawai->s2}}" name="s2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>S3</strong></label>
                                <input class="form-control" type="text" id="s3" value="{{$pegawai->s3}}" name="s3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Email</strong></label>
                                <input class="form-control" type="text" id="email" value="{{$pegawai->email}}" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>No HP</strong></label>
                                <input class="form-control" type="text" id="no_hp" value="{{$pegawai->no_hp}}" name="no_hp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="gambar"><strong>Gambar</strong></label>
                                <input class="form-control" type="file" id="gambar" name="gambar" value="{{$pegawai->gambar}}">
                                <label>Foto Saat Ini</label>
                                <br>
                                <img src="{{ asset('assets/img/'.$pegawai->gambar) }}" alt="gambar saat ini" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="modal-footer">
                            <button id="submitButton" name="kirim" class="btn btn-outline-dark w-175 shadow-none">Simpan</button>
                            <a href="/pegawai" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
