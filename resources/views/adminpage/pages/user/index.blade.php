@extends('adminpage.templates.admin')

@section('content')
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center header-manage-user">
        <h2 class="heading-text">Manajemen User</h2>
        <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH USER</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('store-user') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group first">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Masukkan Nama" autofocus>
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
                                <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" required placeholder="Masukkan Nomor Telepon">
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
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-simpan w-100">SIMPAN</button>
                    </form>
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
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->no_telp }}</td>
                            <td>
                                @if ($user->status === 'active')
                                    <span class="badge rounded-pill bg-success">{{ $user->status }}</span>
                                @elseif ($user->status === 'inactive')
                                    <span class="badge rounded-pill bg-danger">{{ $user->status }}</span>
                                @else
                                    
                                @endif
                            </td>
                            <td>
                                <form action="#" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="icon-action text-white bg-success" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                                <form action="{{ route('toggle-user-status', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="icon-action text-white bg-primary" title="Toggle Status">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </form>
                                <button class="icon-action text-white bg-warning ms-2" title="Edit" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                
                                <form action="{{ route('delete-user', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="icon-action text-white bg-danger ms-2" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                                           
                        </tr>

                        <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center" id="editUserModalLabel-{{ $user->id }}">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('update-user', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <div class="form-group first">
                                                    <label for="name-{{ $user->id }}">Nama</label>
                                                    <input id="name-{{ $user->id }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group last">
                                                    <label for="no_telp-{{ $user->id }}">Nomer Telepon</label>
                                                    <input id="no_telp-{{ $user->id }}" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ $user->no_telp }}" required>
                                                    @error('no_telp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group last">
                                                    <label for="email-{{ $user->id }}">Email</label>
                                                    <input id="email-{{ $user->id }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
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
