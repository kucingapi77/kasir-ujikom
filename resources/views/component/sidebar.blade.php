<div class="col-auto col-xl-2 col-md-3 min-vh-100 " style="background-color: darkseagreen;">
    <div class="row">
        <ul class="nav flex-column ">
            <li class="nav-item mt-2 ">
                <h3><a href="/dashboard" class="nav-link text-dark">Toko Madura</a></h3>
            </li>
            <hr>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-dark"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            @if (Auth::user()->role === 'Admin')
                <li class="nav-item">
                    <a href="/petugas" class="nav-link text-dark"><i class="fas fa-users"></i> Data Petugas</a>
                </li>
            @endif
            <li class="nav-item">
                <a href="/barang" class="nav-link text-dark"><i class="fas fa-box-open"></i> Data Barang</a>
            </li>
            <li class="nav-item">
                <a href="/pelanggan" class="nav-link text-dark"><i class="fas fa-money-bill-trend-up"></i> Data Pelanggan</a>
            </li>
            @if (Auth::user()->role === 'Petugas')
                <li class="nav-item">
                    <a href="/penjualan" class="nav-link text-dark"><i class="fas fa-exchange-alt"></i> Penjualan</a>
                </li>
            @endif
            @if (Auth::user()->role === 'Admin')
                <li class="nav-item">
                    <a href="/laporan" class="nav-link text-dark"><i class="fas fa-chart-bar"></i> Laporan</a>
                </li>
            @endif

        </ul>
    </div>
</div>
