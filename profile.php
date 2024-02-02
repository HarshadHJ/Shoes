<?php 

require 'header.php';
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='profile.php';
	</script>
	<?php
}
?>

<div class="container text-center">
<h1>Your Profile Details</h1>
</div>
<br>
<br>
<br>
<div class="container">
<section class="htc__contact__area ptb--100 bg__white">
       <div class="container">
         <div class="row">
          <div class="col-md-6">
            <div class="contact-form-wrap mt--60">
              <div class="col-xs-12">
                <div class="contact-title">
                  <h2 class="title__line--6">Change Name</h2>
                </div>
              </div>
              <div class="col-xs-12">
                <form id="login-form" method="post">
                  <div class="single-contact-form">
                    <div class="contact-box name">
                       <input type="text" name="name" id="name" placeholder="Your name*" style="width:70%" value="<?php echo $_SESSION['USER_NAME']?>">
                      </div>
                    <span class="field_error" id="name_error"></span>
                  </div>
                  <div class="contact-btn">
                    <button type="button" class="btn" onclick="update_profile()" id="btn_submit">Update</button>
                  </div>
                </form>
               <div class="form-output login_msg">
              <p class="form-messege field_error"></p>
             </div>
            </div>
          </div>    
        </div>
          <div class="col-md-6">
            <div class="contact-form-wrap mt--60">
              <div class="col-xs-12">
                <div class="contact-title">
                  <h2 class="title__line--6">Change Password</h2>
                </div>
              </div>
              <div class="col-xs-12">
                <form method="post" id="frmPassword">
                  <div class="single-contact-form">
										<label class="password_label">Current Password</label>
										<div class="contact-box name">
											<input type="password" name="current_password" id="current_password" style="width:70%">
										</div>
										<span class="field_error" id="current_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label">New Password</label>
										<div class="contact-box name">
											<input type="password" name="new_password" id="new_password" style="width:70%">
										</div>
										<span class="field_error" id="new_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label">Confirm New Password</label>
										<div class="contact-box name">
											<input type="password" name="confirm_new_password" id="confirm_new_password" style="width:70%">
										</div>
										<span class="field_error" id="confirm_new_password_error"></span>
									</div>
                  <div class="contact-btn">
                    <button type="button" class="btn" onclick="update_password()" id="btn_submit">Update</button>
                  </div>
                </form>
                <div class="form-output login_msg">
                  <p class="form-messege field_error"></p>
                </div>
              </div>
            </div>    
        </div>
      </div>
  </section>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script>
  	
		function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}

		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
  </script>

  <script type="text/javascript">
 

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
  ;
  </script>


  <!--------------------footer----------->
<?php
require('footer.php');
?>