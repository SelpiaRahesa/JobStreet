<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $perusahaan = Perusahaan::all();
    //     $user = User::all();
    //     confirmDelete("Delete", "Are you sure you want to delete?");
    //     return view('admin.perusahaan.index', compact('perusahaan', 'user'));
    // }

    public function index()
    {
        $perusahaan = Perusahaan::with('user')->get(); // mengambil semua perusahaan beserta data user terkait
        return view('admin.perusahaan.index', compact('perusahaan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ADD perusahaan
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'image' => 'required',
        ]);

        $perusahaan = new Perusahaan();
        // $perusahaan->id_user = $request->id_user;
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->alamat = $request->alamat;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/perusahaans', $image->hashName());
        $perusahaan->image = $image->hashName();
        $perusahaan->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(1000);
        return redirect()->route('jobPost');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        Storage::delete('public/perusahaans/' . $perusahaan->image);
        $perusahaan->delete();
        Alert::success('Success', 'Data Succesfully Deleted')->autoClose(2000);
        return redirect()->route('perusahaan.index');
    }
}
