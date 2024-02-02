<?php 
require('header.php');

?>

  <!-- Navbar end -->
  
<link rel="stylesheet" type="text/css" href="style.css">
   

 <div class="container" style="background: radial-gradient(#fff,#ffd6d6)">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="8">
                  <h4 class="text-center text-info m-0">Your Orders</h4>
                </td>
              </tr>
              <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Address</th>
                <th>Payment Type</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total Amount</th>
              </tr>
            </thead>
          <tbody>
           <?php
                      $uid=$_SESSION['USER_ID'];
                      $res=mysqli_query($conn,"select orders.*,order_status.name as order_status_str from orders,order_status where orders.user_id='$uid' and order_status.id=orders.order_status");
                      while($row=mysqli_fetch_assoc($res)){
                      ?>
              
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['products']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['pmode']?></td>
                <td><?php echo $row['payment_status']?></td>
                <td><?php echo $row['order_status_str']?></td>
                <td> <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['amount_paid'],2); ?></td>
              </tr>
             <?php } ?>
              <tr>
                <td colspan="3">
                  <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
             
          
              </tr>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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


  <!--------------------footer----------->
<?php 
require'footer.php';
?>

</body>
</html>
</body>



