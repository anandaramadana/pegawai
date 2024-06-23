@extends('layout.app')
@section('content')
<section class="container">
    <!-- Alert Error Login -->
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="content">
        <div class="content-img">
            <img src="{{ asset('assets/img/header.png') }}" alt="content-img">
        </div>
        <div class="content-title">
            <h1>Informasi</h1>
            <h3>Data Kepegawaian</h3>
            <p>Website sebagai sistem informasi kepegawaian dari Universitas Kita yang
                menampilkan data kepegawaian yang terdaftar di dalam kampus berdasarkan fakultas masing - masing.</p>
            <div class="content-btn">
                <a href="/list-pegawai" class="btn">Data Pegawai</a>
            </div>
            
            <!-- Media Sosial -->
            <ul class="content-socials">
                <li>
                    <a href="#"><i class="ri-facebook-circle-fill"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ri-twitter-fill"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ri-youtube-fill"></i></a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
