<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan=pelanggan::all();
        return view('admin.pelanggan.table',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.pelanggan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_pelanggan'=> 'required',
            'alamat'=> 'required',
            'nomor_telepon'=> 'required',
        ]);
        pelanggan::create($request->all());
        return redirect('/pelanggan')->with('success','Data Pelanggan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan'=> 'nullable',
            'alamat'=> 'nullable',
            'nomor_telepon'=> 'nullable',

        ]);
        pelanggan::findOrFail($id)->update([
            'nama_pelanggan'=> $request->nama_pelanggan,
            'alamat'=> $request->alamat,
            'nomor_telepon'=> $request->nomor_telepon,
        ]);

        return redirect('/pelanggan')->with('success','Data pelanggan Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan,$id)
    {

        pelanggan::findOrFail($id)->delete();
        return redirect('/pelanggan')->with('success','Data Pelanggan Berhasil dihapus');
    }
}
