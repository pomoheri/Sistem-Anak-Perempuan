<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SISTEM INFORMASI PPA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- logo title -->
  <link href="img/logo/logo1.png" rel="icon">
  <link href="img/logo/logo1.png" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="halamandepan/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="halamandepan/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="halamandepan/lib/animate/animate.min.css" rel="stylesheet">
  <link href="halamandepan/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="halamandepan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="halamandepan/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="halamandepan/css/style.css" rel="stylesheet">

</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <a href="#header" class="scrollto"><img src="img/logo/logo1.png" alt=""  class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#data">Data Kasus</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#footer">Kontak Kami</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="intro-info order-md-first order-last text-center">
          <h2>SATGAS PERLINDUNGAN<br> <span>PEREMPUAN DAN ANAK</span></h2> 
        </div>
    
        </div>
        </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="data">

      <div class="container">
        <header class="section-header">
          <h3>Jumlah Kasus Per Tahun</h3>
          <div class="col-lg-12 col-md-8">
            <div class="about-content">
             <div class="card-header">  
                <div class="row">
                  <b>Pilih Tahun</b><div class="col-6 col-md-4 col-mt-3"><select class="form-control" id="th">
                    <option value="">Semua Tahun</option>
                    <?php 
                      include("koneksi.php");
                      $th=mysql_query("SELECT year(tglkas) as tahun, idkasus from datkas group by tahun");
                      while ( $row= mysql_fetch_array($th)) {
                       ?>
                    <option value="<?php echo $row['tahun'] ?>"><?php echo $row['tahun'] ?></option>
                      <?php 
                      } ?>
                    </select></div>
                     </div>
                      <div class="card-body">
                        <table width="100%" class="table table-striped table-bordered table-hover data">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>kategori</th>
                              <th>jumlah kasus</th>
                            </tr>
                          </thead>
                          <tbody id='result'>
                          </tbody>
                        </table>
                  </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- #about -->
    <section id="about">

      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="halamandepan/img/kantor.jpeg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <h2>Tentang Kami</h2>
              <p>Komisi Perlindungan Perempuan dan Anak Kabupaten Sleman merupakan sebuah organisasi yang berdiri di karenakan keprihatinan pemerintah Kabupaten Sleman terhadap kekerasan dan kriminalitas yang sering terjadi kepada Perempuan dan Anak</p>
            </div>
          </div>
        </div>
      </div>

    </section>


    <!--==========================
      Services Section
    ============================-->
    

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
      <div class="container">

        <header class="section-header">
          <h3>Kasus Yang Pernah Ditangani</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="halamandepan/img/laki.jpg" class="testimonial-img" alt="">
                <h3>A.N</h3>
                <h4>Prostitusi Di Bawah Umur</h4>
                <p>
                  A.N Merupakan salah satu korban yang telah mengalami kasus prostitusi dibawah umur, dalam hal ini komisi perlindungan perempuan dan anak kabupaten sleman telah berperan untuk menangani kasus ini hingga selesai
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="halamandepan/img/team-1.jpg" class="testimonial-img" alt="">
                <h3>D.M</h3>
                <h4>Kekerasan Terhadap Perempuan</h4>
                <p>
                  D.M Merupakan salah satu korban yang telah mengalami kasus prostitusi dibawah umur, dalam hal ini komisi perlindungan perempuan dan anak kabupaten sleman telah berperan untuk menangani kasus ini hingga selesai
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="halamandepan/img/laki.jpg" class="testimonial-img" alt="">
                <h3>W.Y</h3>
                <h4>Bulying di Sekolah</h4>
                <p>
                  W.Y Merupakan salah satu korban yang telah mengalami kasus prostitusi dibawah umur, dalam hal ini komisi perlindungan perempuan dan anak kabupaten sleman telah berperan untuk menangani kasus ini hingga selesai
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section>
  
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>FAQ</h3>
                    <p>1.Anda Ingin menyelesaikan kasus yang terjadi kepada teman atau bahkan diri anda sendiri?</p>
                    <p>1.Anda Ingin menyelesaikan kasus yang terjadi kepada teman atau bahkan diri anda sendiri?</p>
                    <p>1.Anda Ingin menyelesaikan kasus yang terjadi kepada teman atau bahkan diri anda sendiri?</p>
                  </div>

                </div>

                <div class="col-sm-6">
                  <div class="footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About us</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Terms of service</a></li>
                      <li><a href="#">Privacy policy</a></li>
                    </ul>
                  </div>

                  <div class="footer-links">
                    <h4>Kontak Kami</h4>
                    <p>
                      Jl Laksda Adisucipto <br>
                      Depok, Sleman<br>
                      Daerah Istimewa Yogyakarta<br>
                      <strong>Phone:</strong> (0274) 9988<br>
                      <strong>Email:</strong> komisippa@gmail.com<br>
                    </p>
                  </div>

                  <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>

                </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">
              
              <h4>Tinggalkan Pesan</h4>
              <p>Silahkan tinggalkan pesan untuk kami agar kami dapat memperbaiki perusahaan kami, kritik dan Saran anda saya tunggu....</p>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>

          </div>

          

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  
  <script src="halamandepan/lib/jquery/jquery.min.js"></script>
  <script src="halamandepan/lib/jquery/jquery-migrate.min.js"></script>
  <script src="halamandepan/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="halamandepan/lib/easing/easing.min.js"></script>
  <script src="halamandepan/lib/mobile-nav/mobile-nav.js"></script>
  <script src="halamandepan/lib/wow/wow.min.js"></script>
  <script src="halamandepan/lib/waypoints/waypoints.min.js"></script>
  <script src="halamandepan/lib/counterup/counterup.min.js"></script>
  <script src="halamandepan/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="halamandepan/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="halamandepan/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="halamandepan/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="halamandepan/js/main.js"></script>
<?php include('rekdata.js');?>
</body>
</html>
