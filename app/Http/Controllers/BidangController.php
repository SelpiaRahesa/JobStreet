<?php

namespace App\Http\Controllers;
Use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Bidang;
use Illuminate\Http\Request;

class bidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidang = Bidang::latest()->paginate(0);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.bidang.index', compact('bidang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_bidang' => 'required',

        ]);

        $bidang = new Bidang();
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(1000);
        return redirect()->route('bidang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('admin.bidang.edit', compact('bidang'));

        $slider->save();
        return redirect()->route('bidang.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bidang' => 'required',

        ]);
        $bidang = Bidang::findOrFail($id);
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();
        Alert::success('Success', 'Data Updated Successfully')->autoClose(1000);
        return redirect()->route('bidang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();
        Alert::success('Success', 'Data Succesfully Deleted')->autoClose(2000);
        return redirect()->route('bidang.index');
    }
}
