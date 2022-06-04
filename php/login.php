<?php
    include ('db_conn.php');
    if($_POST){
          $email=mysqli_escape_string($mysqli,$_POST['email']);
          $password=mysqli_escape_string($mysqli,$_POST['pass']);
          $user_check_query = "SELECT * FROM user WHERE email='$email'  LIMIT 1";


      $result = mysqli_query($mysqli, $user_check_query);
      $user = mysqli_fetch_assoc($result);


      if ($user) { // if user exists
        if ($user['email'] === $email) {
            $auth=password_verify($password, $user['password']); //true or false
            if ($auth) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user['name'];
                $_SESSION['user_type'] = $user['type'];
                $_SESSION['logged'] = true;

                echo true;


            } else {
                echo "Wrong Password!";
            }
        }
    }
    else
        echo 'User Doesnot exist';
     };
    ?>
