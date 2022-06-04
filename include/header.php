<?php
if(!isset($_SESSION)){
  session_start();
}

$isLoggedIn = false;
if(isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)){
  $isLoggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pals and Partners</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

  <script src="assets/vendor/jquery/jquery.min.js"></script>

  <script src="assets/js/script.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/2ce145b69d.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.php">Pals and Partners<span>.</span></a></h1>
          <?php if($isLoggedIn):?>
          <span class="h5">Welcome <?php echo $_SESSION['username']?></span>
          <?php endif;?>

          <?php include('include/navigation.php');?>

        </div>
      </div>

    </div>
  </header><!-- End Header -->
