@extends('layouts.home')

@section('content')
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .form-container {
            max-width: 2000px;
            /* semula 800px */
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
            padding-bottom: 10px;
            border-bottom: 3px solid #ddd;
            transition: 0.3s;
        }

        .step.active {
            color: #007bff;
            border-bottom: 3px solid #007bff;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-next {
            background: #007bff;
            color: white;
        }

        .btn-next:hover {
            background: #0056b3;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #495057;
        }

        .btn-submit {
            background: #28a745;
            color: white;
        }

        .btn-submit:hover {
            background: #218838;
        }
    </style>

    <section>
        <div class="container mt-5">
            <div class="form-container">
                <h3 class="text-center mb-4">LAMAR PEKERJAAN</h3>

                <div class="step-indicator">
                    <div class="step active" id="indicator-1"><i class="fa fa-user"></i> Data Diri</div>
                    <div class="step" id="indicator-2"><i class="fa fa-briefcase"></i> Motivasi</div>
                    <div class="step" id="indicator-3"><i class="fa fa-upload"></i> Pekerjaan</div>
                </div>

                <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- STEP 1 -->
                    <div class="form-section active" id="step-1">
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select name="jenis_kelamin" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Telepon:</label>
                            <input type="number" name="telepon" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat:</label>
                            <textarea name="alamat" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Pendidikan Terakhir:</label>
                            <input type="text" name="pendidikan_terakhir" required>
                        </div>

                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                        <div class="btn-group">
                            <button type="button" class="btn btn-next" onclick="nextStep(2)">Lanjut</button>
                        </div>
                    </div>

                    <!-- STEP 2 -->
                    <div class="form-section" id="step-2">
                        <div class="form-group">
                            <label>Kelebihan:</label>
                            <textarea name="kelebihan" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Pengalaman:</label>
                            <textarea name="pengalaman" required></textarea>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-back" onclick="nextStep(1)">Kembali</button>
                            <button type="button" class="btn btn-next" onclick="nextStep(3)">Lanjut</button>
                        </div>
                    </div>
                    <!-- STEP 3: Pekerjaan -->
                    <div class="form-section" id="step-3">
                        <div class="form-group">
                            <label>Posisi yang Dilamar:</label>
                            <input type="text" name="posisi" required>
                        </div>


                        <!-- Field CV -->
                        <div class="form-group">
                            <label>Upload CV:</label>
                            <input type="file" name="cv" accept="application/pdf,image/*" required>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-back" onclick="nextStep(2)">Kembali</button>
                            <button type="button" class="btn btn-submit" onclick="submitForm(event)">Kirim Lamaran</button>
                        </div>
                    </div>

            </div>
            </form>

            <script>
                function nextStep(step) {
                    const sections = document.querySelectorAll('.form-section');
                    const indicators = document.querySelectorAll('.step');

                    sections.forEach(s => s.classList.remove('active'));
                    document.getElementById('step-' + step).classList.add('active');

                    indicators.forEach(i => i.classList.remove('active'));
                    document.getElementById('indicator-' + step).classList.add('active');
                }

               
                    function submitForm(event) {
                        event.preventDefault(); // Mencegah refresh halaman

                        const form = event.target.closest('form'); // Mengambil elemen form

                        // Mengirimkan form menggunakan AJAX
                        const formData = new FormData(form);

                        fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    window.location.href = "{{ route('job') }}"; // Ganti dengan URL yang sesuai
                                } else {
                                    alert("Terjadi kesalahan. Silakan coba lagi.");
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert("Terjadi kesalahan. Silakan coba lagi.");
                            });
                    }
            </script>

            </script>
        </div>
        </div>
    </section>
@endsection
