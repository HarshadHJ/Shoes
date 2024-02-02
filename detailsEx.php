<?php
  include 'config.php';
  require 'header.php';

  $id="";
  if(isset($_GET["id"]))
  {
    $id = $_GET["id"];
  }


$sql_query = "SELECT * FROM product1  WHERE id = $id";
$result=$conn->query($sql_query);



?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


 <!----------categories---------->
    <div class="container py-3">
      <h2 class="text-center">Product Details</h2>

<?php
  
  {

    while($row = $result->fetch_assoc())
    {

      ?>
        <main id="main-site">

        <!--   product  -->
            <section id="product" class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= $row['product_image'] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= $row['img1'] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= $row['img2'] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= $row['img3'] ?>" class="d-block w-70" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= $row['img4'] ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
                            <div class="form-row pt-4 font-size-16 font-baloo">
                                
                                
                            </div>
                        </div>
                        <div class="col-sm-6 py-6">
                            <h5 class="font-baloo font-size-20"><?= $row['product_name'] ?></h5>
                            <small>By <?= $row['brand_name'] ?></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                  </div>
                                  <a href="#" class="px-2 font-rale font-size-14"></a>
                            </div>
                            <hr class="m-0">


                            <!---    product price       -->
                                <table class="my-6">
                                    

                                      <tr class="font-rale font-size-14">
                                        <td>MRP: <del><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['mrp'],2) ?>/- </del></td>
                                        
                                    </tr>
                                   
                                    <tr class="font-rale font-size-14">
                                        <td>Price: <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/- </td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="text-dark font-size-12 my-6"><small >&nbsp;&nbsp;Inclusive of all taxes</small></td>
                                    </tr>
                                    <?php  
                                        if($row['qty'] == 0)
                                        {
                                           echo'<h4 style="color:Red;">Out Of Stock</h4>';
                                        }
                                        else
                                        {
                                           echo'<h4 style="color:green;">In Stock</h4>';
                                        }

                                    ?>
                                </table>
                                <i class="a-icon a-icon-addon p13n-best-seller-badge">#1 Best Seller</i><br>
                                <tr>
                                    <div>
                                        Colour : <?= $row['color'] ?>
                                    </div>

      



                    <div class="form-group" ><!-- form-group Starts -->

<label for="product_size" class="col-md- control-label" >Product Size</label>

<div class="col-md-3" ><!-- col-md-7 Starts -->

<select class="form-control" name="product_size" >

<option ><?= $row['size1'] ?></option>
<option ><?= $row['size2'] ?></option>
<option ><?= $row['size3'] ?></option>
<option ><?= $row['size4'] ?></option>
</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->
                   
                   </tr>
                  </td>
                 


                           

                             <!--    #policy -->
                                <div id="policy">
                                    <div class="d-flex">
                                        <div class="return text-center mr-3">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                        </div>
                                        <div class="return text-center mr-3">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</a>
                                        </div>
                                        <div class="return text-center mr-3">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                                        </div>
                                    </div>
                                </div>
                               <form action="POST" class="form-submit">
                <div class="row p-1">
                 
                 
                </div>

                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <input type="hidden" class="size1" value="<?= $row['size1'] ?>">
                <input type="hidden" class="size2" value="<?= $row['size2'] ?>">
                <input type="hidden" class="size3" value="<?= $row['size3'] ?>">
                <input type="hidden" class="size4" value="<?= $row['size4'] ?>">
                
                
                
                
                <?php 
                   if($row['qty'] == 0)
                                        {
                                           echo '<h4 style="color:Red;">Product Avilable Soon!</h4>';
                                        }
                                        else
                                        {
                echo'<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>';
                }
                 ?>
              </form>
                                <hr>

                          

                        </div>


                        <div class="col-12">
                            <h6 class="font-rubik">Product Description</h6>
                            <hr>
                            <?= $row['product_desc'] ?>
                        </div>
                    </div>
                </div>
            </section>
        <!--   !product  -->


      <?php

    }
  }

    
      ?>
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
      var size1 = $form.find(".size1").val();
      var size2 = $form.find(".size2").val();
      var size3 = $form.find(".size3").val();
      var size4 = $form.find(".size4").val();
      
      
     
      

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode,
          size1: size1,
          size2: size2,
          size3: size3,
          size4: size4
         
          
         
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

  <link rel="stylesheet" type="text/css" href="style.css">

<?php  
require'footer.php';
?>

</body>
</html>
</body>