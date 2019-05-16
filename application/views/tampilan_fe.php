<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPK - Website</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?php echo base_url('assets/vendor/magnific-popup/magnific-popup.css')?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/creative.min.css')?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Sistem Informasi Pelaporan Keluhan</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Unduh</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Alur Pelaporan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Hubungi Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h1 class="text-uppercase">
            <strong>SIPK</strong>
          </h1>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto">
          <p class="text-faded mb-5">SIPK adalah aplikasi berbasiskan Android yang</br>
          langsung terintegrasi dengan SIPUHH yang berguna untuk membantu Operator </br>
          dalam kemudahan proses melaporkan keluhan yang dihadapi,</br>
          terkait dengan 
          Penatausahaan Hasil Hutan.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">UNDUH</a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading text-white">Unduh SIPK !</h2>
          <hr class="light my-4">
          <img style="width: 436px; height: 296px;margin-left: 30px" src = "<?php echo base_url('assets/img/mockup.png')?>">
        </br>
          <a href ="https://play.google.com/store/apps/details?id=jp.naver.line.android" target="_blank"><img style="width: 250px; height: 95px;" src = "<?php echo base_url('assets/img/googleplay.png')?>"></a>
          <hr class="light my-4">
          <a class="btn btn-dark btn-m" href="<?php echo base_url('assets/img/manual-book-sipk-2019.pdf')?>">Unduh PDF Buku Panduan Disini</a>
        </div>
      </div>
    </div>
  </section>

  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Alur Melakukan Pelaporan Keluhan</h2>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-mobile-alt text-primary mb-3 sr-icon-1">
              
            </i>
            <h3 class="mb-3">Login</h3>
            <p class="text-muted mb-0">Menggunakan akun yang sudah terdaftar di SIPUHH</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-mobile-alt text-primary mb-3 sr-icon-2"></i>
            <h3 class="mb-3">Lapor</h3>
            <p class="text-muted mb-0">Memilih tombol lapor pada halaman utama</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-mobile-alt text-primary mb-3 sr-icon-3"></i>
            <h3 class="mb-3">Formulir</h3>
            <p class="text-muted mb-0">Mengisi formulir keluhan lalu pilih tombol kirim</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-mobile-alt text-primary mb-3 sr-icon-4"></i>
            <h3 class="mb-3">Status</h3>
            <p class="text-muted mb-0">Jangan lupa untuk mengecek status laporan keluhan saat ini</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Hubungi Kami</h2>
          <hr class="my-4">
          <p class="mb-5">Saran, komentar, atau info lebih lanjut terkait SIPUHH dapat ditujukan melalui berikut ini </p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-globe fa-3x mb-3 sr-contact-1"></i>
          <a href="http://www.sipuhh.net/" target="_blank">
          <p>SIPUHH</p></a>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
          <p>
            <i><a href="mailto:helpdeskSIPUHH@dephut.net">helpdeskSIPUHH@dephut.com</a></i>
          </p>
        </div>
      </div>
    </div>
  </section>
<center>
  <p style="
  left: 0;
  bottom: 0;
  padding: 8px;
  width: 98%;
  background-color: #F2F1EF;
  opacity: 0.8;
  color: black;
  font-size: 13px;
  font-family: sans-serif;
  text-align: center;
  ">Copyright &copy; Irfan Ahmadi 2019 
</p>
</center>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle_fe.min.js')?>"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/scrollreveal/scrollreveal.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')?>"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('assets/js/creative.min.js')?>"></script>

</body>

</html>
