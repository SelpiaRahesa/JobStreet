
 @extends('layouts.home')
 @section('content')
 <style>
     .main-content {
         max-width: 90%;
         margin: 0 auto;
     }
 </style>
 <section class="job-single-content section-padding">
     <div class="container-fluid"> <!-- Menggunakan container-fluid untuk lebar penuh -->
         <div class="row">
             <div class="col-lg-12">
                 <div class="jobs-tab tab-item">
                     <ul>
                         <li class="active">recent</li>
                         <li>full time</li>
                         <li>part time</li>
                         <li>intern</li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-12"> <!-- Menggunakan col-12 agar mengambil seluruh lebar -->
                 <div class="main-content">
                     <div class="single-content1">
                         <div class="single-job mb-4 d-lg-flex justify-content-between">
                             <div class="job-text">
                                <a href="{{ url('detailJob') }}" style="text-decoration: none; color: inherit;">
                                    <h4>Assistant Executive - Production/ Quality Control</h4>
                                </a>
                                 <ul class="mt-4">
                                     <li class="mb-3"><h5><i class="fa fa-map-marker"></i> New York, USA</h5></li>
                                     <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
                                     <li><h5><i class="fa fa-clock-o"></i> Deadline: Dec 11, 2018</h5></li>
                                 </ul>
                             </div>
                             <div class="job-img align-self-center">
                                <a href="{{ url('detailJob') }}" style="text-decoration: none; color: inherit;">
                                    <img src="{{asset('assets/frontend/job/images/job1.png')}}" alt="job">
                                </a>
                             </div>
                         </div>
                         <div class="single-job mb-4 d-lg-flex justify-content-between">
                             <div class="job-text">
                                <a href="{{ url('detailJob') }}" style="text-decoration: none; color: inherit;">
                                    <h4>Assistant Executive - Production/ Quality Control</h4>
                                </a>
                                 <ul class="mt-4">
                                     <li class="mb-3"><h5><i class="fa fa-map-marker"></i> New York, USA</h5></li>
                                     <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
                                     <li><h5><i class="fa fa-clock-o"></i> Deadline: Dec 11, 2018</h5></li>
                                 </ul>
                             </div>
                             <div class="job-img align-self-center">
                                <a href="{{ url('detailJob') }}" style="text-decoration: none; color: inherit;">
                                    <img src="{{asset('assets/frontend/job/images/job1.png')}}" alt="job">
                                </a>
                             </div>
                         </div>
                         <!-- Tambahkan konten lain di sini -->
                     </div>
                 </div>
                 <div class="more-job-btn mt-5 text-center">
                    <a href="#" class="btn btn-primary">More Job Post</a>
                </div>

             </div>
         </div>
     </div>
 </section>
 @endsection

