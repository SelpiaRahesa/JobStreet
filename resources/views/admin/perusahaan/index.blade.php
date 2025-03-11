    @extends('layouts.admin')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('perusahaan From User') }}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Perusahaan</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Image</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($perusahaan as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_perusahaan }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->telepon }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>
                                            <img src="{{ asset('/storage/perusahaans/' . $data->image) }}" class="rounded"
                                                style="width: 150px; height: 150px; object-fit: cover;">
                                        </td>
                                        <td>{{ $data->created_at->format('d F Y') }}</td>
                                        <td>
                                            {{-- <form action="{{ route('perusahaan.destroy', $data->id) }}" method="POST"> --}}
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('perusahaan.destroy', $data->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                                                    delete
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data data belum Tersedia.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {!! $kontak->withQueryString()->links('pagination::bootstrap-4') !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
