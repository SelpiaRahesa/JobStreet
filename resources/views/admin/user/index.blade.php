@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{ __('User Management') }}</h5>
                </div>

                <div class="card-body">
                    <!-- Form Pencarian dan Filter Role -->
                    <form method="GET" action="{{ route('user.index') }}" class="mb-3 d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama atau Email" value="{{ request('search') }}">
                        <select name="role" class="form-select me-2">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="perusahaan" {{ request('role') == 'perusahaan' ? 'selected' : '' }}>Perusahaan</option>
                            <option value="pelamar" {{ request('role') == 'pelamar' ? 'selected' : '' }}>Pelamar</option>
                        </select>
                        <button type="submit" class="btn btn-secondary">Filter</button>
                    </form>

                    <!-- Tabel User -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $index => $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                            $roles = ['admin' => 'Admin', 'perusahaan' => 'Perusahaan', 'pelamar' => 'Pelamar'];
                                        @endphp
                                        {{ $roles[$user->role] ?? '-' }}
                                    </td>
                                    <td>{{ $user->created_at->format('d F Y') }}</td>
                                    <td>
                                        {{-- <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}

                                        @if ($user->role !== 'admin')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        @else
                                            <span class="badge bg-secondary">Tidak Bisa Dihapus</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data user belum tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
