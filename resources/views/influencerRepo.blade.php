<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
 <link href="assets/logo.png" rel="icon">
 <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="{{ asset('UserView/vendor/aos/aos.css') }}" rel="stylesheet">
 <link href="{{ asset('UserView/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{ asset('UserView/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
 <link href="{{ asset('UserView/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
 <link href="{{ asset('UserView/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
 <link href="{{ asset('UserView/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
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
        <img src="User_View/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="influencerView.html" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Perfil</span></a></li>
          <li><a href="influencerRepo.html" class="nav-link scrollto"><i class="bx bx-stats"></i> <span>Colaboraciones</span></a></li>
          <li><a href="influencerCal.html" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Calificaciones</span></a></li>
          <li><a href="influencerConfig.html" class="nav-link scrollto"><i class="bx bx-pencil"></i> <span>Mi cuenta</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">
      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
        <div class="container">
          <!--Esta se puede usar para las colaboraciones o historial pero si hay que sacarle provecho-->
          <div class="section-title">
            <h2>Colaboraciones</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">Todo</li>
                <li data-filter=".filter-app">Futbol</li>
                <li data-filter=".filter-card">Comida</li>
                <li data-filter=".filter-web">Maquillaje</li>
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/PSG-Futbol.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/PSG-Futbol.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/Manchester-futbol.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/Manchester-futbol.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/Hotdog-comida.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/Hotdog-comida.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/portfolio-5.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/RealMadird_futbol.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/RealMadird_futbol.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/portfolio-7.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/Fideos_comida.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/Fideos_comida.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="User_View/img/colaboratory/portfolio-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="User_View/img/colaboratory/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        Influencer <strong><span>Colaboratory</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('User_View/vendor/purecounter/purecounter.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/aos/aos.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/typed.js/typed.min.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/waypoints/noframework.waypoints.js') }}" defer></script>
  <script src="{{ asset('User_View/vendor/php-email-form/validate.js') }}" defer></script>
  
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>