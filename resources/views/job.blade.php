@extends('layouts.home')

@section('content')
<style>
  .job-list {

    display: flex;
    flex-direction: column;
    gap: 1rem;
    width: 100%;
    margin: 2rem auto;


  }

  .job-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1.5px solid #ddd;
    border-radius: 16px;
    padding: 1rem 1.5rem;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    transition: 0.3s;
    text-decoration: none;
    color: inherit;
  }

  .job-card:hover {
    border-color: #1a73e8;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .job-info {
    flex: 1;
  }

  .job-info h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: bold;
  }

  .company-location {
    font-size: 0.95rem;
    color: #555;
    margin-top: 2px;
  }

  .badge-new {
    background-color: #e6f4ea;
    color: #137333;
    display: inline-block;
    padding: 3px 10px;
    font-size: 0.75rem;
    font-weight: bold;
    border-radius: 12px;
    margin: 8px 0;
  }

  .job-meta {
    font-size: 0.85rem;
    color: #444;
  }

  .job-logo {
    flex-shrink: 0;
    width: 100px;
    height: 100px;
    border-radius: 16px;
    overflow: hidden;
}


  .job-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  /* Hapus underline pada semua link */
  a {
  text-decoration: none !important;
}


</style>

<section class="job-single-content section-padding">
  <div class="container">
    <div class="job-list">
        <form method="GET" class="mb-4" style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <input type="text" name="search" placeholder="Cari judul lowongan..." value="{{ request('search') }}" style="padding: 8px; border-radius: 8px; border: 1px solid #ccc; flex: 1; max-width: 300px;">

            <select name="lokasi" style="padding: 8px; border-radius: 8px; border: 1px solid #ccc;">
              <option value="">Semua Lokasi</option>
              @php
                $lokasis = \App\Models\Lokasi::all();
              @endphp
              @foreach ($lokasis as $lokasi)
                <option value="{{ $lokasi->id }}" {{ request('lokasi') == $lokasi->id ? 'selected' : '' }}>
                  {{ $lokasi->lokasi }}
                </option>
              @endforeach
            </select>

            <button type="submit" style="padding: 8px 16px; border-radius: 8px; border: none; background-color: #1a73e8; color: white;">Cari</button>
          </form>


          @php
          use App\Models\Job_posting;

          $jobPost = Job_posting::with('perusahaan','lokasi','bidang')
            ->where('status', Job_posting::STATUS_DITERIMA)
            // Jika ada search, filter judul
            ->when(request('search'), function($q) {
              $q->where('judul', 'like', '%'.request('search').'%');
            })
            // Jika ada filter lokasi, filter id_lokasi
            ->when(request('lokasi'), function($q) {
              $q->where('id_lokasi', request('lokasi'));
            })
            ->orderBy('id','desc')
            ->get();
        @endphp

      @forelse ($jobPost as $job)
        <a href="{{ url('detailJob/' . $job->id) }}" class="job-card">
          <div class="job-info">
            <h3>{{ $job->judul }}</h3>
            <div class="company-location">
              {{ $job->perusahaan->nama_perusahaan ?? '-' }} ({{ $job->lokasi->lokasi ?? '-' }})
            </div>
            @if (\Carbon\Carbon::parse($job->created_at)->gt(now()->subDays(3)))
            <div class="badge-new">Baru untuk kamu</div>
          @endif

            <div class="job-meta">
              Rp {{ number_format($job->rentang_gaji ?? 0, 0, ',', '.') }}<br>
              {{ \Carbon\Carbon::parse($job->created_at)->locale('id')->diffForHumans() }}
            </div>
          </div>
          <div class="job-logo">
            <img src="{{ asset('storage/perusahaans/' . $job->perusahaan->image) }}" alt="Logo {{ $job->perusahaan->nama_perusahaan }}">
          </div>
        </a>
      @empty
        <p class="text-center">Belum ada lowongan yang tersedia.</p>
      @endforelse

    </div>
  </div>
</section>
@endsection
