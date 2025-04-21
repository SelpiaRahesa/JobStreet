@extends('layouts.perusahaan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0 me-auto">{{ __('Daftar Lowongan Pekerjaan') }}</h5>
                    <a href="{{ route('perusahaan.perusahaan.create') }}" class="btn btn-sm btn-primary ms-auto">
                        Tambah Lowongan
                    </a>
                </div>


                <div class="card-body">
                    @if ($jobPosting->count())
                        <div class="row">
                            @foreach($jobPosting as $item)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->judul }}</h5>
                                            <br>
                                            <p class="mb-1"><strong>Jenis:</strong> {{ $item->jenisPekerjaan->jenis_pekerjaan }}</p>
                                            <p class="mb-1"><strong>Gaji:</strong> Rp {{ number_format($item->rentang_gaji, 0, ',', '.') }}</p>
                                            <p class="mb-1"><strong>Lokasi:</strong> {{ $item->lokasi->lokasi }}</p>
                                            <p class="mb-1"><strong>Tanggal:</strong> {{ $item->created_at->format('d M Y') }}</p>
                                            <p class="mb-0">
                                                <strong>Status:</strong>
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Diterima</span>
                                                @elseif ($item->status == 2)
                                                    <span class="badge bg-danger"><i class="bi bi-x-circle-fill"></i> Ditolak</span>
                                                @else
                                                    <span class="badge bg-warning text-dark"><i class="bi bi-clock-fill"></i> Menunggu</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">Belum ada lowongan kerja yang dibuat.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

