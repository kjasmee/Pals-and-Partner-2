<?php
    if(!isset($_SESSION)){
      session_start();
    }
    include 'db_conn.php';
    $errors=array();


	if($_POST){
    $name= mysqli_escape_string($mysqli, $_POST['name']);
    $email= mysqli_escape_string($mysqli, $_POST['email']);
    $phone= mysqli_escape_string($mysqli, $_POST['phone']);
    $address= mysqli_escape_string($mysqli, $_POST['address']);
    $user_id= mysqli_escape_string($mysqli, $_POST['id']);

    if (count($errors) == 0) {
      $sql="UPDATE user SET name='$name',
        email='$email',
        phone='$phone',
        address='$address'
        WHERE id='$user_id';";
      $result=mysqli_query($mysqli,$sql);
      if($result){
        $query="SELECT * FROM user WHERE id='".$_SESSION['id']."';";
        $resulltt=mysqli_query($mysqli,$query);
        $user_detaills=mysqli_fetch_assoc($resulltt);
        $_SESSION['username']=$user_detaills['name'];
        $_SESSION['email']=$user_detaills['email'];
        echo true;
      }else{
        array_push($errors, "Can't update now. Please try again later");
      }
    }
      else{
          array_push($errors, "Server Error.");
          echo $errors[0].$mysqli -> error;
    }


	}



?>
