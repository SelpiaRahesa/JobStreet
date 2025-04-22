<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Support\Facades\Auth;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class PelamarController extends Controller
{
    /**
     * Menampilkan halaman lamaran pekerjaan.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply()
    {
        return view('pelamar');
    }

    /**
     * Menampilkan daftar pelamar di halaman perusahaan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = Pelamar::all();  // Mendapatkan semua data pelamar
        return view('perusahaan.pelamar.index', compact('pelamar'));
    }

    /**
     * Menampilkan form untuk membuat lamaran baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pelamar');
    }

    /**
     * Menyimpan data lamaran yang baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // ADD Message
          $this->validate( $request, [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'kelebihan' => 'required|string',
            'pengalaman' => 'required|string',
            'posisi' => 'required|string',
            'cv' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Validasi file CV
        ]);

        $pelamar = new Pelamar();
        $pelamar->id_user= Auth::id(); // Menyimpan ID user yang login
        $pelamar->nama =$request->nama;
        $pelamar->jenis_kelamin =$request->jenis_kelamin;
        $pelamar->telepon =$request->telepon;
        $pelamar->alamat =$request->alamat;
        $pelamar->pendidikan_terakhir =$request->pendidikan_terakhir;
        $pelamar->kelebihan =$request->kelebihan;
        $pelamar->pengalaman =$request->pengalaman;
        $pelamar->posisi = $request->posisi;
         // upload image
         $cv = $request->file('cv');
         $cv->storeAs('public/pelamars', $cv->hashName());
         $pelamar->cv = $cv->hashName();
        $pelamar->save();
        Alert::success('Success', 'Message  Successfully')->autoClose(2000);
        return redirect()->route('job');
    }



    /**
     * Menampilkan data pelamar yang dipilih.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function show(Pelamar $pelamar)
    {
        // return view('perusahaan.pelamar.show', compact('pelamar'));
    }

    /**
     * Menampilkan form untuk mengedit data pelamar.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelamar $pelamar)
    {

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
        //
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
        // ]);

        // // Redirect ke halaman pelamar setelah update
        // return redirect()->route('perusahaan.pelamar.index')->with('success', 'Data pelamar berhasil diperbarui!');
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
        return redirect()->route('perusahaan.pelamar.index')->with('success', 'Pelamar berhasil dihapus!');
    }
}
