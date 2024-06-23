<nav>
    <!-- Logo Navar -->
    <div class="navbar-header">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                <span>Pegawai</span>
            </a>
        </div>
        <div id="menu-bar" class="menu-bar">
            <i class="ri-menu-line"></i>
        </div>
    </div>

    <!-- Menu Navbar -->
    <ul class="navbar-link" id="navbar-link">
        <li><a href="/">Beranda</a></li>
        <li><a href="{{ route('list-pegawai') }}">Pegawai</a></li>
        @if (!Auth::user())
            <li class="button-login d-flex gap-1">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#">Login</a>
            </li>
        @endif
        @if (Auth::user())
            <li class="d-flex gap-1">
                <a class="nav-link fw-medium dropdown-toggle d-flex align-items-center ms-2 gap-2" href="#" style="font-size: 1rem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/img/'.auth()->user()->gambar) }}" alt="Logo" width="34" height="34"
                        class="d-inline-block align-text-top bg-white rounded-circle">
                    {{ auth()->user()->nama }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-dark" href="#">Profile</a></li>
                    <li><a class="dropdown-item text-dark" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        @endif
    </ul>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" data-bs-theme="dark">
        <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="50" height="40"
                class="d-inline-block align-text-top">
                Login
            </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('login') }}" method="POST">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="nama@gmail.com" value="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success rounded">Masuk</button>
            </div>
        </form>
    </div>
    </div>
</div>
