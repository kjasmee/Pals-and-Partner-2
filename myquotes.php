<?php
    include('include/header.php');

    $myquotesfetch = myQuotes($_SESSION['id']);
    while($myquot = $myquotesfetch->fetch_array()) { $myquotes[] = $myquot; }
?>

<div class="container emp-profile">
    <section class="tabless">
    <h1>Requested Quotes</h1>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
               <?php if (isset($myquotes)) { ?>
                   <tr>
                       <th>SN</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Area</th>
                       <th>Service</th>
                       <th>Frequency</th>
                       <th>Status</th>
                       <th>View Details</th>
                   </tr>
               </thead>
               <tbody>
                    <?php $sno =1; foreach ($myquotes as $row) { ?>
                    <tr>
                       <td><?php $myquotid= $row['id'];echo $sno?></td>
                       <td><?php echo $row['name'];?></td>
                       <td><?php echo $row['email'];?></td>
                       <td><?php echo $row['phone'];?></td>
                       <td><?php echo $row['area'];?> &#13217;</td>
                       <td><?php echo $row['cleaning_type'];?></td>
                       <td><?php echo $row['frequency'];?></td>
                       <td><?php if ($row['status']==""){ echo "Pending";}else {echo $row['status'];}?></td>
                       <td><?php echo '<a href="quotesdet.php?details='.$myquotid.'">View Details</a>';?></td>
                   </tr>
                   <?php $sno++; }} else {echo "No requested quotes as been found! Please try again later.";} ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>
</div>
<?php include('include/footer.php');?>