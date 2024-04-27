@extends('layout.main')
@section('content')
<div class="container">
    <div class="breadcrumb mt-3">
        <h3>Petugas/FormPetugas</h3>
    </div>
    <div class="card">
        <div class="mt-2 ms-3 ">
            <h3>Form Tambah Petugas</h3>
        </div>
        <div class="mt-3 px-5">
           <form action="/petugas/store" method="POST">
            @csrf
            <div class="mb-3 ">
                <label for="name" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 ">
                <label for="role" class="form-label">Role</label>
                <select  id="role" class="form-select" disabled >
                    <option value="">Petugas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select  id="status" class="form-select" disabled >
                    <option value="">Aktif</option>
                </select>
            </div>
            <div class="mb-3 text-end">
                <a href="/petugas" class="btn btn-secondary">Kembali</a>
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
