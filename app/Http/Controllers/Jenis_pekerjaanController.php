<?php

namespace App\Http\Controllers;
Use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Jenis_pekerjaan;
use Illuminate\Http\Request;

class Jenis_pekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_pekerjaan = Jenis_pekerjaan::latest()->paginate(0);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.jenis_pekerjaan.index', compact('jenis_pekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.jenis_pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_pekerjaan' => 'required',


        ]);

        $jenis_pekerjaan = new Jenis_pekerjaan();
        $jenis_pekerjaan->jenis_pekerjaan = $request->jenis_pekerjaan;
        $jenis_pekerjaan->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(1000);
        return redirect()->route('jenis_pekerjaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_pekerjaan $jenis_pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenis_pekerjaan = Jenis_pekerjaan::findOrFail($id);
        return view('admin.jenis_pekerjaan.edit', compact('jenis_pekerjaan'));

        $slider->save();
        return redirect()->route('jenis_pekerjaan.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_pekerjaan' => 'required',

        ]);
        $jenis_pekerjaan = Jenis_pekerjaan::findOrFail($id);
        $jenis_pekerjaan->jenis_pekerjaan = $request->jenis_pekerjaan;
        $jenis_pekerjaan->save();
        Alert::success('Success', 'Data Updated Successfully')->autoClose(1000);
        return redirect()->route('jenis_pekerjaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis_pekerjaan = Jenis_pekerjaan::findOrFail($id);
        $jenis_pekerjaan->delete();
        Alert::success('Success', 'Data Succesfully Deleted')->autoClose(2000);
        return redirect()->route('jenis_pekerjaan.index');
    }
}
