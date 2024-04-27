<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryStok;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang=Barang::all();
        
        return view('admin.barang.table',compact('barang'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        $id_barang = $barang->id;
        HistoryStok::create([
            'id_barang' => $id_barang,
            'stok_masuk' => $request->stok,
        ]);

        return redirect('/barang')->with('success', 'Data Barang Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $request->validate([
            'nama_barang'=>'nullable',
            'harga'=>'nullable',
            'stok'=>'nullable',
        ]);
        Barang::findOrFail($id)->update([
            'nama_barang'=> $request->nama_barang,
            'harga'=> $request->harga,
            'stok'=> $request->stok,
        ]);

        return redirect('/barang')->with('success','Data Petugas Berhasil diedit');
    }
    public function test(Request $request,string $id)
    {

        Barang::findOrFail($id)->update([
            'diskon'=>$request->diskon,
        ]);

        return redirect('/barang')->with('success','Data Diskon Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang,string $id)
    {
        Barang::findOrFail($id)->delete();
        return redirect('/barang')->with('success','Data Berhasi Dihapus');

    }

}
