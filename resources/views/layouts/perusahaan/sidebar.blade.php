<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ url('home') }}" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ asset('assets/backend/assets/img/AdminLTELogo.png') }}"
                alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image-->
            <!--begin::Brand Text--> <span class="brand-text fw-light">Company</span> <!--end::Brand Text--> </a>
        <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item menu-open"> <a href="{{ url('/home') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item menu-open"> <a href="{{ route('perusahaan.jobPost.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-building"></i>
                        <p>
                           Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open"> <a href="{{ route('perusahaan.pelamar.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-people"></i>
                        <p>
                           pelamar
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item menu-open"> <a href="{{ route('perusahaan.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-person-vcard-fill"></i>
                        <p>
                           Employe Management
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                        <p>
                            Data Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('motivasi.index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-stars"></i>
                                <p>Blog Motivation</p>
                            </a> </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('bidang.index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-briefcase-fill"></i>
                                <p>Bidang</p>
                            </a> </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('lokasi.index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-geo-alt-fill"></i>
                                <p>Lokasi</p>
                            </a> </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('jenis_pekerjaan.index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-clock-fill"></i>
                                <p>Jenis Pekerjaan</p>
                            </a> </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('job_postings.index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-clock-fill"></i>
                                <p>Job Vacancy</p>
                            </a> </li>
                    </ul>

                </li> --}}
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
