<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){ // Changed to 'insert_brand'
  $brand_title = $_POST['brand_title']; // Changed to 'brand_title'

  // Using prepared statements to prevent SQL injection
  $select_query = "SELECT * FROM brands WHERE brand_title=?";
  $stmt = mysqli_prepare($con, $select_query);
  mysqli_stmt_bind_param($stmt, "s", $brand_title);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $number = mysqli_stmt_num_rows($stmt);
  
  if($number > 0){
    echo "<script>alert('This Brand is already present in the database')</script>";
  } else {
    $insert_query = "INSERT INTO brands (brand_title) VALUES (?)";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "s", $brand_title);
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
      echo "<script>alert('Brand has been inserted successfully')</script>";
    } else {
      echo "<script>alert('Failed to insert brand')</script>";
    }
  }  
}
?>







<h2 class="text-center">Insert Brands</h2>
<form action="" method ="post" class = "mb-2">
<div class="input-group w-90 mb-2">
  
    <span class="input-group-text bg-danger" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  
  <input type="text" class="form-control" name= "brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
 <input type="submit" class=" bg-danger border-0 p-2" name= "insert_brand" value="Insert Brands">

</div>


</form>