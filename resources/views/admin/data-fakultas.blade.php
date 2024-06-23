@extends('admin.layouts.app')
@section('content')
<style>
    .error {
        color: red;
        font-size: 0.9em;
    }
</style>
<div class="container-fluid">
    <h3 class="mb-2 mt-5 text-gray-800 font-weight-bold">Pengaturan Fakultas</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (session()->has('tambah_fakultas'))
            <div class="alert alert-info alert-dismissible" role="alert">
                {{ session('tambah_fakultas') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif
            @if (session()->has('delete_fakultas'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete_fakultas') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif
            @if (session()->has('edit_fakultas'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('edit_fakultas') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif

            <div class="card-tools">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah_fakultas">
                        <i class="fas fa-plus"></i> Tambah Fakultas
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Fakultas -->
        <div class="modal fade" id="tambah_fakultas" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="/tambah_fakultas" name="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Fakultas</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Fakultas</label>
                                <input type="text" min="1" name="nama_fakultas" class="form-control shadow-none">
                                <div id="errorNama" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Gambar</label>
                                <input type="file" name="gambar" class="form-control shadow-none" accept="image/*">
                                <div id="errorGambar" class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success text-white shadow-none">Tambah</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Data Fakultas -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($fakultas as $item)
                        <tbody>
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $item->nama_fakultas }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/'.$item->gambar) }}" style="width: 200px;" class="align-items-center">
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="/fakultas/{{ $item->id }}/edit" title="Edit Fakultas">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/fakultas/{{ $item->id }}/delete" onclick="return confirm('Apakah yakin ingin menghapus?')" title="Hapus Kategori">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('form[name="form"]');
        console.log(form);
        if (form) {
            form.addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });
        } else {
            console.error("Form not found!");
        }
    });
    function validateForm() {
        var isValid = true;
        var nama_fakultas = document.forms["form"]["nama_fakultas"].value;
        var errorNama = document.getElementById("errorNama");

        var gambar = document.forms["form"]["gambar"].value;
        var errorGambar = document.getElementById("errorGambar");

        errorNama.innerHTML = "";
        errorGambar.innerHTML = "";

        if (nama_fakultas=== "") {
            errorNama.innerHTML = "Nama tidak boleh kosong.";
            isValid = false;
        }

        if (gambar === "") {
            errorGambar.innerHTML = "Gambar tidak boleh kosong.";
            isValid = false;
        }

        return isValid;
    }
</script>
@endsection
