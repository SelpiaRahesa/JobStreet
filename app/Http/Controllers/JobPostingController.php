<?php

namespace App\Http\Controllers;

use App\Models\Job_posting;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Bidang;
use App\Models\Jenis_pekerjaan;
use App\Models\Lokasi;

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
        return view('admin.jobPost.index', compact('jobPosting'));
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

        return view('admin.jobPost.create', compact( 'jenisPekerjaan', 'lokasis'));
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
            'judul' => 'required|string|max:255',
            'id_jenis' => 'required|exists:jenis_pekerjaans,id',
            'rentang_gaji' => 'required|integer',
            'id_lokasi' => 'required|exists:lokasis,id',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
        ]);

        // Ambil perusahaan berdasarkan user login
        $perusahaan = Perusahaan::where('id_user', auth()->id())->first();

        if (!$perusahaan) {
            return back()->with('error', 'Data perusahaan tidak ditemukan untuk user ini.');
        }

        dd(auth()->id(), $perusahaan);
        $jobPosting = new Job_posting();
        $jobPosting->id_perusahaan = $perusahaan->id; // ✅ Ambil dari user
        $jobPosting->judul = $request->judul;
        $jobPosting->id_jenis = $request->id_jenis;
        $jobPosting->rentang_gaji = $request->rentang_gaji;
        $jobPosting->id_lokasi = $request->id_lokasi;
        $jobPosting->deskripsi = $request->deskripsi;
        $jobPosting->kualifikasi = $request->kualifikasi;
        $jobPosting->status = false; // default pending
        $jobPosting->save();

        return redirect()->route('jobPost')->with('success', 'Lowongan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job_posting  $job_posting
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $jobPosting = Job_posting::with(['perusahaan', 'lokasi'])
            ->findOrFail($id);

        return view('detailJob', compact('jobPosting'));
    }

    public function detailJob($id)
{
    $jobPosting = Job_posting::with(['perusahaan', 'lokasi'])
        ->findOrFail($id);

    return view('detailJob', compact('jobPosting'));
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

    // Method untuk update status job posting
    public function updateStatus($id)
    {
        $jobPosting = Job_posting::findOrFail($id);

        // Cek status saat ini dan update sesuai dengan perubahan
        if ($jobPosting->status == 0) {
            // Jika statusnya pending, jadi diterima
            $jobPosting->status = 1;
        } elseif ($jobPosting->status == 1) {
            // Jika statusnya diterima, jadi ditolak
            $jobPosting->status = 2;
        } else {
            // Jika statusnya ditolak, jadi pending lagi
            $jobPosting->status = 0;
        }

        $jobPosting->save();

        return redirect()->route('admin.jobPost.index')->with('success', 'Status job posting berhasil diperbarui!');
    }


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
