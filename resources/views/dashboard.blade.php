@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mt-4">
            <div class="card col-3">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-boxes-stacked"></i>Barang</h4>
                    <p class="card-text">jumlah item barang {{ $barang }}</p>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-user-group"></i>Petugas</h4>
                    <p class="card-text">jumlah akun petugas {{ $petugas }}</p>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-money-bills"></i>Penjualan</h4>
                    <p class="card-text">Penjualan Yang dibuat {{$penjualan }}</p>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Sukses!",
            text: "{{ session('success') }}"
        });
    </script>
@endif
<script>
    $.ajax({
        type: "method",
        url: "url",
        data: "data",
        dataType: "dataType",
        success: function (response) {
        }
    });
</script>
@endsection
