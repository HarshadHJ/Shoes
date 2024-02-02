 <?php 
      require('top.php');
     
  $id="";
  if(isset($_GET["id"]))
  {
    $id = $_GET["id"];
  }


$sql_query = "SELECT * FROM orders  WHERE id = $id";
$result=$conn->query($sql_query);

$id=get_safe_value($conn,$_GET['id']);
if(isset($_POST['update_order_status'])){
  $update_order_status=$_POST['update_order_status'];
  if($update_order_status=='5'){
    mysqli_query($conn,"update orders set order_status='$update_order_status',payment_status='Success' where id='$id'");
  }else{
    mysqli_query($conn,"update orders set order_status='$update_order_status' where id='$id'");
  }
  
}


$id=get_safe_value($conn,$_GET['id']);
if(isset($_POST['update_payment_status'])){
  $update_order_status=$_POST['update_payment_status'];
  if($update_payment_status=='2'){
    mysqli_query($conn,"update orders set order_status='$update_payment_status',payment_status='Success' where id='$id'");
  }else{
    mysqli_query($conn,"update orders set order_status='$update_payment_status' where id='$id'");
  }
  
}
     ?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
               <h4 class="box-title">Orders Details</h4>
            </div>
            <div class="card-body--">
               <div class="table-stats order-table ov-h">
                <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
               
              </tr>
              <tr>
                <th>Name</th>
                <th>Product and (Qty)</th>
                <th>Email</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Total Amount</th>
              </tr>
            </thead>
          <tbody>
            <?php
  
  {

    while($row = $result->fetch_assoc())
    {

      ?>
              
              <tr>
                <td><?php echo $row['name']?></td></a>
                <td><?php echo $row['products']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['phone']?></td>
                <td> <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['amount_paid'],2); ?></td>
              </tr>
              <?php
             }
           }
           ?>
              <tr>
              </tr>
            </tbody>
          </table>
               </div>
            </div>
          </div>
        </div>
      </div>
   </div>
</div>


  <strong>Order Status</strong> :
              <?php 
              $order_status_arr=mysqli_fetch_assoc(mysqli_query($conn,"select order_status.name from order_status,orders where orders.id='$id' and orders.order_status=order_status.id"));
              echo $order_status_arr['name'];
              ?>
              
              <div>
                <form method="post">
                  <select class="form-control" name="update_order_status" required>
                    <option value="">Select Status</option>
                    <?php
                    $res=mysqli_query($conn,"select * from order_status");
                    while($row=mysqli_fetch_assoc($res)){
                      if($row['id']==$categories_id){
                        echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                      }else{
                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                      }
                    }
                    ?>
                  </select>
                  <input type="submit" class="form-control"/>
                </form>
              </div><br>


              
        <?php 
      require('footer.php');
     ?>
  