<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\HistoryStok;
use App\Models\pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = Penjualan::latest()->where('id_petugas', auth()->user()->id)->first();
        $pelanggan = pelanggan::all();
        $penjualan = Penjualan::where('status', 'proses')->where('id_petugas', auth()->user()->id)->get()->first();
        if ($penjualan != null) {
            $detailPen = DetailPenjualan::where('id_penjualan', $penjualan->id)->get();
        } else {
            $detailPen = [];
        }
        $barang = Barang::all();
        return view('admin.penjualan.form', compact('pelanggan', 'penjualan', 'detailPen', 'barang', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penjualan.form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Penjualan::where('id_petugas', auth()->user()->id)->where('status', 'proses')->first();
        $time = explode(' ', now());
        $stok = Barang::where('stok', '>=', $request->jumlah_barang)->first();

        if (!$stok) {
            return redirect('penjualan')->withErrors('Jumlah Pembelian Melebihi Stok');
        }

        if ($exist === null) {
            $penjualan = Penjualan::create([
                'id_petugas' => auth()->user()->id,
                'tanggalPenjualan' => $time[0],
                'id_pelanggan' => $request->input('id_pelanggan') ?: null,
            ]);
            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id,
                'id_barang' => $request->id_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'subtotal' => $request->subtotal,
            ]);
            $barang = Barang::find($request->id_barang);
            $barang->update([
                'stok_keluar' => $barang->stok_keluar + $request->jumlah_barang,
            ]);
        } else {
            $detailPenjualan = DetailPenjualan::where('id_penjualan', $exist->id)
                ->where('id_barang', $request->id_barang)
                ->first();

            if ($detailPenjualan === null) {
                DetailPenjualan::create([
                    'id_penjualan' => $exist->id,
                    'id_barang' => $request->id_barang,
                    'jumlah_barang' => $request->jumlah_barang,
                    'subtotal' => $request->subtotal,
                ]);
            } else {
                $detailPenjualan->update([
                    'jumlah_barang' => $detailPenjualan->jumlah_barang + $request->jumlah_barang,
                    'subtotal' => $request->subtotal,
                ]);
            }

            $barang = HistoryStok::find($request->id_barang);
            $barang->update([
                'stok_keluar' => $barang->stok_keluar + $request->jumlah_barang,
            ]);
        }

        return redirect('/penjualan')->with('success', 'Data Barang Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function storepel($id, Request $request)
    {
        Penjualan::findOrFail($id)->update([
            'TotalHarga' => $request->TotalHarga,
            'diskon' => $request->diskon,
            'totalBayar' => $request->totalBayar,
            'tunai' => $request->tunai,
            'kembalian' => $request->kembalian,
            'id_pelanggan' => $request->input('id_pelanggan'),
            'status' => 'selesai',
        ]);

        $request->session()->put('id', $id);

        return redirect()->route('struk');
    }

    public function struk()
    {

        $id = session()->get('id');
        $penjualan = Penjualan::where('id', $id)->get()->first();
        $detail = DetailPenjualan::where('id_penjualan', $id)->get();
        return view('pdf.struk', compact('penjualan', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
