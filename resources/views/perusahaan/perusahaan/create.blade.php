@extends('layouts.perusahaan')
@section('content')
<div class="container">
    <h4>Form Data Perusahaan</h4>
    <form action="{{ route('perusahaan.perusahaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="Nama Perusahaan" required>
            @error('nama_perusahaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="bidang">Bidang</label>
            <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror" value="{{ old('bidang') }}" required>
            @error('bidang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="Telepon" required>
            @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" required></textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perusahaan</button>
    </form>
</div>
@endsection
