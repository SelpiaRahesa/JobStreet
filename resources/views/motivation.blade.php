@extends('layouts.home')
@section('content')

<style>
    .blog-entry {
      display: flex;
      align-items: center;
      gap: 15px;
      padding-bottom: 15px;
      margin-bottom: 15px;
    }
    .blog-entry img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 10px;
    }
    .blog-entry h2 {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }
    .blog-entry .news-text {
      font-size: 0.9rem;
      color: #555;
    }
    @media (max-width: 768px) {
      .blog-entry {
        flex-direction: column;
        align-items: flex-start;
      }
      .blog-entry img {
        width: 100%;
        height: auto;
      }
    }
  </style>

{{-- <section>
<div class="section sec-halfs py-0">
    <div class="container">
        <div class="half-content d-lg-flex align-items-stretch">
            <div class="img" style="background-image: url('##motivation/images/hero_1.jpg')" data-aos="fade-in" data-aos-delay="100">

            </div>
            <div class="text">
                <h2 class="heading text-primary mb-3">Resources for makers and creatives</h2>
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>

        <div class="half-content d-lg-flex align-items-stretch">
            <div class="img order-md-2" style="background-image: url('##motivation/images/hero_2.jpg')" data-aos="fade-in">

            </div>
            <div class="text">
                <h2 class="heading text-primary mb-3">We are trusted by more than 5,000 clients</h2>
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>
    </div>
</div>
</section> --}}
<section>
    <div class="section search-result-wrap">
      <div class="container">
        <div class="row posts-entry">
          <div class="col-lg-8">
              @php $motivasi = App\Models\Motivasi::orderBy('id', 'asc')->paginate(8); @endphp
              @foreach($motivasi as $data)
            <div class="blog-entry">
              <a href="{{url('detailMotivation', $data->id)}}" class="img-link">
                <img src="{{asset('/storage/motivasis/' . $data->image)}}" alt="Image" class="img-fluid">
              </a>
              <div>
                <h2>{{ $data->judul }}</h2>
                <p class="news-text">
                  <span class="message-preview" onclick="toggleMessage(this)" data-full-message="{{ $data->deskripsi }}">
                    {{ \Illuminate\Support\Str::limit($data->deskripsi, 50, '...') }}
                  </span>
                </p>
                <p><a href="{{url('detailMotivation',  $data->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
              </div>
            </div>
             @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
