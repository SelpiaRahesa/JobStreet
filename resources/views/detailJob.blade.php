@extends('layouts.home')

@section('content')
    @php
        use App\Models\Job_posting;
        $jobPosting = Job_posting::with(['perusahaan', 'lokasi', 'bidang'])->first(); // contoh pakai first() aja dulu
    @endphp
    <!-- Job Single Content Starts -->
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="single-content1">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4>{{ $jobPosting->judul }}</h4> <!-- Judul lowongan pekerjaan -->
                                    <ul class="mt-4">
                                        <li class="mb-3">
                                            <h5><i class="fa fa-map-marker"></i> {{ $jobPosting->lokasi->lokasi }}</h5>
                                            <!-- Lokasi -->
                                        </li>
                                        <li class="mb-3">
                                            <h5><i class="fa fa-pie-chart"></i> {{ $jobPosting->bidang->nama_bidang }}</h5>
                                            <!-- Bidang -->
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-clock-o"></i> Deadline:
                                                {{ \Carbon\Carbon::parse($jobPosting->deadline)->format('M d, Y') }}</h5>
                                            <!-- Deadline -->
                                        </li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    @auth
                                        <a href="{{ route('pelamar') }}" class="forth-btn"
                                            style="text-decoration: none;">Apply</a>
                                    @else
                                        <a href="{{ route('login') }}" class="forth-btn" style="text-decoration: none;">Login to
                                            Apply</a>
                                    @endauth
                                </div>

                            </div>
                        </div>
                        <div class="single-content2 py-4">
                            <h4>{{ $jobPosting->perusahaan->nama_perusahaan }} <br> {{ $jobPosting->lokasi->lokasi }}</h4>
                            <p>{{ $jobPosting->deskripsi }}</p> <!-- Deskripsi Pekerjaan -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Single Content End -->
@endsection
