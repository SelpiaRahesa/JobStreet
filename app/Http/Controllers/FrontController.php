<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivasi;

class FrontController extends Controller
{
    public function motivation () {
        return view('motivation');
    }
    public function show($id){
        $motivasi = Motivasi::findOrFail($id);
        return view('detailMotivation',compact('motivasi'));
    }
    public function job () {
        return view('job');
    }
    public function detailJob () {
        return view('detailJob');
    }
    public function jobPost()
{
    return view('jobPost'); // Harus sesuai dengan file di resources/views/
}

public function pelamar()
{
    return view('pelamar'); // Harus sesuai dengan file di resources/views/
}


}
