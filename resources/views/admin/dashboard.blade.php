@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mt-5 mb-0 text-gray-800 font-weight-bold">Dashboard</h3>
    </div>
    <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-xl-7 col-lg-7">
            <!-- Widget Fakultas -->
            <div class="card border-left-warning shadow py-2 mb-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-2">
                                Fakultas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $fakultas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget Pegawai -->
            <div class="card border-left-info shadow py-2 mb-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-2">
                                Pegawai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pegawai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget Admin -->
            <div class="card border-left-danger shadow py-2 mb-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-danger text-uppercase mb-2">
                                Admin
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 text-dark font-weight-bold">Daftar Pegawai</h5>
                    <div>
                        <button type="submit" class="btn btn-primary text-white shadow-none">
                            <a href="/pegawai" class="text-white text-decoration-none">Detail</a>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-2 pb-2">
                        <canvas id="myPieChart" data-labels="{{ json_encode(array_values($labels)) }}" data-total="{{ json_encode(array_values($total_pegawai)) }}"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
