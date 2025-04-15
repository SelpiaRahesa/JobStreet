<?php

namespace App\Http\Controllers;
Use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class lokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::latest()->paginate(0);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lokasi' => 'required',

        ]);
        $lokasi = new Lokasi();
        $lokasi->lokasi = $request->lokasi;
        $lokasi->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(1000);
        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasi = lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));

        $lokasi->save();
        return redirect()->route('lokasi.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lokasi' => 'required',

        ]);
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->lokasi = $request->lokasi;
        $lokasi->save();
        Alert::success('Success', 'Data Updated Successfully')->autoClose(1000);
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        Alert::success('Success', 'Data Succesfully Deleted')->autoClose(2000);
        return redirect()->route('lokasi.index');
    }
}
