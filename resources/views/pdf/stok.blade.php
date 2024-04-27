@extends('layout.mainstruk')
@section('content')
<div class="container">
    <a href="/laporan" class="btn btn-secondary mt-2 mb-2 "><--- Kembali Ke halaman Penjualan</a>
    <h2 class="text-center mt-3 mb-4">Laporan Stok Toko Madura</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Jumlah Stok</th>
                <th>dibuat pada</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($history as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->Barang->nama_barang }}</td>
                    <td>{{ $item->stok_masuk }}</td>
                    <td>{{ $item->stok_keluar }}</td>
                    <td>{{ $item->Barang->stok }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @php
                    $no++
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection