<?php
    include('include/header.php');

    if(isset($_GET['details'])){
        //echo $_POST['details'];
        $myquotedetfetch = myQuotesdet($_GET['details']);
        while($myquotd = $myquotedetfetch->fetch_array()) { $quotedet[] = $myquotd; }

        $myquotedetifetch = myQuotespaydet($_GET['details'],$_SESSION['id']);
        while($myquotdp = $myquotedetifetch->fetch_array()) { $quotedetp[] = $myquotdp; }
    }
    
?>

<div class="container emp-profile">
    <section class="tabless">
    <h1>Requested Quote Details</h1>
    <div class="panel-body">
       <div class="table-responsive">
       <?php if (isset($quotedet)) { foreach ($quotedet as $row){?>
           <div class="quotedeta">
                <div class="qname">User Name:</div><div class="qnamed"><?php echo $row['name']; ?></div>
                <div class="qemail">User e-Mail:</div><div class="qemaild"><?php echo $row['email']; ?></div>
                <div class="qphone">User Phone:</div><div class="qphoned"><?php echo $row['phone']; ?></div>
                <div class="qservice">Requested Service:</div><div class="qserviced"><?php echo $row['cleaning_type']; ?></div>
                <div class="qallergy">Mentioned Allergies:</div><div class="qallergyd"><?php echo $row['allergies']; ?></div> <br>
                <div class="qarea">Service Area:</div><div class="qaread"><?php echo $row['area']; ?></div>
                <div class="qfreq">Service Frequency:</div><div class="qfreqd"><?php echo $row['frequency']; ?></div>
                <div class="qprice">Amount per service:</div><div class="qpriced"><?php echo "$".$row['price']; ?></div>
                <div class="qreqd">Requested Date:</div><div class="qreqdd"><?php echo $row['reqd']; ?></div>
                <div class="qstatus">Service Status:</div><div class="qstatusd"><?php if ($row['status']==""){ echo "Pending";}else {echo $row['status'];} ?></div>
                <?php if ($row['status']=="Approved"){?>
                <div class="qpayment">Payment Status:</div><div class="qpaymentd"><?php if (!isset($quotedetp)){ echo "Needs Payment"; echo '</br><a href=payment.php?qid='.$row['id'].'>Proceed to Payment</a>';}else {echo "Paid";} ?></div> <?php } ?>
           </div>
        <?php }} ?>
        </div>
    </div>
    </section>
</div>