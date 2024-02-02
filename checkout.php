<?php

	require 'config.php';
  require 'header.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];
 $uid=$_SESSION['USER_ID'];
	$sql = "SELECT CONCAT(product_name,'(',product_size,')', '(',qty,')') AS ItemQty, total_price FROM cart WHERE user_id=$uid";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>

  
  <div class="container" style="">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text- p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Products : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>

   <?php
                      $uid=$_SESSION['USER_ID'];
                      $res=mysqli_query($conn,"select * from users where id=$uid");
                      while($row=mysqli_fetch_assoc($res)){

                      ?>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="product_size" value="<?php $product_size; ?>">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
           
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" style="width:125%" value="<?php echo $row['name']?>" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" style="width:125%"value="<?php echo $row['email']?>" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone No."style="width:125%"  value="<?php echo $row['mobile']?>" required>
          </div>
          <div class="form-group">
            <input name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."style="width:125%"value="<?php echo $row['address']?>" required ></input>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control" style="width:125%">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" style="width:125%">
          </div>
        </form>
      </div>
    </div>
  </div>
 <?php } ?>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
   <?php 
require 'footer.php';
   ?>
</body>
</html>