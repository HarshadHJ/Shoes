 <?php 
      require('top.php');
      if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($conn,$_GET['type']);
   if($type=='status'){
      $operation=get_safe_value($conn,$_GET['operation']);
      $id=get_safe_value($conn,$_GET['id']);
      if($operation=='active'){
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update product1 set status='$status' where id='$id'";
      mysqli_query($conn,$update_status_sql);
   }
   
   if($type=='delete'){
      $id=get_safe_value($conn,$_GET['id']);
      $delete_sql="delete from product1 where id='$id'";
      mysqli_query($conn,$delete_sql);
   }
}
      $sql="select product1.*,categories.categories from product1,categories where product1.categories_id=categories.id order by product1.id desc";
      $res=mysqli_query($conn,$sql);
     ?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
               <h4 class="box-title">Products</h4>
               <h4 class="box-link"><a href="manage_product.php">Add Products</a> </h4>
            </div>
            <div class="card-body--">
               <div class="table-stats order-table ov-h">
                 <table class="table ">
                   <thead>
                     <tr>
                        <th class="serial">#</th>
                        <th>ID</th>
                        <th>Categories</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Image1</th>
                        <th>Image2</th>
                        <th>Image3</th>
                        <th>Image4</th>
                        <th>MRP</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>status</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
                     $i=1;
                      while ($row=mysqli_fetch_assoc($res)){?> 
                        
                     
                     <tr>
                        <td class="serial"><?php echo $i?></td>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['categories']?></td>
                        <td><?php echo $row['product_name']?></td>
                        <td><?php echo $row['brand_name']?></td>
                        <td><img src="images/<?php echo $row['product_image']?>"/></td>
                        <td><img src="images/<?php echo $row['img1']?>"/></td>
                        <td><img src="images/<?php echo $row['img2']?>"/></td>
                        <td><img src="images/<?php echo $row['img3']?>"/></td>
                        <td><img src="images/<?php echo $row['img4']?>"/></td>
                        <td><?php echo $row['mrp']?></td>
                        <td><?php echo $row['product_price']?></td>
                        <td><?php echo $row['qty']?></td>
                        <td>
                           <?php
                        if($row['status']==1){
                           echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                        }else{
                           echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                        }
                        echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                        
                        echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                        
                        ?>
                              
                           </td>
                     </tr>
                     <?php }?>
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