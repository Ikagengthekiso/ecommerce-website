<?php
include('../includes/connect.php');

if(isset($_POST['insert_cart'])){
  $category_title = $_POST['cat_title'];

  // Using prepared statements to prevent SQL injection
  $select_query = "SELECT * FROM categories WHERE category_title=?";
  $stmt = mysqli_prepare($con, $select_query);
  mysqli_stmt_bind_param($stmt, "s", $category_title);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $number = mysqli_stmt_num_rows($stmt);
  
  if($number > 0){
    echo "<script>alert('This Category is already present in the database')</script>";
  } else {
    $insert_query = "INSERT INTO categories (category_title) VALUES (?)";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "s", $category_title);
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
      echo "<script>alert('Category has been inserted successfully')</script>";
    } else {
      echo "<script>alert('Failed to insert category')</script>";
    }
  }  
}
?>


<h2 class="text-center">Insert Categories</h2>
<form action="" method ="post" class = "mb-2">
<div class="input-group w-90 mb-2">
  
    <span class="input-group-text bg-danger" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  
  <input type="text" class="form-control" name= "cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">

<input type ="submit" class="bg-danger border-0  p-2" name="insert_cart" value="Insert Categories">
  
 
 
</div>


</form>