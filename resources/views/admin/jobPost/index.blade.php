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
                                    <td>{{ $job->jenisPekerjaan->jenis_pekerjaan }}</td>
                                    <td>Rp {{ number_format($job->rentang_gaji, 0, ',', '.') }}</td>
                                    <td>{{ $job->lokasi->lokasi }}</td>
                                    <td> <span class="message-preview" onclick="toggleMessage(this)"
                                        data-full-message="{{ $job->deskripsi }}">
                                        {{ \Illuminate\Support\Str::limit($job->deskripsi, 50, '...') }}
                                    </span></td>
                                    <td> <span class="message-preview" onclick="toggleMessage(this)"
                                        data-full-message="{{ $job->kualifikasi }}">
                                        {{ \Illuminate\Support\Str::limit($job->kualifikasi, 50, '...') }}
                                    </span></td>
                                    <td>
                                        <form action="{{ route('jobPost.updateStatus', $job->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm
                                                    {{ $job->status == 0 ? 'btn-warning' : ($job->status == 1 ? 'btn-success' : 'btn-danger') }}
                                                    dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @if ($job->status == 0)
                                                        <i class="fa fa-clock"></i> Menunggu
                                                    @elseif ($job->status == 1)
                                                        <i class="fa fa-check-circle"></i> Diterima
                                                    @else
                                                        <i class="fa fa-times-circle"></i> Ditolak
                                                    @endif
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button type="submit" name="status" value="0" class="dropdown-item">
                                                            <i class="fa fa-clock text-warning"></i> Menunggu
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="1" class="dropdown-item">
                                                            <i class="fa fa-check-circle text-success"></i> Diterima
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="2" class="dropdown-item">
                                                            <i class="fa fa-times-circle text-danger"></i> Ditolak
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
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
<script>
    function toggleMessage(element) {
        const fullMessage = element.getAttribute('data-full-message');
        if (element.innerText.endsWith('...')) {
            element.innerText = fullMessage;
        } else {
            element.innerText = fullMessage.substring(0, 50) + '...';
        }
    }
</script>
@endsection
