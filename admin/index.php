<?php
	include('include/header.php');
	include('php/functions.php');
?>

				<div id="page-wrapper">
					<div class="header">
					  <h1 class="page-header">
					      Dashboard <small><?php echo $_SESSION['username'];?></small>
					  </h1>
					</div>

					<div id="page-inner">

						<?php include('include/inner-index.php');?>

						<footer>
					    <p>Copyright Pals and Partners. All Rights Reserved</a></p>
					  </footer>

					</div>
					<!-- /. PAGE INNER  -->

				</div>
			<!-- /. PAGE WRAPPER  -->

<?php include('include/footer.php');?>
