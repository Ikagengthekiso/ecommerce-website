


<?php

// include

//include('../includes/connect.php');




function displayProducts($con) {
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 9";
    $select_query = "SELECT * FROM `products`";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; // corrected variable name
        ?>
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $product_title ?></h5>
                    <p class='card-text'><?php echo $product_description ?></p>
                    <p class='card-text'>Price: R<?php echo $product_price ?></p>
                    <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                    <a href='product_details.php?product_id=<?php echo $product_id ?>' class='btn btn-secondary'>View more</a>

                </div>
            </div>
        </div>
    <?php }
}
}
}

// display all products

function display_all_products($con) {
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 9";
    $select_query = "SELECT * FROM `products`";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; // corrected variable name
        ?>
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $product_title ?></h5>
                    <p class='card-text'><?php echo $product_description ?></p>
                    <p class='card-text'>Price: R<?php echo $product_price ?></p>
                    <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                    <a href='product_details.php?product_id=<?php echo $product_id ?>' class='btn btn-secondary'>View more</a>

                </div>
            </div>
        </div>
    <?php }
}
}
}

// get category
 function get_unique($con) {
  if(isset($_GET['category'])){
  $category_id=$_GET['category'];
    
 
  $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
$result_query = mysqli_query($con, $select_query);
$num_of_rows = mysqli_num_rows($result_query); 
if($num_of_rows == 0) {
  echo "<div class='text-center'><h2 class='text-danger'>No stock for this category</h2></div>";
}







    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; // corrected variable name
        ?>
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $product_title ?></h5>
                    <p class='card-text'><?php echo $product_description ?></p>
                    <p class='card-text'>Price: R<?php echo $product_price ?></p>
                    <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                    <a href='product_details.php?product_id=<?php echo $product_id ?>' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>
    <?php }
}
}


//unique brnads
function get_uniquebrand($con) {
  if(isset($_GET['brand'])){
  $brand_id=$_GET['brand'];
    
 
  $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
$result_query = mysqli_query($con, $select_query);
$num_of_rows = mysqli_num_rows($result_query); 
if($num_of_rows == 0) {
  echo "<div class='text-center'><h2 class='text-danger'>No brands available</h2></div>";

}







    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; // corrected variable name
        ?>
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $product_title ?></h5>
                    <p class='card-text'><?php echo $product_description ?></p>
                    <p class='card-text'>Price: R<?php echo $product_price ?></p>
                    <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                    <a href='product_details.php?product_id=<?php echo $product_id ?>' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>
    <?php }
}
}







//brands
function displayBrands($con) {
  $select_brands = "SELECT * FROM brands";
  $result_brands = mysqli_query($con, $select_brands);

  while ($row_brands = mysqli_fetch_assoc($result_brands)) {
      $brand_title = $row_brands['brand_title'];
      $brand_id = $row_brands['brand_id'];
      
      echo "<li class='nav-item'>
        <h4><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></h4>
      </li>";
  }
}


function displayCategories($con) {


  
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);
    

    while ($row_categories = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_categories['category_title'];
        $category_id = $row_categories['category_id'];
        echo "<li class='nav-item'>
        <h4><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></h4>
      </li>";

    }
}









// seraching products

function search_products($con) {
  
  
    
    
    if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $seach_query = "SELECT * FROM `products` where product_keywords like '%$search_data_value%'";
      $result_query = mysqli_query($con, $seach_query);


      $num_of_rows = mysqli_num_rows($result_query); 
if($num_of_rows == 0) {
    echo "<h2 class='text-center text-danger'> No results match. No products found on this category</h2>";
}


    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; // corrected variable name
        ?>
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $product_title ?></h5>
                    <p class='card-text'><?php echo $product_description ?></p>
                    <p class='card-text'>Price: R<?php echo $product_price ?></p>
                    <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                    <a href='product_details.php?product_id=<?php echo $product_id ?>' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>
    <?php }
}
}



