 <?php 
 require('top.php');
 $categories_id='';
 $product_name='';
 $brand_name='';
 $qty='';
 $mrp='';
 $product_price='';
 $product_image='';
 $img1='';
 $img2='';
 $img3='';
 $img4='';
 $size1='';
 $size2='';
 $size3='';
 $size4='';
 $product_desc='';
 $color='';
 $product_code='';
 
 $msg='';
 $product_image_required='required';
 if(isset($_GET['id']) && $_GET['id']!=''){
 $product_image_required='';
 $id=get_safe_value($conn,$_GET['id']);
 $res=mysqli_query($conn,"select * from product1 where id='$id'");
 $check=mysqli_num_rows($res);
 if($check>0){
 $row=mysqli_fetch_assoc($res);
 $categories_id=$row['categories_id'];
 $product_name=$row['product_name'];
 $brand_name=$row['brand_name'];
 $mrp=$row['mrp'];
 $product_price=$row['product_price'];
 $size1=$row['size1'];
 $size2=$row['size2'];
 $size3=$row['size3'];
 $size4=$row['size4'];
 $qty=$row['qty'];
 $color=$row['color'];
 $product_desc=$row['product_desc'];
 $product_code=$row['product_code'];

               }else{
               header('location:product.php');
               die();
               }
 }

if(isset($_POST['submit'])){
         $categories_id=get_safe_value($conn,$_POST['categories_id']);
         $product_name=get_safe_value($conn,$_POST['product_name']);
         $brand_name=get_safe_value($conn,$_POST['brand_name']);
         $mrp=get_safe_value($conn,$_POST['mrp']);
         $product_price=get_safe_value($conn,$_POST['product_price']);
         $size1=get_safe_value($conn,$_POST['size1']);
         $size2=get_safe_value($conn,$_POST['size2']);
         $size3=get_safe_value($conn,$_POST['size3']);
         $size4=get_safe_value($conn,$_POST['size4']);
         
         $qty=get_safe_value($conn,$_POST['qty']);
         $color=get_safe_value($conn,$_POST['color']);
         $product_desc=get_safe_value($conn,$_POST['product_desc']);
         $product_code=get_safe_value($conn,$_POST['product_code']);
         

$res=mysqli_query($conn,"select * from product1 where product_name='$product_name'");
         $check=mysqli_num_rows($res);
         if($check>0){
         if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

      }else{
         $msg="Product already exist";

      }
   }else{
    $msg="Product already exist";
 }
 }
 


 if($msg==''){
   if(isset($_GET['id']) && $_GET['id']!=''){
   if($_FILES['product_image']['product_name']!=''){
      $product_image=rand(111111111,99999999).'_'.$_FILES['product_image']['product_name'];
   move_uploaded_file($_FILES['product_image']['tmp_product_name'],'../media/product/'.$product_image);
   $update_sql="update product1 set categories_id='$categories_id',product_name='$product_name',brand_name='$brand_name',mrp='$mrp',product_price='$product_price',size1='$size1',size2='$size2',size3='$size3',size4='$size4',qty='$qty',color='$color',product_desc='$product_desc',product_code='$product_code',product_image='$product_image' where id='$id'";
}else{
   $update_sql="update product1 set categories_id='$categories_id',product_name='$product_name',brand_name='$brand_name',mrp='$mrp',product_price='$product_price',size1='$size1',size2='$size2',size3='$size3',size4='$size4',qty='$qty',color='$color',product_desc='$product_desc',product_code='$product_code' where id='$id'";
}
 mysqli_query($conn,$update_sql);
 }else{
   $product_image=rand(111111111,99999999).'_'.$_FILES['product_image']['product_name'];
   move_uploaded_file($_FILES['product_image']['tmp_product_name'],'../media/product/'.$product_image);

 mysqli_query($conn,"insert into product1(categories_id,product_name,brand_name,mrp,product_price,size1,size2,size3,size4,qty,color,product_desc,product_code,status,product_image) values('$categories_id','$product_name','$brand_name','$mrp','$product_price','$size1','$size2','$size3','$size4','$qty','$color','$product_desc','$product_code',1,'$product_image')");
 }
 header('location:product.php');
 die();
}
 }

 
    

     ?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/from-data">
                     <div class="card-body card-block">
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Categories</label>
                          <select class="form-control" name="categories_id">
                           <option>Select Category</option>
                           <?php
                            $res=mysqli_query($conn,"select id,categories from categories order by categories asc");
                            while($row=mysqli_fetch_assoc($res)){
                              if($row['id']==$categories_id){
                                  echo"<option selected value=".$row['id'].">".$row['categories']."</option>";

                              }else{
                                   echo"<option value=".$row['id'].">".$row['categories']."</option>";
                              }
                             
                            }
                               
                           ?>
                             
                          </select>
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Product name</label>
                           <input type="text" name="product_name" placeholder="Enter product name" class="form-control" required value="<?php echo $product_name ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Brand name</label>
                           <input type="text" name="brand_name" placeholder="Enter brand name" class="form-control" required value="<?php echo $brand_name ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">MRP</label>
                           <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Product Price</label>
                           <input type="text" name="product_price" placeholder="Enter product price" class="form-control" required value="<?php echo $product_price ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Qty</label>
                           <input type="text" name="qty" placeholder="Enter product Qty" class="form-control" required value="<?php echo $qty ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Main Image</label>
                           <input type="file" name="product_image"  class="form-control" <?php echo $product_image_required?> >
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Image 1</label>
                           <input type="file" name="product_image"  class="form-control"  >
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Image 2</label>
                           <input type="file" name="product_image"  class="form-control"  >
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Image 3</label>
                           <input type="file" name="product_image"  class="form-control"  >
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Image4</label>
                           <input type="file" name="product_image"  class="form-control"  >
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Size1</label>
                           <input type="text" name="size1" placeholder="Enter Size" class="form-control" required value="<?php echo '7 UK/India' ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Size2</label>
                           <input type="text" name="size2" placeholder="Enter Size" class="form-control" required value="<?php echo '8 UK/India' ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Size3</label>
                           <input type="text" name="size3" placeholder="Enter Size" class="form-control" required value="<?php echo '9 UK/India' ?>">
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Size4</label>
                           <input type="text" name="size4" placeholder="Enter Size" class="form-control" required value="<?php echo '10 UK/India' ?>">
                        </div>
                         <div class="form-group">
                           <label for="categories" class=" form-control-label">Product Color name</label>
                           <input type="text" name="color" placeholder="Enter product name" class="form-control" required value="<?php echo $color ?>">
                        </div>



                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Description</label>
                           <textarea name="product_desc" placeholder="Enter product description" class="form-control" required><?php echo $product_desc ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Product code</label>
                           <input type="text" name="product_code" placeholder="Enter product code" class="form-control" required value="<?php echo $product_code ?>">
                        </div>

                       

                       


                        <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                        </button>
                        <div class="field_error"><?php echo $msg?></div>
                     </div>
                  </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <?php 
      require('footer.php');
     ?>