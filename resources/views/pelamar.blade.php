@extends('layouts.home')

@section('content')
<!-- Tambah FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
   .form-container {
       max-width: 2000px;
       margin: auto;
       padding: 20px;
       background: #fff;
       border-radius: 12px;
       box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
   }
   .form-select {
       height: 50px;
   }
   .step-indicator {
       display: flex;
       justify-content: space-between;
       margin-bottom: 20px;
   }
   .step {
       width: 33%;
       text-align: center;
       font-weight: bold;
       color: #999;
       padding-bottom: 10px;
       border-bottom: 3px solid #ddd;
       display: flex;
       align-items: center;
       justify-content: center;
       gap: 8px;
   }
   .step.active {
       color: #007bff;
       border-bottom: 3px solid #007bff;
   }
   .hidden {
       display: none;
   }
   .form-control, .form-select {
       border-radius: 8px;
       padding: 12px;
       border: 1px solid #ced4da;
   }
   .form-control:focus, .form-select:focus {
       border-color: #007bff;
       box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
       outline: none;
   }
   .btn-next {
       background: #007bff;
       color: #fff;
       padding: 12px 20px;
       border-radius: 8px;
       border: none;
       cursor: pointer;
       transition: 0.3s;
   }
   .btn-next:hover {
       background: #0056b3;
   }
</style>

<section>
    <div class="container mt-5">
        <div class="form-container">
            <h3 class="text-center mb-4">LAMAR PEKERJAAN</h3>
                <!-- Tombol Logout -->
            @auth
            <div class="text-end mb-4">
                <button type="button" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endauth
            <div class="step-indicator">
                <div class="step active" id="step1-indicator">
                    <i class="fa fa-user"></i> Data Diri
                </div>
                <div class="step" id="step2-indicator">
                    <i class="fa fa-briefcase"></i> Pekerjaan Dilamar
                </div>
                <div class="step" id="step3-indicator">
                    <i class="fa fa-upload"></i> Upload CV
                </div>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- STEP 1: Data Diri -->
                <div id="step1">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="job_category" required>
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="Marketing">Perempuan</option>
                            <option value="Engineering">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="job_description" rows="4" placeholder="Masukan Alamat" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Kelebihan</label>
                        <textarea class="form-control" name="qualifications" rows="3" placeholder="Sebutkan Kelebihhan Anda" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Pengalaman</label>
                        <textarea class="form-control" name="qualifications" rows="3" placeholder="Sebutkan Pengalaman Anda" required></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn-next" onclick="nextStep(2)">Lanjut</button>
                    </div>
                </div>

                <!-- STEP 2: Pekerjaan Dilamar -->
                <div id="step2" class="hidden">
                    <div class="mb-3">
                        <label class="form-label">Posisi yang Dilamar</label>
                        <input type="text" class="form-control" name="job_position" placeholder="Posisi yang dilamar" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Pekerjaan</label>
                        <select class="form-select" name="job_category" required>
                            <option value="" selected>Pilih Kategori</option>
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Engineering">Engineering</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn-next" onclick="nextStep(3)">Lanjut</button>
                    </div>
                </div>

                <!-- STEP 3: Upload CV -->
                <div id="step3" class="hidden">
                    <div class="mb-3">
                        <label class="form-label">Upload CV</label>
                        <input type="file" class="form-control" name="cv" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn-next">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function nextStep(step) {
        document.getElementById("step1").classList.add("hidden");
        document.getElementById("step2").classList.add("hidden");
        document.getElementById("step3").classList.add("hidden");
        document.getElementById("step" + step).classList.remove("hidden");
        document.getElementById("step1-indicator").classList.remove("active");
        document.getElementById("step2-indicator").classList.remove("active");
        document.getElementById("step3-indicator").classList.remove("active");
        document.getElementById("step" + step + "-indicator").classList.add("active");
    }
</script>
@endsection
