@extends('layout.main')
@section('content')
<div class="container">
    <div class="breadcrumb mt-3">
        <h3>Pelanggan/FormPelanggan</h3>
    </div>
    <div class="card">
        <div class="mt-2 ms-3 ">
            <h3>Form Tambah Pelanggan</h3>
        </div>
        <div class="mt-3 px-5">
           <form action="/pelanggan/store" method="POST">
            @csrf
            <div class="mb-3 ">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
            </div>
            <div class="mb-3 ">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3 ">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon">
            </div>
            <div class="mb-3 text-end">
                <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
                <input type="submit" class="btn btn-success" value="Kirim">
            </div>
           </form>
        </div>
    </div>
</div>
@endsection
