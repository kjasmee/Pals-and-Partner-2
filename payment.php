<?php
    include('include/header.php');
    if(isset($_GET['qid'])){
        $quotidp = $_GET['qid'];
    }else {
        $quotidp=0;
    }
    $arra=array();

    echo $quotidp.'<br>';
    if(isset($_POST['pay'])){
        unset($_POST['pay']);
        $arra = $_POST;
        $processpayment=payquote($_POST['card_name'],$_POST['card_num'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],$_POST['quote_id'],$_SESSION['id']);   

        $msg="Your payment for the requested quote has been successfully processed.";
        $updateequotenotif=updatenotif('Payment Processed',$msg,$_SESSION['id'],$_POST['quote_id']);   

        if($processpayment){
            echo 
            '<script>
                alert("The payment has been processed!");
                window.location.href = "quotesdet.php?details='.$_POST['quote_id'].'"; 
            </script>';
        }
    }
    
?>

<div class="container emp-profile">
   
    <section class="tabless">
    <div class="panel-body">
        <div class="table-responsive">
        <form action="payment.php" method="POST"> 
            <div class="payment-container">
                <div class="payment-header">
                    <h2>Payment</h2>
                    <label for="fname">Accepted Cards</label>
                    <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                </div>

                <div class="payment-name">
                    <input type="hidden" name="quote_id" value="<?php echo $quotidp;?>">
                    <label for="cname">Name on Card</label>
                    <input type="text" id="cname" name="card_name" placeholder="Full Name">
                </div>

                <div class="card-num">
                    <label for="ccnum">Credit card number</label>
                    <input type="number" id="ccnum" name="card_num" min="1000000000000000" max="9999999999999999" placeholder="1111222233334444">
                </div>  

                <div class="exp-month">
                    <label for="expmonth">Exp Month</label>
                    <input type="number" id="expmonth" name="exp_month" min="1" max="12" placeholder="September">
                </div>

                <div class="exp-year">
                    <label for="expyear">Exp Year</label>
                    <input type="number" id="expyear" name="exp_year" min="2022" max="2026" placeholder="2018">
                </div>
                
                <div class="cvv">
                    <label for="cvv">CVV</label>
                    <input type="number" id="cvv" name="cvv" min="100" max="9999" placeholder="352">
                </div>

                <div class="chkout">
                    <input type="submit" name="pay" value="Continue to checkout">
                </div>
            </div>
        </form>
        </div>
    </div>
    </section>
</div>
<?php include('include/footer.php');?>