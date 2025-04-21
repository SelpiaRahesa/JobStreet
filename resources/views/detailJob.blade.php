@extends('layouts.home')

@section('content')
    @php
        use App\Models\Job_posting;
        $jobPosting = Job_posting::with(['perusahaan', 'lokasi'])->first(); // hanya contoh
    @endphp

    <!-- Job Single Content Starts -->
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">

                        <!-- Header Job Info -->
                        <div class="single-content1">
                            <div class="single-job mb-4 d-lg-flex justify-content-between align-items-center">
                                <div class="job-text">
                                    <h4 class="text-primary">{{ $jobPosting->judul }}</h4>
                                    <ul class="mt-3 list-unstyled">
                                        <li class="mb-2">
                                            <h5><i class="fa fa-map-marker"></i> {{ $jobPosting->lokasi->lokasi }}</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-calendar"></i> Diposting pada:
                                                {{ \Carbon\Carbon::parse($jobPosting->created_at)->format('d M Y') }}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="job-btn">
                                    @auth
                                        <a href="{{ route('pelamar') }}" class="forth-btn">Apply</a>
                                    @else
                                        <a href="{{ route('login') }}" class="forth-btn">Login to Apply</a>
                                    @endauth
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi dan Nama Perusahaan -->
                        <div class="single-content2 py-4">
                            <h4>{{ $jobPosting->perusahaan->nama_perusahaan }}</h4>
                            <p class="text-muted mb-1"><i class="fa fa-map-marker"></i> {{ $jobPosting->lokasi->lokasi }}
                            </p>
                            <!-- Judul Deskripsi -->
                            <h5>Deskripsi Pekerjaan</h5>
                            <p class="mt-3">{{ $jobPosting->deskripsi }}</p>

                            <!-- Judul Kualifikasi -->
                            <h5>Kualifikasi</h5>
                            @php
                                $kualifikasiList = preg_split("/\r\n|\n|\r/", $jobPosting->kualifikasi); // Memisahkan berdasarkan baris baru
                            @endphp

                            <ul class="mt-3">
                                @foreach ($kualifikasiList as $point)
                                    @if (trim($point) != '')
                                        <li>{{ trim($point) }}</li> <!-- Menampilkan tiap kualifikasi -->
                                    @endif
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Single Content End -->
@endsection
