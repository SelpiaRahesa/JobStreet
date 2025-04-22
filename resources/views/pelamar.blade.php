@extends('layouts.home')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .form-container {
            max-width: 1400px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
        input[type="file"],
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

        .invalid-feedback {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .btn-submit {
            background: #28a745;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #218838;
        }
    </style>

    <section>
        <div class="container mt-5">
            <div class="form-container">
                <h3 class="text-center mb-4">LAMAR PEKERJAAN</h3>

                <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="nama" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Telepon:</label>
                        <input type="number" name="telepon" value="{{ old('telepon') }}">
                        @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat:</label>
                        <textarea name="alamat">{{ old('alamat') }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Pendidikan Terakhir:</label>
                        <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}">
                        @error('pendidikan_terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Kelebihan:</label>
                        <textarea name="kelebihan">{{ old('kelebihan') }}</textarea>
                        @error('kelebihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Pengalaman:</label>
                        <textarea name="pengalaman">{{ old('pengalaman') }}</textarea>
                        @error('pengalaman') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Posisi yang Dilamar:</label>
                        <input type="text" name="posisi" value="{{ old('posisi') }}">
                        @error('posisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Upload CV:</label>
                        <input type="file" name="cv" class="form-control @error('cv') is-invalid @enderror" accept="cv/*" required>
                        @error('cv') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn-submit">Kirim Lamaran</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
