<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
  
</head>
<body>
  <?php
  $username=$_SESSION['username'];
  $get_user="Select*from user_table where username='$username'";
  $result=mysqli_query($con,$get_user);
  $row_fetch=mysqli_fetch_assoc($result);
  $user_id=$row_fetch["user_id"];
  //echo $user_id;


  ?>


<h3 class="text-success">All my orders</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-danger">
    <tr>
      <th  class="bg-danger">SI no</th>
      <th  class="bg-danger">Amount Due</th>
      <th  class="bg-danger">Total products</th>
      <th  class="bg-danger">Invoice number</th>
      <th  class="bg-danger">Date</th>
      <th  class="bg-danger">Complete/Incomplete</th>
      <th  class="bg-danger">Status</th>
    </tr>
  </thead>
  <tbody class="bg-danger">
<?php
$get_order_details = "SELECT * FROM user_orders WHERE user_id = $user_id";
$result_orders = mysqli_query($con, $get_order_details);
$number = 1;
while ($row_orders = mysqli_fetch_assoc($result_orders)) {
    $order_id = $row_orders['order_id'];
    $total_products = $row_orders['total_products'];
    $amount_due = $row_orders['amount_due'];
    $invoice_number = $row_orders['invoice_number'];
    $order_status = $row_orders['order_status'];
    
    if ($order_status == 'pending') {
        $order_status = 'Incomplete';
    } else {
        $order_status = 'Complete';
    }
    
    $order_date = $row_orders['order_date'];
    
    echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
    
    if ($order_status == 'Complete') {
        echo "<td>Paid</td>";
    } else {
        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-success'>Confirm</a></td>";
    }
    
    echo "</tr>";
    $number++;
}
?>
  
</tbody>
</table>
</body>
</html>