<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - toko handphone</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-3">SELAMAT DATANG DI TOKO HP</h1>
             <h8 class="mb-2">Alamat : jln. Rawadalem No.01 Blok.Talep Balongan - Indramayu</h8><br>
             <h8 class="mb-2">Email :  galerihandphone@gmail.com</h8><br>
             <h8 class="mb-2">Phone : (023)88654389</h8>
             
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          </div>
        </div>
      </div>
    </header>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <?php 
          include 'include/koneksi.php';
          $p = "select * from produk_hp";
          $i =  mysqli_query($koneksi,$p);
          while ($r = mysqli_fetch_array($i)) {
            
         ?>
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('<?php echo 'admin/galeri/'.$r['foto_hp']; ?>');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2><?php echo $r['nama_hp']; ?></h2>
            <p class="lead mb-0"><?php echo $r['harga_hp']; ?></p>
            <p class="lead mb-0"><?php echo $r['spek_hp']; ?></p>
          </div>
        </div>
      <?php } ?>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
