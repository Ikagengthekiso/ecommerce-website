<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website </title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS files -->
    <link rel="stylesheet" href="styles.css">  
    <link rel="stylesheet" href="buttons.css">
    <style>
    .footer{
  position: relative;
  bottom: 0;
  width: 100%;
}

.nav-item:hover .nav-link {
    color: RGB(141,40,54)!important; /* Change to red when hovering over */
  }

  /* Navbar Styling */
.navbar {
    background-color: #ffffff; /* White background color */
    border-bottom: 2px solid #ffadad; /* Peach bottom border */
    font-family: 'Arial', sans-serif; /* Change font */
    padding: 10px 0; /* Add padding for better spacing */
}

.navbar .logo {
    height: 50px; /* Adjust logo size */
    margin-right: 20px; /* Space between logo and links */
}

.navbar-nav .nav-link {
    color: #2c3e50; /* Dark text color */
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s, background-color 0.3s; /* Smooth transition for hover effects */
}

.navbar-nav .nav-link:hover {
    color: #ffffff; /* White text color on hover */
    background-color: #ffadad; /* Peach background on hover */
    border-radius: 5px; /* Rounded corners */
}

.navbar-nav .nav-link.active {
    color: #ffadad; /* Peach text color for active link */
    font-weight: bold; /* Bold text for active link */
}

.navbar-toggler {
    border-color: #ffadad; /* Peach border for the toggle button */
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 173, 173, 1%29' stroke-width='2' linecap='round' linejoin='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.form-control {
    border-radius: 5px 0 0 5px; /* Rounded corners for the input */
    border: 2px solid #ffadad; /* Peach border */
}

.search-btn {
    border-radius: 0 5px 5px 0; /* Rounded corners for the button */
    border: 2px solid #ffadad; /* Peach border */
    background-color: #ffadad; /* Peach background */
    color: #ffffff; /* White text color */
}

.search-btn:hover {
    background-color: #ff7f7f; /* Darker peach background on hover */
    border-color: #ff7f7f; /* Darker peach border on hover */
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                    </li>";

                    }else{
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                    </li>";

                    }

                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="./email_form.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item($con); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:R<?php total_cart_price($con)?></a>
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
    
    <!-- calling cart --> 
    <?php
    cart($con);
    ?>

    <!-- Second child --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
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
                <a class='nav-link' href='./user_area/user_login.php'>Login</a>
            </li>";
            }else{
                echo " <li class='nav-item'>
                <a class='nav-link' href='./user_area/logout.php'>Logout</a>
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

    <!-- Fourth child -->
    <div class="row">
        <div class="col-md-10">
            <!-- Products -->
            <div class="row">
                <?php
     displayProducts($con);
     get_unique($con);
     get_uniquebrand($con);
    // $ip = getIPAddress();  
     //echo 'User Real IP Address - '.$ip; 
     
     
     
   

     ?>

            </div>
        </div>
         <!-- navbar child --> 
        <div class="col-md-2 bg-secondary p-0">
            <!-- Brands to be displayed --> 
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-danger">
                    <a href="" class="nav-link">Delivery brands</a>
                </li>
                <?php
              displayBrands($con); 
                ?>
            </ul>

            <!-- Categories to be displayed --> 
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-danger">
                    <a href="" class="nav-link">Categories</a>
                </li>
                <?php
                 displayCategories($con);
                ?>
            </ul>
        </div>
    </div>

    <!-- Last child --> 
    <?php
   footer($con);
   ?>
    </div> 


<!-- Bootstrap JS link -->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    
</script>
</body>
</html>
