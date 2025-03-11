<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect('/admin');
        } elseif ($user->role === 'perusahaan') {
            return redirect('/jobPost');
        } elseif ($user->role === 'pelamar') {
            return redirect('/pelamar');
        }

        return redirect('/home');
    }
}
