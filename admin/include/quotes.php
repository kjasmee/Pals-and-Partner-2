<?php 
if(isset($_GET['approve'])){
    $updateequote=updatequote('Approved',$_GET['approve']); 

    $qusid=myQuotesdet($_GET['approve']);  
    while($qusrid = $qusid->fetch_array()) { $quotedetusr[] = $qusrid; }
    foreach ($quotedetusr as $row) {$quoteuserid=$row['user_id'];}

    $msg="Your requested quote has been approved. Please proceed for payment.";
    $updateequotenotif=updatenotif('Quote Approved',$msg,$quoteuserid,$_GET['approve']);   
    if($updateequote){
        echo 
          '<script>
            alert("The quote has been approved!");
            window.location.href = "quotes.php"; 
          </script>';
    }}

if(isset($_GET['decline'])){
    $updateequote=updatequote('Declined',$_GET['decline']);   

    $qusid=myQuotesdet($_GET['decline']);  
    while($qusrid = $qusid->fetch_array()) { $quotedetusr[] = $qusrid; }
    foreach ($quotedetusr as $row) {$quoteuserid=$row['user_id'];}

    $msg="Your requested has been discarded.";

    $updateequotenotif=updatenotif('Quote Discarded',$msg,$quoteuserid,$_GET['decline']);
    if($updateequote){
        echo 
          '<script>
            alert("The quote has been declined!");
            window.location.href = "quotes.php"; 
          </script>';
    }}
?>

<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Requested Quotes
   </div>
   <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr>
                       <th>SN</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Area</th>
                       <th>Service</th>
                       <th>Frequency</th>
                       <th>Allergies</th>
                       <th>Update Status</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                   $result = getQuotes();
                   $sn=1;
                   while($row=mysqli_fetch_assoc($result)){
                   ?>
                   <tr>
                       <td><?php echo $sn; $qid=$row['id']; $uid=$row['user_id'];?></td>
                       <td><?php echo $row['name'];?></td>
                       <td><?php echo $row['email'];?></td>
                       <td><?php echo $row['phone'];?></td>
                       <td><?php echo $row['area'];?> &#13217;</td>
                       <td><?php echo $row['service'];?></td>
                       <td><?php echo $row['frequency'];?></td>
                       <td style="width: 1500px !important; max-width: 150px !important; overflow-wrap: anywhere !important;">
                        <?php echo $row['allergies'];?></td>
                       <td>
                          <?php 
                          if ($row['status']==""){
                          echo '<a href="quotes.php?approve='.$qid.'">Approve </a>'; 
                          echo '<a href="quotes.php?decline='.$qid.'"> Decline</a>'; }
                          else {echo 'Already '.$row['status'].'';}
                          ?>
                      </td>
                   </tr>
                 <?php
                   $sn++;
                   }
                 ?>


               </tbody>
           </table>
       </div>
   </div>
</div>
<!-- End  Hover Rows  -->
