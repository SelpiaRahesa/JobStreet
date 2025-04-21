<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ url('home') }}" class="brand-link">
            <img src="{{ asset('assets/backend/assets/img/AdminLTELogo.png') }}" alt="Logo AdminLTE"
                 class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">JobShip</span>
        </a>
    </div>

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link active">
                        <i class="nav-icon bi bi-house-door"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Manajemen Pengguna -->
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Manajemen Pengguna</p>
                    </a>
                </li>

                <!-- Manajemen Perusahaan & Lowongan -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-briefcase"></i>
                        <p>
                            Perusahaan & Lowongan
                            <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('perusahaan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-building"></i>
                                <p>Manajemen Perusahaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('job_postings.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-clipboard-check"></i>
                                <p>Lowongan Pekerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pelamar.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-lines-fill"></i>
                                <p>Pelamar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manajemen Data -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Manajemen Data
                            <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('motivasi.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-stars"></i>
                                <p>Blog Motivasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lokasi.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-geo-alt-fill"></i>
                                <p>Lokasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jenis_pekerjaan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>Jenis Pekerjaan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
