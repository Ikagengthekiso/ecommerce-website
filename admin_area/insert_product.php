<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
  
  $product_title=$_POST['product_title'];
  $description=$_POST['description'];
  $product_keywords=$_POST['product_keywords'];
  $product_category=$_POST['product_category'];
  $product_brands=$_POST['product_brand'];
  $product_price=$_POST['product_price'];
  $product_status='true';
  
  // images
  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];
  

  // image temp name

  $temp_image1=$_FILES['product_image1']['tmp_name'];
  $temp_image2=$_FILES['product_image2']['tmp_name'];
  $temp_image3=$_FILES['product_image3']['tmp_name'];

  // checking empty

  if($product_title== '' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1==''  or $product_image2==''   or $product_image3=='' ){
    echo "<script>alert('Please fill all the available fileds')</script>";
    exit();
    
  }else{
    move_uploaded_file($temp_image1,"../images/$product_image1");
    move_uploaded_file($temp_image2,"../images/$product_image2");
    move_uploaded_file($temp_image3,"../images/$product_image3");

    //insert query 
    $insert_products="INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

    $result_query= mysqli_query($con,$insert_products);
    if($result_query){
      echo "<script>alert('sucessfully insrted products')</script>"; 
    }
 


  }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible"content = "IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap CSS-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  CSS-->
    <link rel="stylesheet" href="../styles.css">
    <!--  Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Insert Product</title>
</head>
<body class="bg-light">
  <div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>
     <!--  Form-->
     <form action="" method="post" enctype="multipart/form-data">
      <!--  title-->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title"  class="form-label">Product title</label>
        <input type="text" name="product_title"  id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
      </div>
      <!--  description-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="description"  class="form-label">Description</label>
        <input type="text" name="description"  id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
      </div>
      <!--  key words-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keywords"  class="form-label">Keywords</label>
        <input type="text" name="product_keywords"  id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
      </div>

      <!-- categories-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_category" class="form-label">Category</label>
        <select name="product_category" id="product_category" class="form-select">
          <option value="">Select a Category</option>

          <?php
          $select_query = "SELECT * FROM categories";
          $result_query = mysqli_query($con, $select_query);
          while ($row = mysqli_fetch_array($result_query)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
          }
          ?>
        </select>
      </div>
         <!-- brands-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_brand" class="form-label">Brand</label>
        <select name="product_brand" id="product_brand" class="form-select">
          <option value="">Select a Brand</option>


          <?php
          $select_query = "SELECT * FROM brands";
          $result_query = mysqli_query($con, $select_query);
          while ($row = mysqli_fetch_array($result_query)) {
            $brand_title = $row['brand_title'];
            $brand_id = $row['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
          }
          ?>
         
        </select>
      </div>

        <!--  image 1-->
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_image1" class="form-label">Product image 1</label>
          <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
       <!--  image 2-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label">Product image 2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
      </div>

        <!--  image 3-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-label">Product image 3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
      </div>

       <!--  price-->

      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label">Price</label>
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
      </div>

       <!--  submit button-->

      <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn btn-danger mb-3 px-3" value="Insert Product">
      </div>
      
     </form>
  </div>
</body>
</html>
