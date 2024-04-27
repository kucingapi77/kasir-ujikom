@extends('layout.main')
@section('content')
    <div class="container">
        <div class="breadcrumb mt-3">
            <h3>Laporan/</h3>
        </div>
        <div class="card">
            <div class="mt-3 px-5">
                <a href="/laporan/stok" class="btn btn-success ">Cetak Pdf</a>
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok Masuk</th>
                            <th>Stok Keluar</th>
                            <th>Jumlah Stok</th>
                            <th>Update</th>
                        </thead>
                        <tbody>
                            @if ($laporan->count() == 0)
                            <tr >
                                <td colspan="6" class="text-center ">(Data Petugas Kosong)</td>
                            </tr>
                        @endif
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($laporan as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->Barang->nama_barang }}</td>
                                    <td>{{ $item->stok_masuk }}</td>
                                    <td>{{ $item->stok_keluar }}</td>
                                    <td>{{ $item->Barang->stok }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                <div class="modal fade" id="modalId">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Form Update Pelanggan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form action="/pelanggan/update/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $item->nama_pelanggan }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $item->alamat }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $item->nomor_telepon }}">
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
@endsection
