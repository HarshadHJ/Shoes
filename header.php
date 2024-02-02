<?php 
session_start();
require('config.php');
require('functions.inc.php');
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
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
 
</head>

<body>
   <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
  <!-- Navbar start -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: radial-gradient(#fff,#ffd6d6)">
  <a class="navbar-brand" href="index.php">HJ Shoes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link active" href="index.php"><i class=""></i>About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class=""></i>Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>

         <ul class="nav-item">
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: radial-gradient(#fff,#ffd6d6)">
                            <a class="dropdown-item text-center" href="my_order.php">My Orders</a>
                            <a class="dropdown-item text-center" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                           <?php if(isset($_SESSION['USER_LOGIN'])){
            echo ' <a class="nav-link text-center" href="logout.php"><i class=""></i>Logout</a>';
          }else{
            echo ' <a class="nav-link text-center" href="register.php"><i class=""></i>Login</a>';
          }
          ?>

                          </div>
                          </li>
                        </ul>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>

        
      </ul>
    <form action="search.php" method="get" class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name=str aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>






<!-- <nav class="navbar navbar-expand-md bg-light navbar-light" style="background: radial-gradient(#fff,#ffd6d6)">
    
    <a class="navbar-brand" href="index.php"><i class="fas fa-shoe-alt"></i>&nbsp;&nbsp;HJ Shoes</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link active" href="index.php"><i class=""></i>About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class=""></i>Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>

         <ul class="nav-item">
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: radial-gradient(#fff,#ffd6d6)">
                            <a class="dropdown-item text-center" href="my_order.php">My Orders</a>
                            <a class="dropdown-item text-center" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                           <?php if(isset($_SESSION['USER_LOGIN'])){
            echo ' <a class="nav-link text-center" href="logout.php"><i class=""></i>Logout</a>';
          }else{
            echo ' <a class="nav-link text-center" href="register.php"><i class=""></i>Login</a>';
          }
          ?>

                          </div>
                          </li>
                        </ul>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>

        
      </ul>
    </div>
  </nav> -->