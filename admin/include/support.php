<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 All Requests
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Email</th>
                                <!-- <th>Reply</th> -->
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $result = getMessages();
                            $sn=1;
                            while($row=mysqli_fetch_assoc($result)){
                              $name = $row['name'];
                              $email = $row['email'];
                              $subject = $row['subject'];
                            ?>
                            <tr class="even">
                                <td><?php echo $sn?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $subject?></td>
                                <td><?php echo $row['message']?></td>
                                <td><?php echo $email?></td>
                                <!-- <td><button onclick="replyCustomer('<?php //echo $name?>', '<?php //echo $email?>','<?php //echo $subject?>')"><i class="fa fa-envelope" aria-hidden="true"></i></button></td> -->
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
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->

<div class="reply_form">

</div>
<script>
function replyCustomer(name, email, subject){
  $.ajax({
    type: "POST",
    url: './php/reply_customer.php',
    data: {name:name, email:email, subject:subject},
    success: function(response)
    {
        if (response == true) {
          alert("sent");

          //location.reload();
        }
        else {
        alert(response);
        console.log(response);
        }
    }
  });
}
</script>
