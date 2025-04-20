@extends('layouts.perusahaan')
@section('content')
<div class="container">
    <h4>Form Tambah Lowongan</h4>
    <form action="{{ route('perusahaan.jobPost.index') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Pastikan perusahaan_id dikirim -->
        @if($perusahaan)
        <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
    @else
        <div class="alert alert-warning">
            Data perusahaan belum tersedia. Silakan lengkapi profil perusahaan dulu.
        </div>
    @endif

        <div class="mb-3">
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Posisi Pekerjaan" required>
            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <select name="id_bidang" class="form-select @error('id_bidang') is-invalid @enderror" required>
                <option value="">Pilih Bidang</option>
                @foreach (App\Models\Bidang::all() as $bidang)
                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                @endforeach
            </select>
            @error('id_bidang') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <select name="id_jenis" class="form-select @error('id_jenis') is-invalid @enderror" required>
                <option value="">Pilih Tipe Pekerjaan</option>
                @foreach (App\Models\Jenis_pekerjaan::all() as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_pekerjaan }}</option>
                @endforeach
            </select>
            @error('id_jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <input type="text" name="rentang_gaji" class="form-control @error('rentang_gaji') is-invalid @enderror" placeholder="Gaji (Rp)" required>
            @error('rentang_gaji') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <select name="id_lokasi" class="form-select @error('id_lokasi') is-invalid @enderror" required>
                <option value="">Pilih Lokasi</option>
                @foreach (App\Models\Lokasi::all() as $lokasi)
                    <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                @endforeach
            </select>
            @error('id_lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Pekerjaan" required></textarea>
            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <textarea name="kualifikasi" class="form-control @error('kualifikasi') is-invalid @enderror" placeholder="Kualifikasi" required></textarea>
            @error('kualifikasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit Lowongan</button>
    </form>
</div>
@endsection
