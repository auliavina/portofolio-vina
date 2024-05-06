<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Vina - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/frontend/assets/img/favicon.png" rel="icon">
    <link href="/assets/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/frontend/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html"></a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com/auliavin._/" class="instagram"><i
                            class="bx bxl-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="{{ route('frontend') }}#hero" class="nav-link scrollto active"><i
                                class="bx bx-home"></i>
                            <span>Home</span></a></li>
                    <li><a href="{{ route('frontend') }}#about" class="nav-link scrollto"><i class="bx bx-user"></i>
                            <span>About</span></a>
                    </li>
                    <li><a href="{{ route('frontend') }}#resume" class="nav-link scrollto"><i
                                class="bx bx-file-blank"></i>
                            <span>Resume</span></a></li>
                    <li><a href="{{ route('frontend') }}#product" class="nav-link scrollto"><i
                                class="bx bx-envelope"></i>
                            <span>Product</span></a></li>

                    <li><a href="{{ route('frontend') }}#contact" class="nav-link scrollto"><i
                                class="bx bx-envelope"></i>
                            <span>Contact</span></a></li>
                    @if (auth()->check())
                        <li><a href="{{ route('frontend.pesanan') }}" class="nav-link scrollto"><i
                                    class="bx bx-envelope"></i>
                                <span>Pesanan Saya</span></a></li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif

                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <main id="main">
        <div class="container">

            <section id="about" class="about">
                <div class="section-title">
                    <h2>MBS Motor Bekas Sumbar</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 ml-5" data-aos="fade-right">
                        <img src="{{ url('gambar/foto_product/' . $product->foto) }}" width="300" height="350"
                            alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <div class="row">
                            <div class="col-lg-8">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Nama Product :</strong>
                                        <span>{{ $product->nama_product }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Harga : Rp. </strong>
                                        <span>{{ $product->harga_satuan }}</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <p>
                            {{ $product->deskripsi }}
                        </p>
                        @auth
                            <!-- Button untuk membuka modal beli sekarang -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Beli Sekarang
                            </button>
                        @else
                            <!-- Jika pengguna belum login, arahkan ke rute login -->
                            <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Membeli</a>
                        @endauth

                    </div>
                    @if (auth()->check())
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fs-5" id="exampleModalLabel">Checkout
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pesan') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                                            <input type="hidden" name="harga_total"
                                                value="{{ $product->harga_satuan }}">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group mb-3">
                                                    <strong>Nama Penerima</strong>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Nama Lengkap">
                                                </div>
                                                <div class="form-group my-3">
                                                    <strong>No Telephone</strong>
                                                    <input type="number" name="no_hp" class="form-control my-2"
                                                        placeholder="No Handphone" required>
                                                </div>
                                                <div class="form-group">
                                                    <strong>Alamat</strong>
                                                    <input type="text" name="alamat" class="form-control my-2"
                                                        placeholder="Alamat" required>
                                                </div>
                                                <div class="form-group my-3">
                                                    <strong>Bukti Pembayaran</strong>
                                                    <input type="file" class="form-control form-control-md"
                                                        name="bukti_pembayaran" placeholder="Foto Bukti Pembayaran" />
                                                    <p>Sertakan bukti pembayaran sebelum melakukan pemesanan</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Pesan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

        </div>
    </main><!-- End #main -->




    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/frontend/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/frontend/assets/vendor/aos/aos.js"></script>
    <script src="/assets/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/frontend/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="/assets/frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/assets/frontend/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/frontend/assets/js/main.js"></script>

</body>

</html>
