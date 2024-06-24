@extends('layout.app')
@section('content')
<section class="container">
    <div class="row mb-4">
        <h4 class="fw-bold mb-4 text-light">Kepegawaian</h4>

        <!-- Filter Berdasarkan Fakultas -->
        <div class="col-12">
            <select id="fakultasFilter" class="form-select">
                <option value="all">Semua Fakultas</option>
                @foreach($fakultas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- List Pegawai -->
    <div class="row" id="productList">
        @foreach($pegawai as $item)
            <div class="filter-fakultas col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-category="{{ $item->fakultas_id }}">
                <div class="card">
                    <img src="{{ asset('assets/img/'. $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_kue }}">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <u><h5 class="card-title fw-bold">{{ $item->nama_pegawai }}</h5></u>
                        <h5 class="card-title fw-bold">{{ $item->nip }}</h5>
                        <p class="card-text text-primary mb-0">{{ $item->tugas_tambahan }}</p>
                        <p class="card-text text-primary">{{ $item->fungsional }}</p>
                        <div class="d-flex mx-auto align-items-center mt-auto">
                            <button type="button" class="btn btn-primary">
                                <a href="/detail-pegawai/{{ $item->id }}" class="text-white">Detail</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
