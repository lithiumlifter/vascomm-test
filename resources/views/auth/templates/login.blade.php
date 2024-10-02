<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">
    @vite('resources/js/app.js')
</head>
<body>
<div class="container-fluid vh-100">
    <div class="row h-100">
        <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
            <img src="{{ url('assets/img/bg_login.png') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center align-items-center">
                <div class="col-md">
                    <div class="mb-4">
                        <h3>Selamat Datang Admin</h3>
                        <p class="mb-4">Silahkan masukkan email atau nomor telepon dan password <br>
                            Anda untuk mulai menggunakan aplikasi</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" id="loginForm">
                        @csrf
                        <div class="form-group first">
                            <label for="email">Email / Nomor Telepon</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group last mb-2">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">MASUK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
