<?php
    //database connection
    $mysqli= new mysqli("localhost","root", "", "pals");
    if (mysqli_connect_error()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $user_id=$_SESSION['id'];
    $query="SELECT * FROM user WHERE id='$user_id';";
    $result=mysqli_query($mysqli,$query);
    $user_details=mysqli_fetch_assoc($result);
    $name=$user_details['name'];
    $email=$user_details['email'];
    $phone=$user_details['phone'];
    $address=$user_details['address'];
    $type=$user_details['type'];
?>
