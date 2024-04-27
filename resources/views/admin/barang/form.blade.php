@extends('layout.main')
@section('content')
<div class="container">
    <div class="breadcrumb mt-3">
        <h3>Barang/FormBarang</h3>
    </div>
    <div class="card">
        <div class="mt-2 ms-3 ">
            <h3>Form Tambah Barang</h3>
        </div>
        <div class="mt-3 px-5">
           <form action="/barang/store" method="POST">
            @csrf
            <div class="mb-3 ">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            </div>
            <div class="mb-3 ">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3 ">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok">
            </div>

            <div class="mb-3 text-end">
                <a href="/barang" class="btn btn-secondary">Kembali</a>
                <input type="submit" class="btn btn-success" value="Kirim">
            </div>
           </form>
        </div>
    </div>
</div>
@if (session('errors'))
<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: '{{ session('errors')->first() }}',
    });
</script>
@endif
@endsection
