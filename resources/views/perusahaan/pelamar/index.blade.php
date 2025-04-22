@extends('layouts.perusahaan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Daftar Pelamar') }}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Kelebihan</th>
                                    <th>Pengalaman</th>
                                    <th>Posisi yang Dilamar</th>
                                    <th>Tanggal</th>
                                    <th>CV</th>  <!-- Kolom CV -->
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pelamar as $pelamar)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pelamar->nama }}</td>
                                    <td>{{ $pelamar->jenis_kelamin }}</td>
                                    <td>{{ $pelamar->telepon }}</td>
                                    <td>{{ $pelamar->alamat }}</td>
                                    <td>{{ $pelamar->pendidikan_terakhir }}</td>
                                    <td>{{ $pelamar->kelebihan }}</td>
                                    <td>{{ $pelamar->pengalaman }}</td>
                                    <td>{{ $pelamar->posisi }}</td>
                                    <td>{{ $pelamar->created_at->format('d F Y') }}</td>
                                    <td>
                                        <!-- Menambahkan Link CV jika ada -->
                                        @if($pelamar->cv)
                                        <a href="{{ Storage::url('public/pelamars/' . $pelamar->cv) }}" class="btn btn-sm btn-primary" target="_blank">Lihat CV</a>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('pelamar.show', $pelamar->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('pelamar.edit', $pelamar->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                        {{-- Delete action --}}
                                        {{-- <form action="{{ route('pelamar.destroy', $pelamar->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelamar ini?')">Hapus</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        {{-- {{ $pelamar->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
