<?php
	include('include/header.php');
	include('php/functions.php');
	include('php/db_conn.php');
?>

	<div id="page-wrapper">
		<div class="header">
			<h1 class="page-header">
				Add Manager
			</h1>
		</div>

		<div id="page-inner">

			<?php //include('include/addusr.php');?>
            <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <form id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i>Manager's Name</label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i>Manager's Email</label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i>Phone</label>
                                <input type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone" id="phone" placeholder="Your Phone Number"  maxlength = "10" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i>Address</label>
                                <input type="text" name="address" id="address" placeholder="Your Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i>Password</label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="pass" id="pass" placeholder="Password" minlength = "8" maxlength = "15" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i>Re-enter Password</label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="re_pass" id="re_pass" placeholder="Repeat your password"  minlength = "8" maxlength = "15" required/>
                            </div>
                            <input type="hidden" name="type" value="manager">
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

			<footer>
			<p>Copyright Pals and Partners. All Rights Reserved</a></p>
			</footer>

		</div>
		<!-- /. PAGE INNER  -->

	</div>
<!-- /. PAGE WRAPPER  -->

<?php include('include/footer.php');?>

<script>
    //User Registration
    $('#register-form').submit(function(e) {
      e.preventDefault();
      console.log($(this).serialize());
      $.ajax({
        type: "POST",
        url: '../php/register.php',
        data: $(this).serialize(),
        success: function(response)
        {
            if (response == true) {
              alert("Manager has been Registered!");
              window.location = 'index.php';
            }
            else {
              Swal.fire(response);
            }
        }
    });
    });

</script>
