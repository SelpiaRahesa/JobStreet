@extends('layouts.home')

@section('content')
    <!-- Tambah FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .form-container {
            max-width: 2000px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-select {
            height: 50px;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .step {
            width: 33%;
            text-align: center;
            font-weight: bold;
            color: #999;
            padding-bottom: 10px;
            border-bottom: 3px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .step.active {
            color: #007bff;
            border-bottom: 3px solid #007bff;
        }

        .hidden {
            display: none;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        .btn-next {
            background: #007bff;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-next:hover {
            background: #0056b3;
        }
    </style>

    <section>
        <div class="container mt-5">
            <div class="form-container">
                <h3 class="text-center mb-4">LAMAR PEKERJAAN</h3>

                <div class="step1">
                    <div class="step active" id="step1">
                        <i class="fa fa-user"></i> Data Diri
                    </div>
                    <div class="step" id="step2">
                        <i class="fa fa-briefcase"></i> Pekerjaan Dilamar
                    </div>
                    <div class="step" id="step3">
                        <i class="fa fa-upload"></i> Upload CV
                    </div>
                </div>

                <form action="{{ route('pelamar.store') }}" method="POST">
                    @csrf

                    <!-- STEP 1: Data Diri -->
                    <div id="step-1">
                        <label>Nama:</label>
                        <input type="text" name="nama" required>

                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label>Telepon:</label>
                        <input type="number" name="telepon" required>

                        <label>Alamat:</label>
                        <textarea name="alamat" required></textarea>

                        <label>Pendidikan Terakhir:</label>
                        <input type="text" name="pendidikan_terakhir" required>

                        <!-- Menambahkan id_user hidden input -->
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                        <button type="button" onclick="nextStep(2)">Lanjut</button>
                    </div>

                    <!-- STEP 2: Motivasi -->
                    <div id="step-2" style="display:none;">
                        <label>Kelebihan:</label>
                        <textarea name="kelebihan" required></textarea>

                        <label>Pengalaman:</label>
                        <textarea name="pengalaman" required></textarea>

                        <button type="button" onclick="nextStep(3)">Lanjut</button>
                        <button type="button" onclick="nextStep(1)">Kembali</button>
                    </div>

                    <!-- STEP 3: Pekerjaan -->
                    <div id="step-3" style="display:none;">
                        <label>Posisi yang Dilamar:</label>
                        <input type="text" name="posisi" required>

                        <label>Bidang:</label>
                        <select name="id_bidang" required>
                            @php $bidang = App\Models\Bidang::orderBy('id', 'asc')->paginate(8); @endphp
                            @foreach ($bidang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_bidang }}</option>
                            @endforeach
                        </select>

                        <button type="submit">Kirim Lamaran</button>
                        <button type="button" onclick="nextStep(2)">Kembali</button>
                    </div>
                </form>

                <script>
                    function nextStep(step) {
                        document.getElementById('step-1').style.display = 'none';
                        document.getElementById('step-2').style.display = 'none';
                        document.getElementById('step-3').style.display = 'none';
                        document.getElementById('step-' + step).style.display = 'block';
                    }
                </script>

            </div>
        </div>
    </section>
@endsection
