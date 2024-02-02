<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="hj">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HJ Shoes</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
  <!-- Navbar start -->
 <nav class="navbar navbar-expand-md bg-light navbar-light" style="background: radial-gradient(#fff,#ffd6d6)">
    <!-- Brand -->
    <a class="navbar-brand" href=""><i class="fas fa-shoe-alt"></i>&nbsp;&nbsp;HJ Shoes</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href=""><i class=""></i>About us</a>
        </li>
         <li class="nav-item">
          <?php if(isset($_SESSION['USER_LOGIN'])){
            echo ' <a class="nav-link" href="logout.php"><i class=""></i>Logout</a>';
          }else{
            echo ' <a class="nav-link" href="register.php"><i class=""></i>Login</a>';
          }
          ?>
        

        </li>
       
       
      </ul>
    </div>
  </nav>

  <!-- Navbar end -->
 

 <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
          <div class="col-md-6">
            <div class="contact-form-wrap mt--60">
              <div class="col-xs-12">
                <div class="contact-title">
                  <h2 class="title__line--6">Login</h2>
                </div>
              </div>
              <div class="col-xs-12">
                <form id="login-form" method="post">
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:65%">
                    </div>
                    <span class="field_error" id="login_email_error"></span>
                  </div>
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:65%">
                    </div>
                    <span class="field_error" id="login_password_error"></span>
                  </div>
                  
                  <div class="contact-btn">
                    <button type="button" class="btn" onclick="user_login()">Login</button>
                    <a href="forgot_password.php" class="forgot_password">Forgot Password</a>
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
                  <h2 class="title__line--6">Register</h2>
                </div>
              </div>
              <div class="col-xs-12">
                <form id="register-form" method="post">
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                    </div>
                    <span class="field_error" id="name_error"></span>
                  </div>
                  <div class="single-contact-form">
                    <div class="contact-box name">
              <input type="email" name="email" id="email" placeholder="Your Email*" style="width:100%" required>

             
                    <span class="field_error" id="email_error"></span>
                    </div>
                  </div>


                  

                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                    </div>
                    <span class="field_error" id="mobile_error"></span>
                  </div>
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="text" name="address" id="address" placeholder="Your address*" style="width:100%">
                    </div>
                    <span class="field_error" id="address_error"></span>
                  </div>
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                    </div>
                    <span class="field_error" id="password_error"></span>
                  </div>
                  
                  <div class="contact-btn">
                    <button type="button" class="btn" onclick="user_register()">Register</button>
                  </div>
                </form>
                <div class="form-output register_msg">
                  <p class="form-messege field_error"></p>
                </div>
              </div>
            </div>    
        </div>
      </div>
  </section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>



  
 <script type="text/javascript">
    function user_register(){
      jQuery('.field_error').html('');
      var name=jQuery("#name").val();
      var email=jQuery("#email").val();
      var address=jQuery("#address").val();
      var mobile=jQuery("#mobile").val();
      var password=jQuery("#password").val();
      var is_error='';
      
      if(name==""){
        jQuery('#name_error').html('Please enter name*');
        is_error='yes';
      } if(email==""){
        jQuery('#email_error').html('Please enter email*');
        is_error='yes';
      }if(address==""){
        jQuery('#address_error').html('Please enter address*');
        is_error='yes';
      } if(mobile==""){
        jQuery('#mobile_error').html('Please enter mobile no*');
        is_error='yes';
      } if(password==""){
        jQuery('#password_error').html('Please enter password*');
        is_error='yes';
      }
      if(is_error==''){
      jQuery.ajax({
        url:'register_submit.php',
        type:'post',
        data:'name='+name+'&email='+email+'&address='+address+'&mobile='+mobile+'&password='+password,
        success:function(result){
          if(result=='email_present'){
            jQuery('#email_error').html('Email id already present');
          }
          if(result=='insert'){
            jQuery('.register_msg p').html('Thank you for registration');
          }
        }
      });
      
}
    }
  </script>




  <script type="text/javascript">
    function user_login(){
      jQuery('.field_error').html('');
      var email=jQuery("#login_email").val();
      var password=jQuery("#login_password").val();
      var is_error='';
      if(email==""){
        jQuery('#login_email_error').html('Please enter email*');
        is_error='yes';
      } if(password==""){
        jQuery('#login_password_error').html('Please enter password*');
        is_error='yes';
      }
      if(is_error==''){
      jQuery.ajax({
        url:'login_submit.php',
        type:'post',
        data:'email='+email+'&password='+password,
        success:function(result){
          if(result=='wrong'){
            jQuery('.login_msg p').html('please enter valid login details');
          }
          if(result=='valid'){
            window.location.href='index.php';
          }
        }
      });
      
}
    }
  </script>
<?php 
require'footer.php';
?>