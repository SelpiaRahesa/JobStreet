<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $query = User::query();

    // Filter berdasarkan nama atau email
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan role
    if ($request->has('role') && $request->role != '') {
        $query->where('role', $request->role);
    }

    $user = $query->paginate(10); // Pagination 10 data per halaman

    return view('admin.user.index', compact('user'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Misalnya di UserController
public function store(Request $request)
{
    // Menyaring input form dan memeriksa apakah ada yang mengatur role
    $role = session('user_role', 'pelamar'); // Pastikan session ini tidak diatur menjadi 'perusahaan'

    return User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $role,
    ]);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::findOrFail($id);
        // return view('admin.user.edit', compact('user'));

        // $user->save();
        // return redirect()->route('user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:2',
        //     'email' => 'required',
        //     'password' => 'required|min:2',

        // ]);

        // $user = User::FindOrFail($id);
        // $user->name = $request->name;
        // $user->email = $request -> email;
        // $user->password = Hash::make($request->password);
        // $user->isAdmin = $request->isAdmin;
        // $user->save();
        // return redirect()->route('user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
