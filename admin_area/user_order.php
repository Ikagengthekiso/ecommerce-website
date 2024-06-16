<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #dcd2bc; /* RGB(220,194,188) */
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #bbb;
        }
        th {
            background-color: #bb7f7d; /* RGB(187,127,125) */
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }
        td {
            background-color: #8d2836; /* RGB(141,40,54) */
            color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #a43642; /* Alternate color */
        }
        tr:hover td {
            background-color: #a43642; /* Hover color */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<h1>All Orders</h1>

<?php
include('../includes/connect.php'); // Adjust the path if necessary

$query = "SELECT * FROM user_orders"; // Adjust table name if necessary
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Amount Due</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Order Status</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['user_id']."</td>";
        echo "<td>".$row['amount_due']."</td>";
        echo "<td>".$row['invoice_number']."</td>";
        echo "<td>".$row['total_products']."</td>";
        echo "<td>".$row['order_date']."</td>";
        echo "<td>".$row['order_status']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>No orders found.</p>";
}

mysqli_close($con);
?>

</body>
</html>
