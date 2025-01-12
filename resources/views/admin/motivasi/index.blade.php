@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('Motivation') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('motivasi.create') }}" class="btn btn-sm btn-primary">
                                Add
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Image</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($motivasi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td> <span class="message-preview" onclick="toggleMessage(this)"
                                                    data-full-message="{{ $data->deskripsi }}">
                                                    {{ \Illuminate\Support\Str::limit($data->deskripsi, 50, '...') }}
                                                </span></td>
                                            <td>
                                                <img src="{{ asset('/storage/motivasis/' . $data->image) }}" class="rounded"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            </td>
                                            <td>
                                                <form action="{{ route('motivasi.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('motivasi.edit', $data->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    {{-- <a href="{{ route('motivasi.destroy', $data->id) }}" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</a> --}}
                                                    <a href="{{ route('motivasi.destroy', $data->id) }}"
                                                        class="btn btn-sm btn-danger" data-confirm-delete="true">
                                                        delete
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Data data belum Tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {!! $motivasi->withQueryString()->links('pagination::bootstrap-4') !!} --}}
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
