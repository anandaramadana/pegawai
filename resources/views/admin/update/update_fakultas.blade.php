@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Edit Fakultas</p>
            </div>
            <div class="card-body">
                <form action="update_fakultas" id="rooms-setting" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama"><strong>Nama Fakultas</strong></label>
                                <input class="form-control" type="text" id="nama_fakultas" value="{{$fakultas->nama_fakultas}}" name="nama_fakultas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label" for="gambar"><strong>Gambar</strong></label>
                                <input class="form-control" type="file" id="gambar" name="gambar" value="{{$fakultas->gambar}}">
                                <label>Foto Saat Ini</label>
                                <br>
                                <img src="{{ asset('assets/img/'.$fakultas->gambar) }}" alt="gambar saat ini" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="modal-footer">
                            <button id="submitButton" name="kirim" class="btn btn-outline-dark w-175 shadow-none">Simpan</button>
                            <a href="/fakultas" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
