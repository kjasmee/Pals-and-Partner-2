<?php 
$message=array();
$errors=array();

// HANDLED CHATS
$handledchatfetch=findmsg('message_to',$_SESSION['username']);
while($row = $handledchatfetch->fetch_array()) { $handledchat[] = $row; }
$handledname=array();
$handlednamed=array();
$count=0;

if (isset($handledchat)) {
foreach($handledchat as $value){
  if(in_array($value['message_by'],$handledname)){$handlednamed[$count]=$value['montday'];}
  else{
    array_push($handledname,$value['message_by']);
    array_push($handlednamed,$value['montday']);
    $count++;
  }
}
}

// UNHANDLED CHATS

$unhandledchatfetch=finduc();
while($roow = $unhandledchatfetch->fetch_array()) { $unhandledchat[] = $roow; }
$unhandledname=array();

if (isset($unhandledchat)) {
  foreach($unhandledchat as $value){
    if(in_array($value['message_by'],$unhandledname)){}
    else{
        array_push($unhandledname,$value['message_by']);
    }
  }
}

if(isset($_GET['handle'])){
  if(in_array($_GET['handle'],$unhandledname)){
      $handlingclient=handlingchat($_SESSION['username'],$_GET['handle']);
      if($handlingclient){
        echo 
          '<script>
            alert("Success.!");
            window.location.href = "chats.php?chat='.$_GET['handle'].'"; 
          </script>';
      }
  }
  else{
      echo '<script>alert("Client Already Handled By Another Staff.");</script>';
  }
}

if(isset($_GET['chat'])){
  $message=gettingChat($_SESSION['username'],$_GET['chat']);
}

// message sent
if(isset($_POST['send'])){
  if($_POST['message_to']!=" "){
      unset($_POST['send']);

      if (count($errors) == 0) {
        $msg= mysqli_escape_string($mysqli, $_POST['message']);
        $msgby= mysqli_escape_string($mysqli, $_POST['message_by']);
        $msgto= mysqli_escape_string($mysqli, $_POST['message_to']);

        $sql="INSERT INTO messages(message, message_by, message_to)
                              VALUES('$msg','$msgby','$msgto');";
        $result=mysqli_query($mysqli,$sql);
        if($result){
            // echo true;
            echo "Message submitted successfully";
        }
      }
    else{
        array_push($errors, "Server Error.");
        echo $errors[0].$mysqli -> error;
  }
  echo '<script> window.location.href = "chats.php?chat='.$msgto.'"; </script>' ;
  }
  else{
      echo "You have not choosen any Client to chat with..";
  }
}

?>
<!-- chat template -->

<article class="chattemplate">
  <div class="handled">
    <h3> Existing Clients </h3>
    <?php $clientcount=1;
    foreach ($handledname as $value) { ?>
      <a class="msgid" href="<?php echo 'chats.php?chat='. $value; ?>">
      <div class="clientlnk">
        <div class="clienticon">
          <img src="assets/img/logo/user.jpg" alt="logo">
        </div>
        <div class="clientname">
          <?php print($value); ?>
        </div>

        <div class="clientlastmsgdate">
            
        </div>
      </div>
      </a>
    <?php } ?>
  </div>

  <div class="chatscreen">
        <div class="clientinnfo">
            <div class="clientinficn">
                <?php if($message) { ?>
                <img src="assets/img/logo/user.jpg" alt="logo"> <?php } else { ?>
                <img src="assets/img/logo/logo.jpg" style="border-radius: 5px;"> <?php } ?>
            </div>
            <div class="clientname">
                <?php if(!$message){echo "P&P Cleaning Services";}
                else {echo $_GET['chat'];}
                ?>
            </div>
        </div>
        <div class="messages">
            <?php
            $client="";
            foreach ($message as $mes) {
                if($mes['message_by']==$_SESSION['username']){ ?>
                <div class="outgoing">
                    <div class="sentmsg"><?php echo "<p>". $mes['message'].'</p>'; 
                    if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                    echo "<span>".$mes['time12']." | ".$day."</span>";
                    ?></div>
                    
                </div>
                <?php } else{?>
                <div class="incoming">
                    <div class="incomingmsgicon"><img src="assets/img/logo/user.jpg" alt="logo"></div>
                    <div class="receivedmsg"><?php echo "<p> ".$mes['message'].'</p>';
                    $client=$mes['message_by']; 
                    if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                    echo "<span>".$mes['time12']." | ".$day."</span><br>";
                    ?></div>
                </div>
            <?php } } ?>
        </div>

        <br>
        <br>
        <br>

        <div class="messagebox">
            <form method="post" action="chats.php">
                <input type="text" name="message" placeholder="Type a message" required>
                <input type="hidden" name="message_to" value=<?php if($client!=""){echo $client;} else echo " ";?>>
                <input type="hidden" name="message_by" value=<?php echo $_SESSION['username'];?>>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </div>

  <div class ="requests">
    <h3>New Client Requests</h3>
    <?php
      foreach ($unhandledname as $value) {
        echo '<li><a class="msg" href="chats.php?handle='. $value.'">'.$value.'</a></li><br><br>';
      }
    ?>
  </div>
</article>