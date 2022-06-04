<?php
  include('include/header.php');

    $message=array();
    $agent="";
    $handledchatfetch=findmsg('message_by',$_SESSION['username']);
    while($handledchat = $handledchatfetch->fetch_array()) { $num[] = $handledchat; }
    if($num){
        foreach ($num as $value) {
            $agent=$value["message_to"];
        }
    }
    if(isset($_POST['send'])){
      if($num){
        foreach ($num as $value) {
            $msgto=$value["message_to"];
        }
        if($msgto=='not_allocated'){
            unset($_POST['send']);
            $agent='not_allocated';
            $mssg=$_POST['message'];
            $mssgby=$_SESSION['username'];
            $mssgto='not_allocated';
            $sendmes=insert($mssg, $mssgby, $mssgto);     
        }
        else{
            unset($_POST['send']);
            $mssg=$_POST['message'];
            $mssgby=$_SESSION['username'];
            $mssgto=$msgto;
            $agent=$msgto;
            $sendmes=insert($mssg, $mssgby, $mssgto); 
        }
    }
    else {
        unset($_POST['send']);
        $mssg=$_POST['message'];
        $mssgby=$_SESSION['username'];
        $mssgto='not_allocated';
        $sendmes=insert($mssg, $mssgby, $mssgto); 
        $agent='not_allocated';
      }
        
    }
    $message=gettingChat($_SESSION['username'],$agent);
?>
<link rel="stylesheet" href="assets/css/profile.css">

<div class="container emp-profile">
<article class="chattemplate">
    <div class="loyalinnfo">
        <div class="loyalinficn">
            <img src="assets/img/logo/logo.jpg" alt="logo">
        </div>
        <div class="loyalname">
            Pals & Partners | Admin Support
        </div>
    </div>
    <div class="messages">
        <?php
        $agent="";
        foreach ($message as $mes) { 
            if($mes['message_by']==$_SESSION['username']){?>
            <div class="outgoing">
                <div class="sentmsg">
                    <?php 
                        echo "<p> ". $mes['message'].'</p>';
                        if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                        echo "<span>".$mes['time12']." | ".$day."</span>"; 
                    ?> 
                </div> 
            </div>
            <?php } else{?>
            <div class="incoming">
                <div class="incomingmsgicon"><img src="assets/img/logo/avatar1.png" alt="logo"></div>
                <div class="receivedmsg"><?php echo "<p> ".$mes['message'].'</p>';
                $client=$mes['message_by']; 
                if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
               echo "<span>".$mes['time12']." | ".$day."</span><br>";
                ?></div>
            </div>
            <?php } } ?>
            
    </div>

    <div class="messagebox">
        <form method="post" action="chats.php">
            <input type="text" name="message" required>
            <input type="hidden" name="message_to" value=<?php if($agent!=""){echo $agent;} else echo " ";?>>
            <input type="hidden" name="message_by" value=<?php echo $_SESSION['username'];?>>
            <input type="submit" name="send" value="Send">
        </form>
    </div>
</article>
</div>

<?php include('include/footer.php');?>