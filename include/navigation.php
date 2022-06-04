<?php
    include('admin/php/functions.php');
    include('php/db_conn.php');
?>
<nav class="nav-menu d-none d-lg-block">
  <ul>
    <li class="active"><a href="index.php#header">Home</a></li>
    <li><a href="index.php#about">About</a></li>
    <li><a href="index.php#tabs">Products</a></li>
    <li><a href="index.php#services">Services</a></li>

    <li><a href="index.php#contact">Contact</a></li>
    <?php if(!$isLoggedIn){

      echo "<li><a href='login.php'>Login</a></li>";
    //  echo "not logged in";
    }else{
      if(($_SESSION["user_type"]=="admin") || ($_SESSION["user_type"]=="manager")){
        echo "
        <li class='drop-down'><a href=''>Admin</a>
          <ul>
            <li><a href='admin/index.php'>Admin Panel</a></li>            
          </ul>
        </li>
        ";
      }else{
        $notifs=notifusr($_SESSION['id']);
        while($notiflist = $notifs->fetch_array()) { $notilist[] = $notiflist; }
        echo "<li><a href='get-quote.php'>Get Quote</a></li>";
      ?>
      <!-- notification icon -->
      <div class="notificon">
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-bell"></i>
          </a>
          <ul class="dropdown-menu dropdown-messages">
            <?php if (isset($notilist)) { foreach ($notilist as $row) { ?>
            <li>
            <?php echo '<a href="quotesdet.php?details='.$row['quote_id'].'">';?>
              <div class="notifs">
              <span class="header"><?php echo $row['notif_title'];?></span>
              <span class="notifmsg"><?php echo $row['notif_msg'];?></span>
              <span class="date">Updated: <?php echo $row['notif_date'];?></span>
              </div>
              </a>
            </li>
            <hr>
            <?php }} ?>
          </ul>    
      </ul>
      </div>
      <?php } 
      echo "<li class='drop-down'><a href=''>Account</a>
        <ul>
          <li><a href='profile.php'>Profile</a></li>";
          if($_SESSION["user_type"]=="customer") {
          echo "<li><a href='chats.php'>Chats</a></li>";
          echo "<li><a href='myquotes.php'>Requested Quotes</a></li>";}
          echo "<li><a href='php/logout.php'>Logout</a></li>
        </ul>
      </li>
      ";
    } ?>
  </ul>
</nav><!-- .nav-menu -->
