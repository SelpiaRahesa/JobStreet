@extends('layouts.home')
@section('content')
<!-- Job Single Content Starts -->
<section class="job-single-content section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"> <!-- Ubah dari col-lg-8 ke col-lg-12 -->
                <div class="main-content">
                    <div class="single-content1">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <h4>Assistant Executive - Production/ Quality Control</h4>
                                <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-map-marker"></i> New York, USA</h5></li>
                                    <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
                                    <li><h5><i class="fa fa-clock-o"></i> Deadline: Dec 11, 2018</h5></li>
                                </ul>
                            </div>
                            <div class="job-btn align-self-center">
                                <a href="{{url('pelamar')}}" class="forth-btn" style="text-decoration: none;">Apply</a>
                            </div>

                        </div>
                    </div>
                    <div class="single-content2 py-4">
                        <h4>Senior Laravel Developer <br>It Park International, USA</h4>
                        <p>Senectus non fames aenean montes fringilla. Ipsum phasellus sagittis porttitor quam malesuada montes molestie sollicitudin eleifend dis diam dapibus aenean suspendisse elit pretium, varius pharetra natoque penatibus aptent. Proin neque.</p>
                    </div>
                    <div class="single-content3 py-4">
                        <h4>Vacancy</h4>
                        <span class="ml-4">03</span>
                    </div>
                    <div class="single-content4 py-4">
                        <h4>Job Responsibility</h4>
                        <p>Senectus non fames aenean montes fringilla. Ipsum phasellus sagittis porttitor quam malesuada montes molestie sollicitudin eleifend dis diam dapibus aenean suspendisse elit pretium, varius pharetra natoque penatibus aptent. Proin neque.</p>
                        <ul>
                            <li class="mb-2">Mate dropped a clanger cuppa I chinwag one plastered cheesed.</li>
                            <li class="mb-2">Mate dropped a clanger cuppa I chinwag one plastered.</li>
                            <li class="mb-2">Dropped a clanger cuppa I chinwag one plastered chee</li>
                            <li>Cuppa I chinwag one plastered cheesed.</li>
                        </ul>
                    </div>
                    <div class="single-content5 py-4">
                        <h4>Educational Requirements</h4>
                        <p>Diploma in Engineering in Computer Science & Engineering, Bachelor in Engineering (BEngg) in Computer Science & Engineering</p>
                        <p>Skills Required: JavaScript, PHP, WordPress, HTML5 & CSS3</p>
                    </div>
                    <div class="single-content6 py-4">
                        <h4>Employment Status</h4>
                        <span>Part Time / Full Time</span>
                    </div>
                    <div class="single-content7 py-4">
                        <h4>Other Benefits</h4>
                        <ul class="mt-3">
                            <li class="mb-2">Mate dropped a clanger cuppa I chinwag one plastered cheesed.</li>
                            <li class="mb-2">Mate dropped a clanger cuppa I chinwag one plastered.</li>
                            <li class="mb-2">Dropped a clanger cuppa I chinwag one plastered chee</li>
                            <li>Cuppa I chinwag one plastered cheesed.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Single Content End -->

@endsection

