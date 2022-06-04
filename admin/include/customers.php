<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       List of Customers
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
                       <th>Address</th>
                       <th>Update</th>
                       <th>Delete</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                   $result = getCustomers();
                   $sn=1;
                   while($row=mysqli_fetch_assoc($result)){
                   ?>
                   <tr>
                       <td><?php echo $sn?></td>
                       <td><?php echo $row['name']?></td>
                       <td><?php echo $row['email']?></td>
                       <td><?php echo $row['phone']?></td>
                       <td><?php echo $row['address']?></td>
                       <td><?php echo '<a href="..\profile.php?userid='.$row['id'].'"> Update</a>'?></td>
                       <td><button onclick="deleteCustomer(<?php echo $row['id']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
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
<script>
function deleteCustomer(id){
  //alert(id);
  $.ajax({
    type: "POST",
    url: './php/delete_customer.php',
    data: {id:id},
    success: function(response)
    {
        if (response == true) {          
          location.reload();
        }
        else {
        alert(response);
        }
    }
  });

}
</script>
