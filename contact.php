<?php
    require 'config.php';
    require 'header.php';
?>
<br>
  <div class="container" style="">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        
        <div class="jumbotron p-3 mb-2 text-center">
          
          <h5><b>Submit your query</b></h5>
        </div>

        <form action="" method="post" id="submit">
          
           <?php
                      $uid=$_SESSION['USER_ID'];
                      $res=mysqli_query($conn,"select * from users where id=$uid");
                      while($row=mysqli_fetch_assoc($res)){
                      ?>
          <div class="form-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $row['name']?>" style="width:125%">
          </div>
          <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?php echo $row['email']?>" style="width:125%">
          </div>
          <div class="form-group">
            <input type="tel" id="mobile" name="phone" class="form-control" placeholder="Enter Phone No." value="<?php echo $row['mobile']?>" style="width:125%" >
          </div>
          <div class="form-group">
            <textarea name="address" id="message" class="form-control" rows="3" cols="10" placeholder="Comment" style="width:125%"></textarea>
          </div>
          
          <div class="form-group">
            <input type="button" onclick="send_message()" name="submit" value="Submit" class="btn"  style="width:125%">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php } ?>
  

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script type="text/javascript">
    function send_message(){
      var name=jQuery("#name").val();
      var email=jQuery("#email").val();
      var mobile=jQuery("#mobile").val();
      var message=jQuery("#message").val();
      
      if(name==""){
        alert('Please enter name');
      }else if(email==""){
        alert('Please enter email');
      }else if(mobile==""){
        alert('Please enter mobile');
      }else if(message==""){
        alert('Please enter message');
      }else{
      jQuery.ajax({
        url:'send_message.php',
        type:'post',
        data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
        success:function(result){
          alert(result);
        }
      });
      }

    }
  </script>

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
require('footer.php');

  ?>
   
</body>
</html>