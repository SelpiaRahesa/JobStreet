@extends('layouts.perusahaan')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('Daftar Lowongan Pekerjaan') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('perusahaan.jobPost.create') }}" class="btn btn-sm btn-primary">
                                Tambah Lowongan
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
