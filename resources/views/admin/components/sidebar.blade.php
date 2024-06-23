<ul class="navbar-nav sidebar sidebar-dark bg-primary accordion" id="accordionSidebar">

<!-- Profil Admin -->
@if (Auth::user())
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/profile-admin/{{ auth()->user()->id }}/edit">
        <div class="sidebar-brand-icon">
            <img class="bg-white rounded-circle" width="34" height="34" src="{{ asset('assets/img/'.auth()->user()->gambar) }}">
        </div>
        <div class="sidebar-brand-text mx-3">{{ auth()->user()->nama }}</div>
    </a>
@endif

<!-- Menu -->
<hr class="sidebar-divider my-0">
<!-- Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">
<!-- Heading Menu -->
<div class="sidebar-heading">
    Pencatatan
</div>
<!-- Fakultas -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('fakultas') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Fakultas</span>
    </a>
</li>

<!-- Pegawai -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('pegawai') }}">
        <i class="fas fa-fw fa-id-card"></i>
        <span>Pegawai</span>
    </a>
</li>

<!-- Logout -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}">
        <i class="fas fa-fw fa-ban"></i>
        <span>Logout</span>
    </a>
</li>

<!-- Tutup Sidebar -->
<hr class="sidebar-divider d-none d-md-block">
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
