<?php
include('../includes/connect.php'); // Adjust the path if necessary
include('../functions/common_function.php'); // Adjust the path if necessary
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles.css">  
  <link rel="stylesheet" href="buttons.css"> 
</head>
<style>
  body, html {
    height: 100%;
    margin: 0;
  }
  .payment-container {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .payment-box {
    max-width: 800px;
    width: 100%;
    padding: 40px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    text-align: center;
  }
  .payment-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #dc3545;
    text-decoration: underline;
    margin-bottom: 40px;
  }
  .payment-option-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 20px 40px;
    background-color: #ffc439;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    color: #000;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    width: 100%;
    text-align: center;
    transition: background-color 0.3s ease;
  }
  .payment-option-button:hover {
    background-color: #ffb600;
  }
  .credit-card-button {
    background-color: #007bff;
    color: #fff;
  }
  .cash-button {
    background-color: #28a745;
    color: #fff;
  }
  .payment-option-button img, .payment-option-button i {
    width: 30px;
    height: 30px;
  }
</style>
<body>

<?php
  // Assuming getIPAddress() function is defined in common_function.php
  $user_ip = getIPAddress();
  $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
  $result = mysqli_query($con, $get_user);
  $run_query = mysqli_fetch_array($result);
  $user_id = $run_query['user_id'];
?>

<div class="payment-container">
  <div class="payment-box">
    <h2 class="payment-title">Payment Options</h2>
    <div class="row">
      <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <!-- PayPal Payment Button -->
        <a href="order.php?user_id=<?php echo $user_id; ?>" class="payment-option-button">
          <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="PayPal Logo">
          Pay with PayPal
        </a>
        
        <!-- Credit Card Payment Button -->
        <a href="order.php?user_id=<?php echo $user_id; ?>" class="payment-option-button credit-card-button">
          <i class="fas fa-credit-card"></i>
          Pay with Credit Card
        </a>

        <!-- Cash Payment Button -->
        <a href="order.php?user_id=<?php echo $user_id; ?>" class="payment-option-button cash-button">
          <i class="fas fa-money-bill-wave"></i>
          Pay with Cash
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+gioxm0DA5Y5zYj5I1TV5XyyfivhF" crossorigin="anonymous"></script>
</body>
</html>
