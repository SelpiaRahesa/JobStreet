@extends('layouts.home')
@section('content')

<section class="section">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row blog-entries element-animate w-100">
      <div class="col-md-12 col-lg-8 main-content mx-auto">
        <div class="post-content-body">
          <div class="row my-4">
            <div class="col-md-12 mb-4">
              <img src="{{ asset('/storage/motivasis/' . $motivasi->image) }}"
                   alt="{{ $motivasi->judul }}"
                   class="img-fluid rounded"
                   style="width: 100%; height: auto; object-fit: cover;">
            </div>
          </div>
          <h2 class="text-primary">{{ $motivasi->judul }}</h2>
          <p>{{ $motivasi->deskripsi }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
