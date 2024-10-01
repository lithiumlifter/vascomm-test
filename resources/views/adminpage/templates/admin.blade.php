<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="menu-navbar container-fluid d-flex align-items-center">
        <button class="navbar-toggler" type="button" id="sidebarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>
        <div class="header-right ms-auto d-flex align-items-center">
            <div class="me-3 text-end">
                <span class="greeting d-block">Hallo Admin,</span>
                <span class="username">Aden S. Putra</span>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px;"></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-dashbord" aria-labelledby="dropdownUser">
                    <li>
                        <a class="dropdown-item text-center" href="#">
                            <div class="d-flex justify-content-center">
                                <div class="rounded-circle bg-secondary" style="width: 60px; height: 60px;"></div>
                            </div>
                            <h5 class="logout-username">Aden S. Putra</h5>
                            <p class="logout-email">Aden@gmail.com</p>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item logout-img text-center" href="#">
                            <img src="{{ asset('assets/img/logout.png') }}" alt="">
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="sidebar" id="sidebar">
    <a href="#">Dashboard</a>
    <a href="#">Manajemen User</a>
    <a href="#">Manajemen Produk</a>
</div>

<div class="content" id="content">
    <div class="container-fluid py-4">
        <!-- Header -->
        <h2 class="heading-text">Dashboard</h2>

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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        var sidebar = document.getElementById("sidebar");
        var content = document.getElementById("content");
        sidebar.classList.toggle("show");
        content.classList.toggle("shifted");
    });
</script>
</body>
</html>
