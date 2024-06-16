<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>


<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user registration</title>
      <!-- css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS files -->
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
  <div class="container-fluid my-3">
    <h2 class="text-center text-danger">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
          <label for="user_username" class="form-label">Username</label>
          <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
        </div>
         <!-- email -->
        <div class="form-outline mb-4">
          <label for="user_email" class="form-label">Email</label>
          <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
        </div>
          <!-- image -->
          <div class="form-outline mb-4">
          <label for="user_image" class="form-label">User Image</label>
          <input type="file" id="user_image" class="form-control"  required="required" name="user_image"/>
        </div>
           <!-- password -->
           <div class="form-outline mb-4">
          <label for="user_password" class="form-label">Password</label>
          <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
        </div>
         <!--confirm password -->
         <div class="form-outline mb-4">
          <label for="conf_user_password" class="form-label">Confirm Password</label>
          <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password"/>
        </div>
        <!-- password -->
        <div class="form-outline mb-4">
          <label for="user_address" class="form-label">Address</label>
          <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
        </div>
        <div class="form-outline mb-4">
          <label for="user_contact" class="form-label">Contact</label>
          <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact"/>
        </div>
        <div class="">
          <input type="submit" value="register" class="bg-danger py-2 px-3 text-light border-0 " name="user_register">
          <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-info" >Login</a></p>
        </div>
      </form>
    </div>
  </div>
  </div>
  
</body>
</html>


<?php
if(isset($_POST['user_register'])){
  include 'connect.php'; // Include the file containing the database connection

  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];
  $conf_user_password = $_POST['conf_user_password'];
  $user_email = $_POST['user_email'];
  $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_tmp = $_FILES['user_image']['tmp_name']; // Corrected variable name
  $user_ip= getIPAddress();
  // Define getIPAddress() function or use another method to retrieve IP address

  // Select query to check if username or email already exists
  $select_query = "SELECT * FROM user_table WHERE username ='$user_username' OR user_email='$user_email'";
  $result = mysqli_query($con, $select_query);
  $row_count = mysqli_num_rows($result);

  // Check if username or email already exists
  if($row_count > 0){
    echo "<script>alert('Username or Email already exists')</script>";
  } elseif($user_password != $conf_user_password){
    echo "<script>alert('Passwords don\'t match')</script>";
  } else {
    // Insert new user if username and email are unique and passwords match
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

    $sql_execute = mysqli_query($con, $insert_query);
   
  }
  $select_cart_items="Select*from `cart_details` where ip_address='$user_ip'";
  $result_cart = mysqli_query($con, $select_cart_items);
  $row_count = mysqli_num_rows($result_cart);
  if($row_count>0){
    $_SESSION['username']=$user_username;
   echo "<script>alert('You have items in cart')</script>";
   echo "<script>window.open('checkout.php ','_self')</script>";

  }else{
    echo "<script>window.open('../index.php ','_self')</script>";

  }
}
?>

