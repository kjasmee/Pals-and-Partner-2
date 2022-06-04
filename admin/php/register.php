<?php
  include 'db_conn.php';
  $errors=array();

	if($_POST){
    $name= mysqli_escape_string($mysqli, $_POST['name']);
    $email= preg_replace("/\s+/", "", mysqli_escape_string($mysqli, $_POST['email']));
    $password= mysqli_escape_string($mysqli, $_POST['pass']);
    $repassword= mysqli_escape_string($mysqli, $_POST['re_pass']);
    $phone= preg_replace("/\s+/", "", mysqli_escape_string($mysqli, $_POST['phone']));;
    $address= mysqli_escape_string($mysqli, $_POST['address']);
    $type= mysqli_escape_string($mysqli, $_POST['type']);
    $passwordAuth = false;
    if($password == $repassword){
      $passwordAuth = true;
      $password=password_hash($password, PASSWORD_BCRYPT);
    }

    $email_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $email_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if email exists
        array_push($errors, "User with that email already exists");
    }

    if(!$passwordAuth){
      array_push($errors, "Passwords didn't match");
    }

    if ((count($errors) == 0) && $passwordAuth) {

      $sql="INSERT INTO user(name, email, password, phone, address, type)
        VALUES('$name', '$email', '$password', '$phone', '$address', '$type');";
      $result=mysqli_query($mysqli,$sql);
      if($result){
          echo true;
      }
    }
    else{
      array_push($errors, "Server Error.");
      echo $errors[0].$mysqli -> error;
    }
	}


?>
