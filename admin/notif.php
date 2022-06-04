<?php
	include('include/header.php');
	include('php/functions.php');
	include('php/db_conn.php');

	if(isset($_POST['addnotif'])){
        unset($_POST['addnotif']);
        $addnotif=updatenotif($_POST['notif_title'],$_POST['notif_msg'],'0','0');    

        if($addnotif){
            echo 
            '<script>
                alert("A new notification has been sent to all the costumers!");
                window.location.href = "index.php"; 
            </script>';
        }
    }
?>

<div id="page-wrapper">
		<div class="header">
			<h1 class="page-header">
				Alert Costumers! 
			</h1>
		</div>

		<div id="page-inner">
			<form action="notif.php" method="POST">
			<div class="register-container">
				<h1>Add Notification</h1>
				<p>Please fill out the details of notification</p>
				<br>

				<label for="notif_title"><b>Notification Title</b></label>
				<input type="text" name="notif_title" placeholder="Notification Title" required>

				<label for="notif_title"><b>Notification Message</b></label>
				<input type="text" name="notif_msg" placeholder="Describe Notification" required>

				<div class="clearfix">
					<input type="button" value="Cancel">
					<input type="submit" name="addnotif" value="Send a new Notification">
				</div>
			</div>
			</form> 

            <footer>
            <p>Copyright Pals and Partners. All Rights Reserved</a></p>
            </footer>

		</div>
		<!-- /. PAGE INNER  -->

	</div>
	<!-- /. PAGE WRAPPER  -->

<?php include('include/footer.php');?>
