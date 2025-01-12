@extends('layouts.home')
@section('content')
  <div class="section search-result-wrap">
    <div class="container">

      <div class="row posts-entry">
        <div class="col-lg-8">
          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_1_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <span class="date">Apr. 14th, 2022 &bullet; <a href="#">Business</a></span>
              <h2><a href="{{url('detailMotivation')}}">Thought you loved Python? Wait until you meet Rust</a></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_2_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <span class="date">Apr. 14th, 2022 &bullet; <a href="#">Business</a></span>
              <h2><a href="{{url('detailMotivation')}}">Thought you loved Python? Wait until you meet Rust</a></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_3_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <span class="date">Apr. 14th, 2022 &bullet; <a href="#">Business</a></span>
              <h2><a href="{{url('detailMotivation')}}">Thought you loved Python? Wait until you meet Rust</a></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_4_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <span class="date">Apr. 14th, 2022 &bullet; <a href="#">Business</a></span>
              <h2><a href="{{url('detailMotivation')}}">Thought you loved Python? Wait until you meet Rust</a></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>

          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="{{url('detailMotivation')}}" class="img-link me-4">
              <img src="{{asset('assets/frontend/motivation/images/img_5_sq.jpg')}}" alt="Image" class="img-fluid">
            </a>
            <div>
              <span class="date">Apr. 14th, 2022 &bullet; <a href="#">Business</a></span>
              <h2><a href="{{url('detailMotivation')}}">Thought you loved Python? Wait until you meet Rust</a></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="{{url('detailMotivation')}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
