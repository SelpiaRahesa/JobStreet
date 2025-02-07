@extends('layouts.home')
@section('content')

<style>
   .form-container {
       max-width: 2000px; /* Lebarkan form */
       margin: auto;
       padding: 30px; /* Tambah padding agar lebih lega */
       background: #fff;
       border-radius: 12px;
       box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
   }
   .form-select {
       height: 55px; /* Tambahkan tinggi agar tidak kepotong */
   }
   .step-indicator {
       display: flex;
       justify-content: space-between;
       margin-bottom: 30px;
   }
   .step {
       width: 33%;
       text-align: center;
       font-weight: bold;
       color: #999;
       padding-bottom: 12px;
       border-bottom: 4px solid #ddd;
       display: flex;
       align-items: center;
       justify-content: center;
       gap: 10px;
   }
   .step i {
       font-size: 20px;
   }
   .step.active {
       color: #007bff;
       border-bottom: 4px solid #007bff;
   }
   .hidden {
       display: none;
   }
   .form-control, .form-select {
       border-radius: 10px;
       padding: 14px;
       border: 1px solid #ced4da;
       transition: all 0.3s ease-in-out;
       font-size: 16px;
   }
   .form-control:focus, .form-select:focus {
       border-color: #007bff;
       box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
       outline: none;
   }
   .btn-next {
       background: #007bff;
       color: #fff;
       padding: 14px 24px;
       border-radius: 10px;
       border: none;
       cursor: pointer;
       font-size: 16px;
       transition: 0.3s;
   }
   .btn-next:hover {
       background: #0056b3;
   }
</style>

<section>
    <div class="container mt-5">
        <div class="form-container">
            <h3 class="text-center mb-4">POST A JOB</h3>

            <div class="step-indicator">
                <div class="step active" id="step1-indicator">
                    <i class="fa fa-building"></i> Info Perusahaan
                </div>
                <div class="step" id="step2-indicator">
                    <i class="fa fa-briefcase"></i> Detail Pekerjaan
                </div>
                <div class="step" id="step3-indicator">
                    <i class="fa fa-check-circle"></i> Konfirmasi
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div id="step1">
                    <div class="mb-4">
                        <label class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="company_name" placeholder="Masukkan Nama Perusahaan" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email Perusahaan</label>
                        <input type="email" class="form-control" name="company_email" placeholder="Masukkan Email Perusahaan" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" class="form-control" name="company_address" placeholder="Alamat Perusahaan" required>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn-next" onclick="nextStep(2)">Lanjut</button>
                    </div>
                </div>
                <div id="step2" class="hidden">
                    <div class="mb-4">
                        <label class="form-label">Posisi Pekerjaan</label>
                        <input type="text" class="form-control" name="position" placeholder="Posisi yang dibuka" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Kategori Pekerjaan</label>
                        <select class="form-select" name="job_category" required>
                            <option value="" selected>Pilih Kategori</option>
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Engineering">Engineering</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tipe Pekerjaan</label>
                        <select class="form-select" name="job_type" required>
                            <option value="" selected>Pilih Tipe</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Gaji (Rp)</label>
                        <input type="number" class="form-control" name="salary" placeholder="Gaji yang ditawarkan" required>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn-next" onclick="nextStep(3)">Lanjut</button>
                    </div>
                </div>
                <div id="step3" class="hidden">
                    <div class="mb-4">
                        <label class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" name="job_description" rows="4" placeholder="Deskripsikan pekerjaan..." required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Kualifikasi</label>
                        <textarea class="form-control" name="qualifications" rows="3" placeholder="Sebutkan kualifikasi yang dibutuhkan..." required></textarea>
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
        document.querySelectorAll(".step").forEach(el => el.classList.remove("active"));
        document.getElementById("step" + step + "-indicator").classList.add("active");
    }
</script>
@endsection
