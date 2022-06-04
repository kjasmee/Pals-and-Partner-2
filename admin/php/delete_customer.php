<?php
     include ('db_conn.php');
     if($_POST){
          $delete_id=mysqli_escape_string($mysqli,$_POST['id']);
          $sql="DELETE FROM `user` WHERE `user`.`id` = $delete_id;";
          $result=mysqli_query($mysqli,$sql);
          if($result){
              echo true;
          }else{
            echo "Not Deleted";
          }
    }
    else{
        echo 'No Data';
     }
    ?>
