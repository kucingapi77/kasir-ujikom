<?php

namespace App\Http\Controllers;

use App\Models\HistoryStok;
use Illuminate\Http\Request;

class Laporan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan=HistoryStok::all();
        return view('admin.laporan.table',compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function stok()
    {
        $history = HistoryStok::all();
        return view('pdf.stok', compact('history'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
