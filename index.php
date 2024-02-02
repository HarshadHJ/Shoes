<?php 
require('header.php');
require('config.php');
$cat_res=mysqli_query($conn,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
  $cat_arr[]=$row;  
}
?>
  <!-- Navbar end -->

        <div class="header">
          <div class="container">
           <div class="navbar">
            <div class="logo">
             </div>
              <link rel="stylesheet" type="text/css" href="style.css">
                </div>
                  <div class="row">
                    <div class="col-2">
         <h1 style="font-family: 'Roboto Slab', serif;">To wear dreams on one’s feet is to begin to give a reality to one’s dreams. </h1>
         <a href="Explore.php"class="btn">Explore Now &#8594;</a>
                   </div>
                 <div class="col-2">
              <img src="images/air1.png" >
           </div>
         </div>
       </div>
     </div>
<div class="container">
<div class="small-container">
      <ul class="nav justify-content-center">
          <?php 
             foreach($cat_arr as $list){
              ?>
              <li class="nav-item"><a class="nav-link" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li> 
             <?php
           }      
         ?>
     </li>
 </ul>
</div>
</div>
       
       
      
   <!----------categories---------->
    <div class="categories">
      <div class="small-container p-1" >
        <div class="row">
          <div class="col-4">
           <div class="text-center my-3">Mens</div>
            <a href="Mens.php"><img src="images/mens.jpg"></a>
        </div>
        <div class="col-4">
          <div class="text-center my-3">Womens<span style='font-size: 20px;'>&#9749;</span></div>
            <a href="womens.php"><img src="images/women.png"></a>
        </div>
        <div class="col-4">
           <div class="text-center my-3">Kids</div>
            <a href="kids.php"><img src="images/kids.jpg"></a>
        </div>
      </div>
    </div>
  </div>

  
         <div class="small-container">
          <h2 class="title" style="font-family: 'Roboto Slab', serif;">Featured Products</h2>
           <div class="row"> 
    <?php
        include 'config.php';
        $stmt = $conn->prepare("SELECT * FROM product1 where categories_id=7 && status=1");
        $stmt->execute(); 
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      <div class="col-4">
        <div class="card-deck">
          <div class="card p-2 border-">
            <a href="detailsEx.php?id=<?= $row['id'] ?>">  <img src="<?= $row['product_image'] ?>" class="card-img-top" height="200"></a>
            <div class="card-body p-2">
              <h4 class="card-title text-center text-" style="font-family: 'Roboto Slab', serif;"><?= $row['product_name'] ?></h4>
              <del><h6 class="card-text text-center text-"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['mrp'],2) ?>/-</h6></del>
              <h5 class="card-text text-center text-"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>
            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">  
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <?php 
                   if($row['qty'] == 0)
                                        {
                                           echo '<h4 style="color:Red;">Out Of Stock!</h4>';
                                        }
                                        else
                                        {
                echo'<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>';
                }
                 ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
   </div>

<?php 
require's.php';
?><br>


   
<div class="categories">
  <link rel="stylesheet" type="text/css" href="style.css">
      <div class="small-container">
        <div class="row">
         <div class="col-4">
          <img src="images/addidas.png">
         </div>
         <div class="col-4">
          <img src="images/conv.png">
         </div>
         <div class="col-4">
          <img src="images/nike.png">
         </div>
      </div>
    </div>
  </div>
  <!-- Displaying Products End -->

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
require('footer.php');
?>