<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vascomm - E-Commerce</title>
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  @vite('resources/js/app.js')
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/img/logo.png') }}" alt="Vascomm Logo">
            </a>
        
            <!-- Center: Search bar -->
            <div class="d-none d-lg-block mx-auto">
                <form class="search-bar position-relative d-flex">
                <input class="form-control" type="search" placeholder="Cari parfum kesukaanmu" aria-label="Search" style="padding-right: 40px;">
                <button type="submit" class="btn position-absolute end-0 top-50 translate-middle-y me-2" style="border: none; background: none;">
                    <img src="{{ url('assets/img/search.png') }}" alt="Search" style="width: 20px;">
                </button>
                </form>
            </div>
        
            <!-- Right: Login & Signup buttons -->
            <div class="navbar-button d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">MASUK</a>
                <a href="{{ route('register') }}" class="btn btn-primary">DAFTAR</a>
            </div>
        </div>
    </nav>
  </header>
  <main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ url('assets/img/banner.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/img/banner.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/img/banner.png') }}" class="d-block w-100" alt="...">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- carousel produk--}}
    <section class="py-5 pl-5 pr-5">
        <div class="container">
            <h3 class="mb-4">Terbaru</h3>
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($products->chunk(5) as $key => $productChunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row d-flex justify-content-center mt-8">
                                @foreach($productChunk as $product)
                                    <div class="col-md-2">
                                        <div class="card card-product">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-product" alt="{{ $product->name }}">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="product-title">{{ $product->name }}</h5>
                                                <p class="product-price">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- produk tersedia --}}
    <section class="py-5 pl-5 pr-5">
      <div class="container">
          <h3 class="mb-4">Produk Tersedia</h3>
          <div class="row d-flex justify-content-center">
              @foreach($products->take(5) as $product) <!-- Limit to 5 products -->
                  <div class="col-md-2">
                      <div class="card card-product">
                          <div class="d-flex justify-content-center">
                              <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-product" alt="{{ $product->name }}">
                          </div>
                          <div class="card-body">
                              <h5 class="product-title">{{ $product->name }}</h5>
                              <p class="product-price">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
          <div class="text-center mt-4">
              <button class="btn btn-outline-primary">Lihat Lebih Banyak</button>
          </div>
      </div>
    </section>
  </main>

  <footer class="text-center py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="footer-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
          </div>
          <div class="bottom-text text-center">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam nobis rem eligendi quo quasi maxime</p>
          </div>
          <div class="icon-socmed">
            <img src="{{ asset('assets/img/facebook.png') }}" alt="">
            <img src="{{ asset('assets/img/twitter.png') }}" alt="">
            <img src="{{ asset('assets/img/instagram.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-3">
          <h6 class="">Layanan</h6>
          <ul>
            <li><a href="#">BANTUAN</a></li>
            <li><a href="#">TANYA JAWAB</a></li>
            <li><a href="#">HUBUNGI KAMI</a></li>
            <li><a href="#">CARA BERJUALAN</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Tentang Kami</h6>
          <ul>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">KARIR</a></li>
            <li><a href="#">BLOG</a></li>
            <li><a href="#">KEBIJAKAN PRIVASI</a></li>
            <li><a href="#">SYARAT DAN KETENTUAN</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Mitra</h6>
          <ul>
            <li><a href="#">Supplier</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
