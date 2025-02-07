@extends('layouts.home')
@section('content')

<section>
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
</section>
  <div class="section search-result-wrap">
    <div class="container">

      <div class="row posts-entry">
        <div class="col-lg-8">
          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_1_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <h2>Thought you loved Python? Wait until you meet Rust</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_2_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <h2>Thought you loved Python? Wait until you meet Rust</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_3_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <h2>Thought you loved Python? Wait until you meet Rust</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_4_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <h2>Thought you loved Python? Wait until you meet Rust</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_5_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <h2>Thought you loved Python? Wait until you meet Rust</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
