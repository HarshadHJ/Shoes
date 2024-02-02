
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
                  <h2 class="title__line--6">Forgot Password</h2>
                </div>
              </div>
              <div class="col-xs-12">
                <form id="login-form" method="post">
                  <div class="single-contact-form">
                    <div class="contact-box name">
                      <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                    </div>
                    <span class="field_error" id="email_error"></span>
                  </div>
                  
                  <div class="contact-btn">
                    <button type="button" class="btn" onclick="forgot_password()" id="btn_submit">Submit</button>
                    
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>



 <-- 
 <script>
    function forgot_password(){
      jQuery('#email_error').html('');
      var email=jQuery('#email').val();
      if(email==''){
        jQuery('#email_error').html('Please enter email id');
      }else{
        jQuery('#btn_submit').html('Please wait...');
        jQuery('#btn_submit').attr('disabled',true);
        jQuery.ajax({
          url:'forgot_password_submit.php',
          type:'post',
          data:'email='+email,
          success:function(result){
            jQuery('#email').val('');
            jQuery('#email_error').html(result);
            jQuery('#btn_submit').html('Submit');
            jQuery('#btn_submit').attr('disabled',false);
          }
        })
      }
    }
    </script>




  
    
   
    <div class="footer">
      <link rel="stylesheet" type="text/css" href="style.css">
  <div class="container">
    <div class="row">
      <div class="footer-col-1">
        <h3>Download Our App</h3>
        <p>Download App for Android and ios mobile phone.</p>
      </div>
      <div class="footer-col-2">
        <img src="images/lo.png">
        <p>Our Purpose Is To Sustainable Make the Pleasure and Benefits of Our Shoes.</p>
      </div>
     <div class="footer-col-3">
        <h3>Follow us</h3>
        <ul>
          <a href="https://www.instagram.com/"class="btn1">Insatgram</a>
           <a href="https://www.instagram.com/"class="btn1">Facebook</a>
            <a href="https://www.instagram.com/"class="btn1">Twitter</a>
             <a href="https://www.instagram.com/"class="btn1">Youtube</a>
        </ul>
      </div>
      
    </div>
    <hr>
    <p class="Copyright">Copyright 2022 - HJ Shoes</p>
  </div>
</div>
  </body>
</html>


