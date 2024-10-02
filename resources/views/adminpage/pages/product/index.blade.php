@extends('adminpage.templates.admin')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center header-manage-product">
    <h2 class="heading-text">Manajemen Produk</h2>
    <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#addProductModal">TAMBAH PRODUK</button>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group first">
                            <label for="name">Nama Produk</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Masukkan Nama Produk">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group last">
                            <label for="price">Harga</label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required placeholder="Masukkan Harga">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group last">
                            <label for="image">Gambar Produk</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-simpan w-100">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-table-large">
    <div class="card-body">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"></td>
                    <td>
                        @if ($product->status === 'active')
                        <span class="badge rounded-pill bg-success">{{ $product->status }}</span>
                        @else
                        <span class="badge rounded-pill bg-danger">{{ $product->status }}</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('toggle-product-status', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="icon-action text-white bg-primary" title="Toggle Status">
                                <i class="fas fa-sync"></i>
                            </button>
                        </form>

                        <button class="icon-action text-white bg-warning ms-2" title="Edit" data-bs-toggle="modal" data-bs-target="#editProductModal-{{ $product->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <form action="{{ route('delete-product', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-action text-white bg-danger ms-2" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editProductModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel-{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="editProductModalLabel-{{ $product->id }}">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('update-product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <div class="form-group first">
                                            <label for="name-{{ $product->id }}">Nama Produk</label>
                                            <input id="name-{{ $product->id }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group last">
                                            <label for="price-{{ $product->id }}">Harga</label>
                                            <input id="price-{{ $product->id }}" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required>
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group last">
                                            <label for="image-{{ $product->id }}">Gambar Produk</label>
                                            <input id="image-{{ $product->id }}" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mt-2">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status-{{ $product->id }}">Status</label>
                                        <select id="status-{{ $product->id }}" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                            <option value="active" {{ $product->status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $product->status === 'inactive' ? 'selected' : '' }}>inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn btn-simpan w-100">SIMPAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
