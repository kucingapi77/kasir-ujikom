<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= User::where('role','petugas')->get();


        return view('admin.user.table', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        User::create($request->all());
        return redirect('/petugas')->with('success','Data Petugas Berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function dashboard()
    {
        $barang = Barang::count();
        $petugas = User::where('role', 'petugas')->count();
        $penjualan = Penjualan::count();
        return view('dashboard',compact('barang','petugas','penjualan'));
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
    public function update(Request $request, $id)
    {
            $request -> validate([
            'name'=> 'nullable',
            'email'=> 'nullable',
            'password'=> 'nullable',
        ]);


        User::findOrFail($id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,

        ]);

        return redirect('/petugas')->with('success','Data Petugas Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        User::findOrFail($id)->delete();
        return redirect('/petugas')->with('success','Data Petugas Berhasil dihapus');
    }
}
