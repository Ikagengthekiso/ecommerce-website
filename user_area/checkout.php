<?php
include('../includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website Checkout Page</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS files -->
    <link rel="stylesheet" href="styles.css">  
    <link rel="stylesheet" href="buttons.css"> 
    <style>
   .footer{
  position: fixed;
  bottom: 0;
  width: 100%;
}
    </style>
</head>
<body>

<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="./images/Picture1.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                   
                </ul>
                <form class="d-flex" role="search" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!--  <button class="btn btn-outline-success" type="submit">Search</button> --> 
                    <input type="submit" value="Search" class="btn btn-danger" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    
  
    <!-- Second child --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
           
            <?php
            if(!isset($_SESSION['username'])){
                echo "  <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
              }else{
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome ".$_SESSION ['username']."</a>
              </li>";
              }
            if(!isset($_SESSION['username'])){
                echo " <li class='nav-item'>
                <a class='nav-link' href='./user_login.php'>Login</a>
            </li>";
            }else{
                echo " <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
            </li>";
            }

            ?>
           
        </ul>
    </nav>

    <!-- Third child -->
    <div class="bg-light">
        <h3 class="text-center">Digi-Litho store</h3>
        <p class="text-center">We are the best stationery suppliers</p>
    </div> 
<!-- 4th  child -->
    <div class="row">
        <div class="col-md-10">
            <!-- Products -->
            <div class="row">
              <?php
            if(!isset($_SESSION['username'])){
              include('user_login.php');
            }else{
              include('payment.php');
            }
            ?>

          </div>
          <!-- col end -->
        </div>
        </div>

  

    <!-- Last child --> 
    <div class="bg-danger p-3 text-center footer">
        <p>All rights reserved @- Designed by Ikageng-2024</p> 
    </div> 

    </div> 


<!-- Bootstrap JS link -->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
