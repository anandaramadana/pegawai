@extends('admin.layouts.app')
@section('content')
<style>
    .error {
        color: red;
        font-size: 0.9em;
    }
</style>
<div class="container-fluid">
    <h3 class="mb-2 mt-5 text-gray-800 font-weight-bold">Pengaturan Pegawai</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (session()->has('tambah_pegawai'))
            <div class="alert alert-info alert-dismissible" role="alert">
                {{ session('tambah_pegawai') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif
            @if (session()->has('delete_pegawai'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete_pegawai') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif
            @if (session()->has('edit_pegawai'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('edit_pegawai') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
            @endif

            <div class="card-tools">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah_pegawai">
                        <i class="fas fa-plus"></i> Tambah Pegawai
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Pegawai -->
        <div class="modal fade" id="tambah_pegawai" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="/tambah_pegawai" name="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pegawai</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control shadow-none">
                                <div id="errorNama" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fakultas</label>
                                <br>
                                <select name="fakultas_id" class="form-select form-control form-control-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                    <option selected value="" hidden>Pilih Fakultas</option>
                                    @foreach ($fakultas as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_fakultas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control shadow-none">
                                <div id="errorNIP" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Unit Kerja</label>
                                <input type="text" name="unit_kerja" class="form-control shadow-none">
                                <div id="errorUnit" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fungsional</label>
                                <input type="text" name="fungsional" class="form-control shadow-none">
                                <div id="errorFungsional" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tugas Tambahan</label>
                                <input type="text" name="tugas_tambahan" class="form-control shadow-none">
                                <div id="errorTugas" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">S1</label>
                                <input type="text" name="s1" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">S2</label>
                                <input type="text" name="s2" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">S3</label>
                                <input type="text" name="s3" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control shadow-none">
                                <div id="errorEmail" class="error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Telpon</label>
                                <input type="text" min="1" name="no_hp" class="form-control shadow-none">
                                <div id="errorNo" class="error"></div>
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

        <!-- Tabel Data Pegawai -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Fungsional</th>
                            <th>Tugas_Tambahan</th>
                            <th>Riwayat Pendidikan</th>
                            <th>Gambar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Fungsional</th>
                            <th>Tugas_Tambahan</th>
                            <th>Riwayat Pendidikan</th>
                            <th>Gambar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($pegawai as $item)
                        <tbody>
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->unit_kerja }}</td>
                                <td>{{ $item->fungsional }}</td>
                                <td>{{ $item->tugas_tambahan }}</td>
                                <td>
                                    <ul>
                                        <li>S1 : {{ $item->s1 }}</li>
                                        <li>S2 : {{ $item->s2 }}</li>
                                        <li>S3 : {{ $item->s3 }}</li>
                                    </ul>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/'.$item->gambar) }}" style="width: 100px;" class="align-items-center">
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="/pegawai/{{ $item->id }}/edit" title="Edit Pegawai">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/pegawai/{{ $item->id }}/delete" onclick="return confirm('Apakah yakin ingin menghapus?')" title="Hapus Pegawai">
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
        var nama_pegawai = document.forms["form"]["nama_pegawai"].value;
        var errorNama = document.getElementById("errorNama");

        var nip = document.forms["form"]["nip"].value;
        var errorNIP = document.getElementById("errorNIP");

        var unit_kerja = document.forms["form"]["unit_kerja"].value;
        var errorUnit = document.getElementById("errorUnit");

        var fungsional = document.forms["form"]["fungsional"].value;
        var errorFungsional = document.getElementById("errorFungsional");

        var tugas_tambahan = document.forms["form"]["tugas_tambahan"].value;
        var errorTugas = document.getElementById("errorTugas");

        var email = document.forms["form"]["email"].value;
        var errorEmail = document.getElementById("errorEmail");

        var no_hp = document.forms["form"]["no_hp"].value;
        var errorNo = document.getElementById("errorNo");

        var gambar = document.forms["form"]["gambar"].value;
        var errorGambar = document.getElementById("errorGambar");

        errorNama.innerHTML = "";
        errorNIP.innerHTML = "";
        errorUnit.innerHTML = "";
        errorFungsional.innerHTML = "";
        errorTugas.innerHTML = "";
        errorEmail.innerHTML = "";
        errorNo.innerHTML = "";
        errorGambar.innerHTML = "";

        if (nama_pegawai === "") {
            errorNama.innerHTML = "Nama tidak boleh kosong.";
            isValid = false;
        }

        if (nip === "") {
            errorNIP.innerHTML = "NIP tidak boleh kosong.";
            isValid = false;
        }

        if (unit_kerja === "") {
            errorUnit.innerHTML = "Unit Kerja tidak boleh kosong.";
            isValid = false;
        }

        if (fungsional === "") {
            errorFungsional.innerHTML = "Fungsional tidak boleh kosong.";
            isValid = false;
        }

        if (tugas_tambahan === "") {
            errorTugas.innerHTML = "Tugas Tambahan tidak boleh kosong.";
            isValid = false;
        }

        if (email === "") {
            errorEmail.innerHTML = "Email tidak boleh kosong.";
            isValid = false;
        }

        if (no_hp === "") {
            errorNo.innerHTML = "No HP tidak boleh kosong.";
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
