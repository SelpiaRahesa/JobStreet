@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Add Bidang') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('bidang.index')}}" class="btn btn-sm btn-primary">
                            Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('bidang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                    <form action="{{ route('bidang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Bidang</label>
                            <input type="text" class="form-control @error('nama_bidang') is-invalid @enderror" name="nama_bidang"
                                value="{{ old('nama_bidang') }}" placeholder="Nama Bidang" required>
                            @error('nama_bidang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                        <button type="submit" class="btn btn-sm btn-primary">Send</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
