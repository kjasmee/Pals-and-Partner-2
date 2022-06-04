<?php
if(!isset($_SESSION)){
  session_start();
}

$isLoggedIn = false;
if(isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)){
  $isLoggedIn = true;
  if(($_SESSION['user_type']=="costumer")){
    echo '<script type="text/javascript">',
      'window.location.assign("../index.php");',
      '</script>';
  }
}elseif (!$isLoggedIn){
  echo '<script type="text/javascript">',
    'window.location.assign("../index.php");',
    '</script>';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
  <meta content="webthemez" name="author" />
  <title>Admin</title>
  <!-- Bootstrap Styles-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FontAwesome Styles-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- Morris Chart Styles-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- Custom Styles-->
  <link href="assets/css/custom-styles.css" rel="stylesheet" />
  <!-- Google Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
  <!-- TABLE STYLES-->
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2ce145b69d.js" crossorigin="anonymous"></script>
  <!-- Bar Chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <!-- Pie Chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

  <div id="wrapper">

  <?php include('include/nav-top.php')?>

  <?php include('include/nav-side.php')?>