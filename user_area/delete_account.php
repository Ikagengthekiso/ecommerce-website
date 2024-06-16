<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .delete-btn {
      background-color: #ffcccc; /* Light red background */
      border-color: #ffcccc;
    }
    .delete-btn:hover {
      background-color: #ff6666; /* Darker red on hover */
      border-color: #ff6666;
    }
    .dont-delete-btn {
      background-color: #ccccff; /* Light blue background */
      border-color: #ccccff;
    }
    .dont-delete-btn:hover {
      background-color: #6666ff; /* Darker blue on hover */
      border-color: #6666ff;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
      <div class="form-outline mb-4 text-center">
        <input type="submit" class="btn delete-btn w-50" name="delete" value="Delete Account">
      </div>
      <div class="form-outline mb-4 text-center">
        <input type="submit" class="btn dont-delete-btn w-50" name="dont_delete" value="Don't Delete Account">
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start(); // Ensure the session is started
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
  $delete_query="DELETE FROM user_table WHERE username='$username_session'";
  $result=mysqli_query($con, $delete_query);
  if($result){
    session_destroy();
    echo "<script>alert('Account Deleted successfully');</script>";
    echo "<script>window.open('../index.php','_self');</script>";
  }
}
if(isset($_POST['dont_delete'])){
  echo "<script>window.open('profile.php','_self');</script>";
}
?>
