@extends('adminpage.templates.admin')
@section('content')
    <!-- Header -->
    <h2 class="heading-text">Manajemen User</h2>

    <!-- Dashboard Cards -->
    <div class="card-column">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah User</h5>
                        <p class="display-6">150 User</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah User Aktif</h5>
                        <p class="card-text display-6">150 User</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah Produk</h5>
                        <p class="card-text display-6">150 Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah Produk Aktif</h5>
                        <p class="card-text display-6">150 Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Products Table -->
    <div class="card card-table">
        <h5 class="tb-title">Produk Terbaru</h5>
        <div id="tb-dashboard" class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="table-primary tb-border-left">Produk</th>
                        <th class="table-primary">Tanggal Dibuat</th>
                        <th class="table-primary tb-border-right">Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://via.placeholder.com/50" alt="Microsoft Surface 7"> Microsoft Surface 7</td>
                        <td>12 Mei 2023</td>
                        <td>Rp 1.000</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/50" alt="Microsoft Surface 7"> Microsoft Surface 7</td>
                        <td>12 Mei 2023</td>
                        <td class="bold">Rp 1.000</td>
                    </tr>
                    <tr>
                        <td><img src="https://via.placeholder.com/50" alt="Microsoft Surface 7"> Microsoft Surface 7</td>
                        <td>12 Mei 2023</td>
                        <td class="bold">Rp 1.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection