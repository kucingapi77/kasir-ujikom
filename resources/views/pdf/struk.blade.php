@extends('layout.mainstruk')
@section('content')
<div class="container">
    <a href="/penjualan" class="btn btn-secondary mt-2 mb-2 "><--- Kembali Ke halaman Penjualan</a>
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                <h2 class="card-title text-center">Struk Pembayaran Toko Madura</h2>
                <p class="text-center">JL. Raya Ciwidey, Bandung</p>
            </div>
            <div class="mt-5">
                <p><strong>Tanggal:</strong> {{ $penjualan->tanggalPenjualan }}</p>
                <p><strong>Kasir:</strong> {{ auth()->user()->name }}</p>
                <p><strong>ID Transaksi:</strong> {{ $penjualan->id }}</p>
                <hr>
                <h3>Barang:</h3>
                <table class="table">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        @foreach ($detail as $item)
                            <tr>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->barang->harga }}</td>
                                <td>{{ $item->jumlah_barang }}</td>
                                <td>{{ $item->subtotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <p><strong>Total Harga:</strong> {{ $penjualan->TotalHarga }}</p>
                <p><strong>Diskon:</strong> {{ $penjualan->diskon }}%</p>
                <p><strong>Total Bayar:</strong> {{ $penjualan->totalBayar }}</p>
                <p><strong>Tunai:</strong> {{ $penjualan->tunai }}</p>
                <p><strong>Kembalian:</strong> {{ $penjualan->kembalian }}</p>
                
            </div>
            <div class="text-center">
                <p>--Terima Kasih--</p>
            </div>
        </div>
    </div>
    
</div>
@endsection