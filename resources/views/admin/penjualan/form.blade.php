@extends('layout.main')
@section('content')
    <div class="container-fluid ">
        <div class="breadcrumb mt-2">
            <h3>Penjualan/</h3>
        </div>
        <div class="row">
            <div class="col-md-8">  
                <div class="card ">
                    <div class="card-body">
                        <h3>Form Penjualan</h3>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalId"><i class="fas fa-plus"></i> Order</button>
                        </div>
                        <div class="modal fade" id="modalId">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Form Order Barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <form action="/penjualan/store/" method="POST">
                                                @csrf
                                                <div class="mb-3 ">
                                                    <label for="" class="form-label">Nama Barang</label>
                                                    <select id="barang_select" class="form-select" name="id_barang">
                                                        <option value="">Pilih Barang</option>
                                                        @foreach ($barang as $item)
                                                            <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_barang }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="jumlah_barang" class="form-label">Jumlah Dibeli</label>
                                                    <input type="number" class="form-control" id="jumlah_barang"
                                                        name="jumlah_barang">
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="subtotal" class="form-label">Subtotal</label>
                                                    <input type="text" class="form-control" id="subtotal" name="subtotal">
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
                        <div class="table-responsive ">
                            <table class="table table-hover ">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Yang Dibeli</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($detailPen as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah_barang }}</td>
                                        <td class="sub_total">{{ $item->subtotal }}</td>
                                    </tr>
                                    @php
                                        $no++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Member</h3>
                        @if ($id==null)
                       
                        <form action="/penjualan/store/pelanggan" method="POST">
                            
                        @else
                        <form action="/penjualan/store/pelanggan{{ $id->id }}" method="POST">
                        @endif
                            @csrf
                            <div class="mb-2">
                                <label for="" class="form-lable">Nama Member <p class="text-danger"
                                        style="font-size: 11px">(Jika Bukan Member Kosongkan Saja)</p></label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-select ">
                                    <option value="" disabled selected>Pilih Member</option>
                                    @foreach ($pelanggan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                                <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan"
                                    value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="mb-3 ">
                                <label for="TotalHarga" class="form-label">Total</label>
                                <input type="number" class="form-control" id="TotalHarga" name="TotalHarga" readonly>
                            </div>
                            <div class="mb-3 ">
                                <label for="diskon" class="form-label">Diskon</label>
                                <input type="text" class="form-control" id="diskon" name="diskon" readonly>
                            </div>
                            <div class="mb-3 ">
                                <label for="totalBayar" class="form-label">Total Bayar</label>
                                <input type="number" class="form-control" id="totalBayar" name="totalBayar" readonly>
                            </div>
                            <div class="mb-3 ">
                                <label for="tunai" class="form-label">Tunai</label>
                                <input type="text" class="form-control" id="tunai" name="tunai">
                            </div>
                            <div class="mb-3 ">
                                <label for="kembalian" class="form-label">Kembalian</label>
                                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                            </div>
                            <div class="text-end">
                                <input type="submit" value="Bayar" class="btn btn-warning">
                            </div>
                        </form>
                    </div>
                </div>
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

<script>
    $(document).ready(function() {
        function updateTotalHarga() {
            let total = 0 
            

            $('.sub_total').each(function() {
                total += parseFloat($(this).text())
            })

            $('#TotalHarga').val(total)
            $('#totalBayar').val(total)
            
        }

        updateTotalHarga()

        $(document).on('input', '.sub_total', function() {
            updateTotalHarga()
        })

        $('#id_pelanggan').change(function() {
            let diskon = 10
            let total = $('#TotalHarga').val()

            $('#diskon').val(diskon)

            $('#totalBayar').val(total - (total * diskon / 100))
        })
        $('#tunai').on('input',function(){
            $('#kembalian').val($('#tunai').val() - $('#totalBayar').val())
        })
    })
    document.addEventListener('DOMContentLoaded', function() {
        var select = document.getElementById('barang_select');
        var jumlahInput = document.getElementById('jumlah_barang');
        var subTotalInput = document.getElementById('subtotal');

        function hitungsubtotal() {
            var selectedOption = select.options[select.selectedIndex];
            var harga = selectedOption.getAttribute('data-harga');
            var jumlah = jumlahInput.value;

            var subtotal = harga * jumlah;

            subTotalInput.value = subtotal;
        }

        select.addEventListener('change', hitungsubtotal);

        jumlahInput.addEventListener('input', hitungsubtotal);
    });
</script>

@endsection
