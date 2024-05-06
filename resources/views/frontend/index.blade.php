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
                <img src="{{ url('gambar/foto_about/' . $about->foto) }}" alt=""
                    class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html">{{ $about->nama }}</a></h1>
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
                    <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i>
                            <span>Home</span></a></li>
                    <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a>
                    </li>
                    <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i>
                            <span>Resume</span></a></li>
                    <li><a href="#product" class="nav-link scrollto"><i class="bx bx-envelope"></i>
                            <span>Product</span></a></li>

                    <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $about->nama }}</h1>
            <p>I'm <span class="typed" data-typed-items="Student, Student, Student, Student"></span></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="{{ url('gambar/foto_about/' . $about->foto) }}" width="300" height="350"
                            alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday :</strong>
                                        <span>{{ $about->ulang_tahun }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website :</strong>
                                        <span>{{ $about->website }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone :</strong>
                                        <span>{{ $about->no_hp }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age :</strong>
                                        <span>{{ $about->umur }}</span>
                                    </li>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email :</strong>
                                        <span>{{ $about->email }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            {{ $about->profil }}
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Skills</h2>
                    <p></p>
                </div>

                <div class="row skills-content">

                    @foreach ($skills as $skill)
                        <div class="col-lg-6" data-aos="fade-up">

                            <div class="progress">
                                <span class="skill">{{ $skill->nama }} <i
                                        class="val">{{ $skill->nilai }}%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->nilai }}"
                                        aria-valuemin="0" aria-valuemax="{{ $skill->nilai }}"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">

                <div class="section-title">
                    <h2>Resume</h2>

                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-up">
                            <h3 class="resume-title">Education</h3>
                            @foreach ($educations as $education)
                                <div class="resume-item">
                                    <h4>{{ $education->tempat_pend }} &amp; {{ $education->jurusan }}</h4>
                                    <h5>{{ $education->tahun }}</h5>
                                </div>
                            @endforeach
                        </div>


                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="resume-title">Experience</h3>
                            @foreach ($experiences as $experience)
                                <div class="resume-item">
                                    <ul>
                                        <li>{{ $experience->pengalaman }}</li>
                                    </ul>
                                    <h5>{{ $experience->tahun }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
        </section><!-- End Resume Section -->

        <!-- ======= Product Section ======= -->
        <section id="product" class="product">
            <div class="container">

                <div class="section-title">
                    <h2>MBS Motor Bekas Sumbar</h2>
                    <P>PUSAT JUAL BELI MOTOR BEKAS DI SUMATERA BARAT</P>
                    <p>Lokasi tunggul hitam kota padang</p>
                </div>

                {{-- <div class="row" data-aos="fade-in">
                    @foreach ($products as $product)
                        <div class="card" style="width: 18rem;">
                            <img src="{{ url('gambar/foto_product/' . $product->foto) }}" class="img-fluid"
                                width="300" heights="300" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nama_product }}</h5>
                                <p class="card-text">Rp. {{ $product->harga_satuan }}</p>
                                <p class="card-text">{{ $product->deskripsi }}</p>
                                <a href="{{ route('detail.product', $product->id) }}"
                                    class="btn btn-primary">Detail</a>
                            </div>
                        </div>


                </div>
                @endforeach --}}

                <div class="row" data-aos="fade-in">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="{{ url('gambar/foto_product/' . $product->foto) }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $product->nama_product }}</h5>
                                    <p class="card-text">Rp. {{ number_format($product->harga_satuan, 0, ',', '.') }}
                                    </p>
                                    <a href="{{ route('detail.product', $product->id) }}"
                                        class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>




            </div>

            </div>
        </section><!-- End Product Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row" data-aos="fade-in">

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="info">
                            <div class="row">
                                <div class="col-md-4">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>{{ $contacts->location }}</p>
                                </div>

                                <div class="col-md-4">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>{{ $contacts->email }}</p>
                                </div>

                                <div class="col-md-4">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>{{ $contacts->call }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

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
