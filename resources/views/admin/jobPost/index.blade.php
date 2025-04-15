@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Job Postings') }}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Perusahaan</th>
                                    <th>Bidang</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Rentang Gaji</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Kualifikasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobPosting as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->judul }}</td>
                                    <td>{{ $job->perusahaan->nama_perusahaan }}</td>
                                    <td>{{ $job->bidang->nama_bidang }}</td>
                                    <td>{{ $job->jenisPekerjaan->jenis }}</td>
                                    <td>Rp {{ number_format($job->rentang_gaji, 0, ',', '.') }}</td>
                                    <td>{{ $job->lokasi->nama_lokasi }}</td>
                                    <td>{{ Str::limit($job->deskripsi, 50) }}</td>
                                    <td>{{ Str::limit($job->kualifikasi, 50) }}</td>
                                    <td>
                                        <form action="{{ route('admin.job_postings.updateStatus', $job->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $job->status ? 'btn-success' : 'btn-warning' }}">
                                                {{ $job->status ? 'Diterima' : 'Belum Diterima' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
