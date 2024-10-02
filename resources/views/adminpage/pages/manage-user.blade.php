@extends('adminpage.templates.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center header-manage-user">
        <h2 class="heading-text">Manajemen User</h2>
        <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">TAMBAH USER</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-group first">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Masukkan Nama" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group last">
                                <label for="no_telp">Nomer Telepon</label>
                                <input id="no_telp" type="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" required autocomplete="current-phonenumber" placeholder="Masukkan Nomor Telepon">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group last">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-simpan w-100">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
    


    <div class="card">
        <div id="#" class="card-body">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Aden S. Putra</td>
                        <td>Aden@gmail.com</td>
                        <td>0812345343243</td>
                        <td><span class="badge rounded-pill bg-success">Success</span></td>
                        <td>
                            <button href="#" class="text-success icon-action" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button href="#" class="text-warning ms-2 icon-action" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
@endsection