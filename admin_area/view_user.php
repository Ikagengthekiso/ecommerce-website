<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Users</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
      border: 1px solid #ddd;
      text-align: center;
      padding: 12px;
    }
    th {
      background-color: rgb(141, 40, 54);
      color: white;
    }
    tr:nth-child(even) {
      background-color: rgb(220, 194, 188);
    }
    tr:nth-child(odd) {
      background-color: rgb(187, 127, 125);
    }
    tr:hover {
      background-color: #ddd;
    }
    h2 {
      color: rgb(141, 40, 54);
    }
  </style>
</head>
<body>
  <h2>User Information</h2>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('../includes/connect.php');

      // Fetch user information from the database
      $query = "SELECT username, user_email, user_address, user_mobile FROM user_table";
      $result = mysqli_query($con, $query);

      // Loop through each row of user data
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['user_email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['user_address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['user_mobile']) . "</td>";
        echo "</tr>";
      }

      // Close the database connection
      mysqli_close($con);
      ?>
    </tbody>
  </table>
</body>
</html>

