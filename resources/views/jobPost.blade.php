@extends('layouts.home')
@section('content')
    <style>
        .form-container {
            max-width: 2000px;
            /* Lebarkan form */
            margin: auto;
            padding: 30px;
            /* Tambah padding agar lebih lega */
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        }

        .form-select {
            height: 55px;
            /* Tambahkan tinggi agar tidak kepotong */
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            width: 33%;
            text-align: center;
            font-weight: bold;
            color: #999;
            padding-bottom: 12px;
            border-bottom: 4px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .step i {
            font-size: 20px;
        }

        .step.active {
            color: #007bff;
            border-bottom: 4px solid #007bff;
        }

        .hidden {
            display: none;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 14px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        .btn-next {
            background: #007bff;
            color: #fff;
            padding: 14px 24px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-next:hover {
            background: #0056b3;
        }

        .btn-logout {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #c82333;
        }
    </style>

    <section>
        <div class="container mt-5">
            <div class="form-container">
                <h3 class="text-center mb-4">POST A JOB</h3>

                <!-- Tombol Logout -->
                @auth
                    <div class="text-end mb-4">
                        <button type="button" class="btn-logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endauth

                <div class="step-indicator">
                    <div class="step active" id="step1-indicator">
                        <i class="fa fa-building"></i> Info Perusahaan
                    </div>
                    <div class="step" id="step2-indicator">
                        <i class="fa fa-briefcase"></i> Detail Pekerjaan
                    </div>
                    <div class="step" id="step3-indicator">
                        <i class="fa fa-check-circle"></i> Konfirmasi
                    </div>
                </div>

                <form action="{{ route('user.perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="step1">
                        <div class="mb-4">
                            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                name="nama_perusahaan" placeholder="Nama Perusahaan" />
                            @error('nama_perusahaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $perusahaan }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $perusahaan }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                placeholder="telepon" />
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $perusahaan }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" required></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $perusahaan }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            {{-- <button type="button" class="btn-next" onclick="nextStep(2)">Lanjut</button>
                        </div>
                    </div>
                </form> --}}
                {{-- <form action="{{ route('user.job.store') }}" method="POST">
                    @csrf
                    <div id="step2" class="hidden">
                        <div class="mb-4">
                            <label class="form-label">Posisi Pekerjaan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            name="judul" placeholder="Posisi yang di buka" />
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $perusahaan }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Kategori Pekerjaan</label>
                            <select class="form-select" name="job_category" required>
                                <option value="" selected>Pilih Kategori</option>
                                <option value="IT">IT</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Engineering">Engineering</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tipe Pekerjaan</label>
                            <select class="form-select" name="job_type" required>
                                <option value="" selected>Pilih Tipe</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Gaji (Rp)</label>
                            <input type="number" class="form-control" name="salary" placeholder="Gaji yang ditawarkan"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="company_email"
                                placeholder="Masukkan Email Perusahaan" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn-next" onclick="nextStep(3)">Lanjut</button>
                        </div>
                    </div>
                    <div id="step3" class="hidden">
                        <div class="mb-4">
                            <label class="form-label">Deskripsi Pekerjaan</label>
                            <textarea class="form-control" name="job_description" rows="4" placeholder="Deskripsikan pekerjaan..."
                                required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Kualifikasi</label>
                            <textarea class="form-control" name="qualifications" rows="3"
                                placeholder="Sebutkan kualifikasi yang dibutuhkan..." required></textarea>
                        </div> --}}
                        <div class="text-end">
                            <button type="submit" class="btn-next">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function nextStep(step) {
            document.getElementById("step1").classList.add("hidden");
            document.getElementById("step2").classList.add("hidden");
            document.getElementById("step3").classList.add("hidden");
            document.getElementById("step" + step).classList.remove("hidden");
            document.querySelectorAll(".step").forEach(el => el.classList.remove("active"));
            document.getElementById("step" + step + "-indicator").classList.add("active");
        }
    </script>
@endsection
