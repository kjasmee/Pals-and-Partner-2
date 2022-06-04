<?php include('./php/db_conn.php');?>
<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><strong><i class="icon fa fa-plane"></i> <?php echo $_SESSION['username'];?></strong></a>

        <div id="sideNav" href="">
          <i class="fa fa-bars icon"></i>
        </div>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              <?php $query="SELECT * FROM message ORDER BY id DESC LIMIT 4;";
              $result=mysqli_query($mysqli,$query);
              while($row=mysqli_fetch_assoc($result)){
              ?>
                <li>
                    <a href="support.php">
                        <div>
                            <strong><?php echo $row['name']?></strong>
                        </div>
                        <div><?php echo $row['subject']?></div>
                    </a>
                </li>
                <li class="divider"></li>
              <?php
              }
              ?>
                <li>
                    <a class="text-center" href="messages.php">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="../profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>
<!--/. NAV TOP  -->
