<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Job_posting;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Bidang;
use App\Models\Jenis_pekerjaan;
use App\Models\Lokasi;
use RealRashid\SweetAlert\Facades\Alert;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $jobPosting = Job_posting::with(['perusahaan', 'jenisPekerjaan', 'lokasi'])->get();
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('perusahaan.jobPost.index', compact('jobPosting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jenisPekerjaan = Jenis_pekerjaan::all();
        $lokasis = Lokasi::all();
        $perusahaan = Perusahaan::all();

        // Ambil data perusahaan berdasarkan user yang login
        $perusahaan = Perusahaan::where('id_user', auth()->id())->first();
        return view('perusahaan.jobPost.create', compact('jenisPekerjaan', 'lokasis', 'perusahaan'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_perusahaan' => 'required|exists:perusahaans,id',
            'judul' => 'required|string|max:255',
            'id_jenis' => 'required|exists:jenis_pekerjaans,id',
            'rentang_gaji' => 'required|integer',
            'id_lokasi' => 'required|exists:lokasis,id',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
        ]);

        $jobPosting = new Job_posting();
        $jobPosting->id_perusahaan = $request->id_perusahaan;
        $jobPosting->judul = $request->judul;
        $jobPosting->id_jenis = $request->id_jenis;
        $jobPosting->rentang_gaji = $request->rentang_gaji;
        $jobPosting->id_lokasi = $request->id_lokasi;
        $jobPosting->deskripsi = $request->deskripsi;
        $jobPosting->kualifikasi = $request->kualifikasi;
        $jobPosting->status = false; // Default status ke false (belum diterima)
        $jobPosting->save();
        Alert::success('Success', 'Job Posting created successfully')->autoClose(1000);
        return redirect()->route('perusahaan.jobPost.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job_posting  $job_posting
     * @return \Illuminate\Http\Response
     */
    public function show(Job_posting $job_posting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job_posting  $job_posting
     * @return \Illuminate\Http\Response
     */
    public function edit(Job_posting $job_posting) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job_posting  $job_posting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job_posting $job_posting) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job_posting  $job_posting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job_posting $job_posting)
    {
        //
    }
}