function viewdetails($con) {
  if(isset($_GET['product_id'])) {
      if(!isset($_GET['category'])) {
          if(!isset($_GET['brand'])) {
              $product_id=$_GET['product_id'];

              $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
              $result_query = mysqli_query($con, $select_query);

              while ($row = mysqli_fetch_assoc($result_query)) {
                  $product_id = $row['product_id'];
                  $product_title = $row['product_title'];
                  $product_description = $row['product_description'];
                  $product_keywords = $row['product_keywords'];
                  $product_image1 = $row['product_image1'];
                  $product_image2 = $row['product_image2'];
                  $product_image3 = $row['product_image3'];
                  $product_price = $row['product_price'];
                  $category_id = $row['category_id'];
                  $brand_id = $row['brand_id']; // corrected variable name
                  ?>
                  <div class='col-md-4 mb-2'>
                      <div class='card'>
                          <img class='card-img-top' src='./images/<?php echo $product_image1 ?>' alt='Card image cap'>
                          <div class='card-body'>
                              <h5 class='card-title'><?php echo $product_title ?></h5>
                              <p class='card-text'><?php echo $product_description ?></p>
                              <p class='card-text'>Price: R<?php echo $product_price ?></p>
                              <a href='index.php?add_to_cart=<?php echo$product_id?>' class='btn btn-danger'>Add to cart</a>
                              <a href='index.php' class='btn btn-secondary'>Go home</a>
                          </div>
                      </div>
                  </div>
                  <div class='col-md-8'>
                      <div class='row'>
                          <div class='col-md-12'>
                              <h4 class='text-center mb-5'>Related products</h4>
                          </div>
                          <div class='col-md-6'>
                              <img class='card-img-top' src='./images/<?php echo $product_image2 ?>' alt='Card image cap'>
                          </div>
                          <div class='col-md-6'>
                              <img class='card-img-top' src='./images/<?php echo $product_image3 ?>' alt='Card image cap'>
                          </div>
                      </div>
                  </div>
              <?php }
          }
      }
  }
}



// get ip adress 

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

// cart function 

function cart($con) {
  if(isset($_GET['add_to_cart'])) {
      $get_ip_add = getIPAddress(); 
      $get_product_id = $_GET['add_to_cart'];
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query); 
      if($num_of_rows > 0) {
          echo "<script>alert('This item is already inside cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      } else {
          $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
          $result_query = mysqli_query($con, $insert_query);
          echo "<script>alert('Item added to cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      }
  }
}


// function for cart item num
function cart_item($con) {
  if(isset($_GET['add_to_cart'])) {
      $get_ip_add = getIPAddress(); 
      
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
      $result_query = mysqli_query($con, $select_query);
      $count_cart_items = mysqli_num_rows($result_query); 
      
      } else {
        $get_ip_add = getIPAddress(); 
      
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query); 
        
      }
      echo $count_cart_items;
  }

// total price function 

function total_cart_price($con){
  $get_ip_add = getIPAddress();
  $total_price=0; 
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price=array($row_product_price['product_price']);
      $product_values=array_sum($product_price);
      $total_price+=$product_values;
  }


}
echo $total_price;
}

// get user order details 

function get_user_order_details($con){
    $username = $_SESSION['username'];
    $user_email = $_SESSION['user_email'];
    $get_details = "SELECT * FROM user_table";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query["user_id"];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM user_orders WHERE user_id=$user_id AND order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count > 0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders'class='text-dark'>Order Details</a></p>";
                    }//else {
                        //echo "<h3 class='text-center text-success mt-5 mb-2'>You have 0 pending orders</h3>//
                              //<p class='text-center'><a href='../index.php' class='text-dark'>Explore</a></p>";
                    }
                }
            }
        }
    }
//}


function footer($con){
    echo '
    <div class="bg-danger p-3 text-center footer">
        <p>All rights reserved @- Designed by Ikageng-2024</p> 
    </div>';
}




?>

