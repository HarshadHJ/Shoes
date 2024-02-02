 <?php 
      require('top.php');
      if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($conn,$_GET['type']);
   if($type=='delete'){
      $id=get_safe_value($conn,$_GET['id']);
      $delete_sql="delete from customer where id='$id'";
      mysqli_query($conn,$delete_sql);
   }
}
      $sql="select * from users order by id desc";
      $res=mysqli_query($conn,$sql);
     ?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
               <h4 class="box-title">Orders</h4>
            </div>
            <div class="card-body--">
               <div class="table-stats order-table ov-h">
                 <table id="order_data" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
               
              </tr>
              <tr>
                <th>Order ID</th>
                <th>Product and (Qty)</th>
                <th>Payment Type</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Total Amount</th>
              </tr>
            </thead>
          <tbody>
            <?php
                                $res=mysqli_query($conn,"select orders.*,order_status.name as order_status_str from orders,order_status where order_status.id=orders.order_status");
                                while($row=mysqli_fetch_assoc($res)){
                                ?>
              
              <tr>
                <td><a href="order_master_deatils.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></td></a>
                <td><?php echo $row['products']?></td>
                <td><?php echo $row['pmode']?></td>
                <td><?php echo $row['order_status_str']?></td>
                <td> <?php if($row['order_status_str'] = 5)
                                        {
                                        echo  $row['payment_status'];
                                        }
                                        else
                                        {
                                        echo 'Pending';
                                        }
                    ?></td>
                
                <td> <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['amount_paid'],2); ?></td>
              </tr>
             <?php } ?>
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



        <?php 
      require('footer.php');
     ?>