@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Add Lokasi') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('jobPost.index')}}" class="btn btn-sm btn-primary">
                            Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form1" class="step-form" action="{{ route('user.perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <button type="submit" class="btn-next" onclick="nextStep(2, 'form1')">Lanjut</button>
                            </div>
                        </div>
                    </form>

                    <form id="form2" class="step-form hidden" action="{{ route('user.post.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="step2">
                            <div class="mb-3">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                    placeholder="Posisi Pekerjaan" required />
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="form-select required" name="id_bidang" required>
                                    <option value="">Pilih Bidang</option>
                                    @foreach (App\Models\Bidang::all() as $bidang)
                                        <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select required" name="id_jenis" required>
                                    <option value="">Pilih Tipe Pekerjaan</option>
                                    @foreach (App\Models\Jenis_pekerjaan::all() as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis_pekerjaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gaji (Rp)</label>
                                <input type="text" class="form-control @error('rentang_gaji') is-invalid @enderror"
                                    name="rentang_gaji" placeholder="Gaji yang di tawarkan" required />
                                @error('rentang_gaji')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="form-select required" name="id_jenis" required>
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
                    </form>

                    <!-- Step 3 Dipisah dari Step 2 -->
                    <form id="form3" class="step-form hidden" action="{{ route('user.post.store') }}" method="POST">
                        @csrf
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
                                <button type="submit" class="btn-next">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
