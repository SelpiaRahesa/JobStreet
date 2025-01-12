<?php

namespace App\Http\Controllers;

Use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Motivasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotivasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivasi = Motivasi::latest()->paginate();
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.motivasi.index', compact('motivasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.motivasi.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5000',

        ]);

        $motivasi = new Motivasi();
        $motivasi->judul = $request->judul;
        $motivasi->deskripsi = $request->deskripsi;
         // upload image
        $image = $request->file('image');
        $image->storeAs('public/motivasis', $image->hashName());
        $motivasi->image = $image->hashName();
        $motivasi->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(1000);
        return redirect()->route('motivasi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function show(motivasi $motivasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivasi = Motivasi::findOrFail($id);
        return view('admin.motivasi.edit', compact('motivasi'));

        $motivasi->save();
        return redirect()->route('motivasi.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5000',

        ]);

        $motivasi = Motivasi::findOrFail($id);
        $motivasi->judul = $request->judul;
        $motivasi->deskripsi = $request->deskripsi;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/motivasis', $image->hashName());
        $motivasi->image = $image->hashName();
        $motivasi->save();
        Alert::success('Success', 'Data Updated Successfully')->autoClose(1000);
        return redirect()->route('motivasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\motivasi  $motivasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motivasi = Motivasi::findOrFail($id);
        $motivasi->delete();
        Alert::success('Success', 'Data Succesfully Deleted')->autoClose(2000);
        return redirect()->route('motivasi.index');

    }
}
