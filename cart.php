<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

$get_ip_add = getIPAddress();
$total_price = 0;

if(isset($_POST['update_cart'])){
    foreach($_POST['qty'] as $product_id => $quantity){
        // Validate quantity to prevent SQL injection
        $quantity = intval($quantity);
        
        // Update the quantity for the specific product
        $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address = '$get_ip_add' AND product_id = $product_id";
        $result_products_quantity = mysqli_query($con, $update_cart);
        if(!$result_products_quantity){
            // Handle any errors here
            echo "Error updating quantity for product ID $product_id";
        }
    }
}

$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result = mysqli_query($con, $cart_query);

$cart_empty = mysqli_num_rows($result) == 0; // Check if cart is empty
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">  
    <link rel="stylesheet" href="buttons.css"> 
    <style>
      .cart_img {
          width: 80px;
          height: 80px;
          object-fit: contain;
      }
      
   .footer{
  position: relative;
  bottom: 0;
  width: 100%;
}

.nav-item:hover .nav-link {
    color: RGB(141,40,54)!important; /* Change to red when hovering over */
  }
    
 
    </style>
    <script>
     "use strict";
  
  !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  }();
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('zwys8zzak8xc');

  
</script>
</head>
<body>

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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item($con); ?></sup></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php cart($con); ?>

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

    <div class="bg-light">
        <h3 class="text-center">Digi-Litho store</h3>
        <p class="text-center">We are the best stationery suppliers</p>
    </div> 

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <?php if(!$cart_empty): ?>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $quantity = $row['quantity'];
                                $subtotal = $product_price * $quantity;
                                $total_price += $subtotal;
                                $place=$product_price*$product_id
                        ?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                            <td><input type="text" class="form-input w-50" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>"></td>
                            <td><?php echo $product_price ?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                                <input type="submit" value="Update Cart" class="bg-danger px-3 border-0 mx-3 py-2 text-light" name="update_cart">
                                <input type="submit" value="Remove Cart" class="bg-danger px-3 border-0 mx-3 py-2 text-light" name="remove_cart">
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="text-center py-5">
                    <h4 class="text-danger">Cart is empty</h4>
                </div>
                <?php endif; ?>
            </form>
            <div class="d-flex mb-5">
                <h4 class="px-3">Subtotal: <strong class="text-danger"><?php echo $total_price ?> /-</strong></h4>
                <a href="index.php"><button class="bg-danger px-3 border-0 mx-3 py-2 text-light">Continue Shopping</button></a>
                <a href="./user_area/checkout.php"><button class="bg-secondary px-3 border-0 py-2 text-light">Checkout</button></a>
            </div>
        </div>
    </div>

    <!-- remove item-->
    <?php
    function remove_item($con){
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
            }
        }
    }

    remove_item($con);
    ?>

    <div class="bg-danger p-3 text-center footer">
        <p>All rights reserved @- Designed by Ikageng-2024</p> 
    </div> 
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
