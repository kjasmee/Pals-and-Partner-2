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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/img/login/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
    //User Login
    $('#login-form').submit(function(e) {
      e.preventDefault();
      console.log($(this).serialize());
      $.ajax({
        type: "POST",
        url: './php/login.php',
        data: $(this).serialize(),
        success: function(response)
        {
            if (response == true) {
               //alert("logged in");
               window.location = 'index.php';
            }
            else {
              Swal.fire(response);
            }
        }
    });
    });


    </script>
