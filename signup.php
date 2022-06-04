<?php include ('include/header.php');?>
<!-- Login css -->
<link rel="stylesheet" href="assets/css/login.css">
    <div class="main">

      <?php if($isLoggedIn){
        echo '<script type="text/javascript">',
           'redirectToIndex();',
           '</script>'
      ;
      }
      ?>

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone" id="phone" placeholder="Your Phone Number"  maxlength = "10" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="pass" id="pass" placeholder="Password" minlength = "8" maxlength = "15" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="re_pass" id="re_pass" placeholder="Repeat your password"  minlength = "8" maxlength = "15" required/>
                            </div>
                            <input type="hidden" name="type" value="customer">
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/img/login/signup-image.jpg" alt="sign up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
    //User Registration
    $('#register-form').submit(function(e) {
      e.preventDefault();
      console.log($(this).serialize());
      $.ajax({
        type: "POST",
        url: './php/register.php',
        data: $(this).serialize(),
        success: function(response)
        {
            if (response == true) {
              //alert("Successfully Registered. Please login");
              window.location = 'login.php';
            }
            else {
              Swal.fire(response);
            }
        }
    });
    });

    </script>
