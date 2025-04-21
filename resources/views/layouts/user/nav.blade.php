<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-bolder fs-2 fst-italic" href="#">
        <div class="text-info">JOB</div>
        <div class="text-warning">SHIP</div>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
          <li class="nav-item px-2"><a class="nav-link fw-medium active" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{ url('job') }}">Jobs</a></li>
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{ url('motivation') }}">Career tips</a></li>
        </ul>

        @auth
          <div class="dropdown ps-lg-5">
            <button class="btn btn-lg btn-primary dropdown-toggle rounded-pill bg-gradient" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="#">Profil Saya</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <div class="ps-lg-5">
            @auth
            <!-- Jika user sudah login, tampilkan tombol untuk perusahaan -->
            @if (Auth::user()->role === 'perusahaan')
                <a href="{{ url('perusahaan/jobPost') }}" class="btn btn-lg btn-primary rounded-pill bg-gradient order-0">
                    Untuk Perusahaan
                </a>
            @endif
        @else
            <!-- Jika user belum login, tampilkan tombol yang mengarah ke login -->
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary rounded-pill bg-gradient order-0">
                Untuk Perusahaan
            </a>
        @endauth

          </div>
        @endauth

      </div>
    </div>
  </nav>
