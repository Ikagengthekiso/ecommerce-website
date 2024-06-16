<?php
include('../includes/connect.php');

session_start();
if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];

  $select_data = "SELECT * FROM user_orders WHERE order_id=$order_id";
  $result = mysqli_query($con, $select_data);
  if ($result) {
      $row_fetch = mysqli_fetch_assoc($result);
      $invoice_number = $row_fetch['invoice_number'];
      $amount_due = $row_fetch['amount_due'];
  }
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $order_id = $_POST['order_id']; // Assuming order_id is passed in POST

    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount) VALUES ('$order_id', '$invoice_number', '$amount')";
    $result = mysqli_query($con, $insert_query);

    if ($result) {
        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";

        $update_orders = "UPDATE user_orders SET order_status='Complete' WHERE order_id='$order_id'";
        $result_orders = mysqli_query($con, $update_orders);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm Payment</title>
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS files -->
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="buttons.css">
  <!-- Include PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=AWtZ0bzwLQi21RFORCmyPkBlQb0WneDPQV9n54J4AHuvcHHQULz6IYZy0DKLmtJSbQ7QHcu6eRpaGV7D"></script>
</head>
<body class="bg-secondary">
  <h1 class="text-center text-light">Confirm Payment</h1>
  <div class="container my-5">
    <form id="payment-form" action="" method="post">
      <div class="form-outline my-4 text-center w-50 m-auto">
        <label class="text-light" for="invoice_number">Invoice number</label>
        <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
      </div>

      <div class="form-outline my-4 text-center w-50 m-auto">
        <label class="text-light" for="amount">Amount</label>
        <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" readonly>
      </div>

      <div class="form-outline my-4 text-center w-50 m-auto">
        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
      </div>

      <div class="form-outline my-4 text-center w-50 m-auto">
        <div id="paypal-button-container"></div>
      </div>

      <div class="form-outline my-4 text-center w-50 m-auto">
        <input type="submit" class="bg-danger py-2 px-3 border-0" value="Confirm" name="confirm_payment">
      </div>
    </form>
  </div>

  <script>
    // Render PayPal button
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              
              value: '<?php echo $amount_due ?>' // Dynamic amount from PHP variable
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          // Redirect or do any post-processing here
          window.location.href = "payment_success.php"; // Redirect to success page
        });
      }
    }).render('#paypal-button-container');
  </script>





</body>
</html>



