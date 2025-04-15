@extends('layouts.home')
@section('content')
    <style>
        .form-container {
            max-width: 2000px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
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

                <div class="step-indicator">
                    <div class="step active" id="step1-indicator">
                        <i class="fas fa-building"></i> Info Perusahaan
                    </div>
                    <div class="step" id="step2-indicator">
                        <i class="fas fa-briefcase"></i> Detail Pekerjaan
                    </div>
                    <div class="step" id="step3-indicator">
                        <i class="fas fa-check-circle"></i> Konfirmasi
                    </div>
                </div>

                <form id="form1" class="step-form" action="{{ route('user.perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- STEP 1 -->
                    <div id="step1">
                        <div class="mb-3">
                            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                name="nama_perusahaan" placeholder="Nama Perusahaan" required />
                            @error('nama_perusahaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                placeholder="telepon" required />
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" required></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                accept="image/*" required>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn-next" onclick="submitStep1()">Lanjut</button>
                        </div>
                    </div>
                </form>

                <form id="form2" class="step-form hidden" action="{{ route('user.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- STEP 2 -->
                    <div id="step2">
                        <input type="hidden" name="id_perusahaan" value="{{ session('id_perusahaan') }}">

                        <div class="mb-3">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            name="judul" placeholder="Posisi yang dibutuhkan" required />
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="id_bidang" required>
                                <option value="">Pilih Bidang</option>
                                @foreach (App\Models\Bidang::all() as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="id_jenis" required>
                                <option value="">Pilih Tipe Pekerjaan</option>
                                @foreach (App\Models\Jenis_pekerjaan::all() as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_pekerjaan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gaji (Rp)</label>
                            <input type="text" class="form-control" name="rentang_gaji" placeholder="Gaji yang ditawarkan" required />
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="lokasi" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach (App\Models\Lokasi::all() as $data)
                                    <option value="{{ $data->id }}">{{ $data->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn-next" onclick="nextStep(1)">Kembali</button>
                            <button type="button" class="btn-next" onclick="nextStep(3)">Lanjut</button>
                        </div>
                    </div>

                    <!-- STEP 3 -->
                    <div id="step3">
                        <div class="mb-4">
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Deskripsikan lowongan pekerjaan" required></textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <textarea name="kualifikasi" class="form-control @error('kualifikasi') is-invalid @enderror"
                                placeholder="Masuka kulifikasi berdasarkan standar perusahaan" required></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn-next" onclick="nextStep(2)">Kembali</button>
                            <button type="submit" class="btn-next" onclick="submitStep()">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <script>
        function nextStep(step) {
            if (step === 1) {
                document.getElementById('form1').classList.remove('hidden');
                document.getElementById('form2').classList.add('hidden');
            } else {
                document.getElementById('form1').classList.add('hidden');
                document.getElementById('form2').classList.remove('hidden');
                document.querySelectorAll('#step2, #step3').forEach(div => div.classList.add('hidden'));
                document.querySelector(`#step${step}`).classList.remove('hidden');
            }

            document.querySelectorAll(".step").forEach(el => el.classList.remove("active"));
            document.querySelector(`#step${step}-indicator`).classList.add("active");
        }

        function submitStep1() {
            const form = document.getElementById('form1');
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.perusahaan_id) {
                    document.querySelector('input[name="id_perusahaan"]').value = data.perusahaan_id;
                    nextStep(2);
                }
            })
            .catch(error => {
                console.error(error);
                alert("Terjadi kesalahan saat menyimpan. Coba lagi.");
            });
        }
    </script>

@endsection
