<?php
    require('db_conn.php');
    if(isset($_GET['userid'])){
        if($_SESSION["user_type"]=="admin"){
            $user_id=$_GET['userid'];
            $type="customer";

            $query="SELECT * FROM user WHERE id='$user_id';";
            $result=mysqli_query($mysqli,$query);
            $user_details=mysqli_fetch_assoc($result);
        }
    } else {
        $user_id=$_SESSION['id'];
        $query="SELECT * FROM user WHERE id='$user_id';";
        $result=mysqli_query($mysqli,$query);
        $user_details=mysqli_fetch_assoc($result);
        $type=$user_details['type'];
    }
    $name=$user_details['name'];
    $email=$user_details['email'];
    $phone=$user_details['phone'];
    $address=$user_details['address'];
?>
