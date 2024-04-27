@extends('layout.main')
@section('content')
    <div class="container">
        <div class="breadcrumb mt-3">
            <h3>Barang/</h3>
        </div>
        <div class="card">
            <div class="mt-3 px-5">
                <a href="/barang/form" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Tambah Barang
                </a>
                <div class="table-responsive">
                    <table class="table table-striped text-center " id="contoh">
                        <thead>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Diskon</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Update</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @if ($barang->count() == 0)
                            <tr >
                                <td colspan="6" class="text-center ">(Data Petugas Kosong)</td>
                            </tr>
                        @endif
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($barang as $item)
                                <tr>
                                    <td>{{ $no }}</td>

                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->diskon }}%</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="/barang/destroy/{{ $item->id }}" class="btn btn-danger "><i
                                                class="fas fa-trash-can"></i></a>
                                        <button type="button" class="btn btn-warning " data-bs-toggle="modal"
                                            data-bs-target="#modalId".{{ $item->id }}><i
                                                class="fas fa-pen-to-square"></i></button>
                                        <button type="button" class="btn btn-secondary  " data-bs-toggle="modal"
                                            data-bs-target="#modalDiskon".{{ $item->id }}><i
                                                class="fas fa-money-bills"></i></button>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                <div class="modal fade" id="modalDiskon">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Form Buat Diskon
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form action="/barang/diskon/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="id" class="form-label">ID Barang</label>
                                                            <input type="text" class="form-control" id="id"
                                                            name="id" value="{{ $item->id }} "readonly>
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" id="nama_barang"
                                                            name="nama_barang" value="{{ $item->nama_barang }} "readonly>
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="diskon" class="form-label">Diskon</label>
                                                            <input type="number" class="form-control" id="diskon"
                                                                name="diskon" value="{{ $item->diskon }}">
                                                        </div>
                                                        <div class="mb-3 text-end">
                                                            <input type="submit" class="btn btn-success">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalId">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Form Update Barang
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form action="/barang/update/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="id" class="form-label">ID Barang</label>
                                                            <input type="text" class="form-control" id="id"
                                                                name="id" value="{{ $item->id }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" id="nama_barang"
                                                                name="nama_barang" value="{{ $item->nama_barang }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="number" class="form-control" id="harga"
                                                                name="harga" value="{{ $item->harga }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="stok" class="form-label">Stok</label>
                                                            <input type="number" class="form-control" id="stok"
                                                                name="stok" value="{{ $item->stok }}">
                                                        </div>
                                                        <div class="mb-3 text-end">
                                                            <input type="submit" class="btn btn-success">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

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

@endsection
