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
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jenis</th>
                                        <th>Gaji</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobPosting as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->jenisPekerjaan->jenis_pekerjaan }}</td>
                                            <td>Rp {{ number_format($item->rentang_gaji, 0, ',', '.') }}</td>
                                            <td>{{ $item->lokasi->lokasi }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Diterima</span>
                                                @elseif ($item->status == 2)
                                                    <span class="badge bg-danger"><i class="bi bi-x-circle-fill"></i> Ditolak</span>
                                                @else
                                                    <span class="badge bg-warning text-dark"><i class="bi bi-clock-fill"></i> Menunggu</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

