<?php $active_nav = ""?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="chats.php"><i class="fa fa-envelope fa-fw"></i>Messages</a>
            </li>
            <li>
                <a href="support.php"><i class="fa-solid fa-ticket"></i></i>Support Requests</a>
            </li>
            <li>
                <a href="quotes.php"><i class="fa fa-shopping-cart"></i>Requested Quotes</a>
            </li>

            <?php if(($_SESSION['user_type']=="admin")){ ?>

            <li>
                <a href="notif.php"><i class="fa fa-bell"></i>Alert Costumers</a>
            </li>
            <li>
                <a href="customers.php"><i class="fa fa-user"></i>Customers</a>
            </li>
            <li>
                <a href="addusr.php"><i class="fa-solid fa-users"></i>Add Manager</a>
            </li>

            <?php } ?>

            <li>
                <a href="reporting.php"><i class="fa-solid fa-chart-line"></i>Reporting</a>
            </li>

            <li>
                <a href="../index.php"><i class="fa fa-desktop"></i>Main Website</a>
            </li>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
