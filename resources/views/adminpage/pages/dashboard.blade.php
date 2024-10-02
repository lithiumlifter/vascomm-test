@extends('adminpage.templates.admin')

@section('content')
    <h2 class="heading-text">Dashboard</h2>

    <div class="card-column">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah User</h5>
                        <p class="display-6">{{ $totalUsers }} User</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah User Aktif</h5>
                        <p class="card-text display-6">{{ $activeUsers }} User</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah Produk</h5>
                        <p class="card-text display-6">{{ $totalProducts }} Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="custom-card">
                        <h5>Jumlah Produk Aktif</h5>
                        <p class="card-text display-6">{{ $activeProducts }} Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-table">
        <h5 class="tb-title">Produk Terbaru</h5>
        <div id="tb-dashboard" class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="table-primary tb-border-left">Produk</th>
                        <th class="table-primary"></th>
                        <th class="table-primary">Tanggal Dibuat</th>
                        <th class="table-primary tb-border-right">Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>{{ $product->created_at->format('d M Y') }}</td>
                        <td class="bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
