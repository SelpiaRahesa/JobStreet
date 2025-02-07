@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Jenis_pekerjaan Pekerjaan') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('jenis_pekerjaan.index')}}" class="btn btn-sm btn-primary">
                            Back
                        </a>
                    </div>
                </div>

    
                        <div class="card-body">
                    <form action="{{ route('jenis_pekerjaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Jenis Pekerjaan</label>
                            <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror" name="jenis_pekerjaan"
                                value="{{ old('jenis_pekerjaan') }}" placeholder="Jenis Pekerjaan" required>
                            @error('jenis_pekerjaan')
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
