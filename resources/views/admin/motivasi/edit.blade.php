@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Update') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('motivasi.index')}}" class="btn btn-sm btn-primary">
                            Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('motivasi.update', $motivasi->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                value="{{ old('motivasi', $motivasi->judul) }}" placeholder="Judul" required>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" cols="20" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="inputUserstatus" placeholder="Deskripsi">{{ old('deskripsi', $motivasi->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Image</label>
                            @if ($motivasi->image)
                                <!-- Display current image at the top -->
                                <div class="mb-2">
                                    <img src="{{ asset('storage/motivasis/' . $motivasi->image) }}" alt="Current Image" class="img-fluid" width="150">
                                </div>
                            @endif

                            <label class="form-label">Update Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>

                        <button type="submit" class="btn btn-sm btn-primary">Send</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
