<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Icon Font awesome -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
  <!-- CSS Styles -->
  <!-- Libraries Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Kontak | App Toko</title>
</head>

<body>

  <!-- Navbar -->
  <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
    <nav class="navigasi navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body border-bottom"
      style="font-family: Poppins, sans-serif">
      <div class="container">
        <div>
          <a class="navbar-branding navbar-brand" href="#">App <span>Toko</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 px-md-5">
            <li class="nav-item">
              <a class="nav-link px-md-5" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-md-5" href="semua-produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-md-5" href="about.php">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-md-5" href="tim.php">Tim</a>
            </li>
          </ul>
          <div class="d-flex">
            <a class="btn btn-get-started btn-get-started-outline" href="contact.php"
              style="margin-right: 10px">Kontak</a>
            <a class="btn btn-get-started btn-get-started-blue text-white" href="login.php">Masuk</a>
          </div>
        </div>
      </div>
    </nav>
  </section>
  <!-- Navbar akhir -->
  <div class="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d15854.802184360477!2d107.7605549769834!3d-6.559433724093402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d-6.562795299999999!2d107.7754652!4m5!1s0x2e693c81014f0375%3A0x92c68964fc492d33!2ssmkn%201%20subang%20maps!3m2!1d-6.5563277!2d107.760759!5e0!3m2!1sid!2sid!4v1643910207461!5m2!1sid!2sid"
      height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>

  <div class="container" style="margin-bottom:100px; margin-top: 50px;">
    <div class="row text-center mb-3">
      <div class="col">
        <h2 class="title-tim headline text-center mb-5">Kontak Kami</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action='https://formspree.io/f/mzbyzlkj' method='POST'>
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="nama" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email" />
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-kirim" style="background-color: #5252ff;">Kirim</button>
        </form>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <svg class="footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
    viewBox="0 0 1920 79">
    <path class="cls-2"
      d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z"
      transform="translate(0 -0.188)" />
  </svg>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="footer-col first">
            <h4>Tentang App Toko</h4>
            <p class="p-small">App Toko merupakan aplikasi toko berbasis online yang dimana semua proses transaksinya
              dilakukan secara digital antara pembeli dan penjual.</p>
          </div>
        </div>


        <div class="col-md-5">
          <div class="footer-col last">
            <h4>Kontak</h4>
            <ul class="list-unstyled li-space-lg p-small">
              <li class="media">
                <div class="media-body"><?php echo $a-> admin_address ?></div>
                <div class="media-body"><?php echo $a-> admin_email ?></div>
                <div class="media-body"><?php echo $a-> admin_telp ?></div>

              </li>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of footer -->

  <!-- Copyright -->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="p-small">
            Copyright © 2022 <a href=#">App Toko</a><br />
          </p>
        </div>
        <!-- end of col -->
      </div>
      <!-- enf of row -->
    </div>
    <!-- end of container -->
  </div>
  <!-- end of copyright -->
  <!-- JS Plugins -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>