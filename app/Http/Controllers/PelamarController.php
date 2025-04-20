<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pelamar;
use App\Models\Bidang;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    /**
     * Menampilkan halaman lamaran pekerjaan.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply()
    {
        // Mengambil data bidang pekerjaan untuk dropdown
        $bidang = Bidang::all();
        return view('pelamar', compact('bidang'));
    }

    /**
     * Menampilkan daftar pelamar di halaman admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = Pelamar::all();  // Mendapatkan semua data pelamar
        return view('admin.pelamar.index', compact('pelamar'));
    }

    /**
     * Menampilkan form untuk membuat lamaran baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = Bidang::all();  // Mengambil semua bidang untuk dropdown
        return view('pelamar', compact('bidang'));
    }

    /**
     * Menyimpan data lamaran yang baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'kelebihan' => 'required|string',
            'pengalaman' => 'required|string',
            'posisi' => 'required|string',
            'id_bidang' => 'required|exists:bidangs,id',
        ]);

        // Menyimpan data pelamar
        Pelamar::create([
            'id_user' => Auth::id(),  // Mengambil ID pengguna yang sedang login
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'kelebihan' => $request->kelebihan,
            'pengalaman' => $request->pengalaman,
            'posisi' => $request->posisi,
            'id_bidang' => $request->id_bidang,
        ]);

        // Redirect ke halaman beranda setelah berhasil
        return redirect()->route('home')->with('success', 'Lamaran berhasil dikirim!');
    }

    /**
     * Menampilkan data pelamar yang dipilih.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function show(Pelamar $pelamar)
    {
        // return view('admin.pelamar.show', compact('pelamar'));
    }

    /**
     * Menampilkan form untuk mengedit data pelamar.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelamar $pelamar)
    {
        // $bidang = Bidang::all();  // Mengambil semua bidang untuk dropdown
        // return view('admin.pelamar.edit', compact('pelamar', 'bidang'));
    }

    /**
     * Memperbarui data pelamar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelamar $pelamar)
    {
        // Validasi input
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'jenis_kelamin' => 'required',
        //     'telepon' => 'required|numeric',
        //     'alamat' => 'required|string',
        //     'pendidikan_terakhir' => 'required|string',
        //     'kelebihan' => 'required|string',
        //     'pengalaman' => 'required|string',
        //     'posisi' => 'required|string',
        //     'id_bidang' => 'required|exists:bidangs,id',
        // ]);

        // // Update data pelamar
        // $pelamar->update([
        //     'nama' => $request->nama,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'telepon' => $request->telepon,
        //     'alamat' => $request->alamat,
        //     'pendidikan_terakhir' => $request->pendidikan_terakhir,
        //     'kelebihan' => $request->kelebihan,
        //     'pengalaman' => $request->pengalaman,
        //     'posisi' => $request->posisi,
        //     'id_bidang' => $request->id_bidang,
        // ]);

        // // Redirect ke halaman pelamar setelah update
        // return redirect()->route('admin.pelamar.index')->with('success', 'Data pelamar berhasil diperbarui!');
    }

    /**
     * Menghapus data pelamar.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelamar $pelamar)
    {
        // Menghapus pelamar dari database
        $pelamar->delete();

        // Redirect ke halaman pelamar dengan pesan sukses
        return redirect()->route('admin.pelamar.index')->with('success', 'Pelamar berhasil dihapus!');
    }
}
