


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content = "IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  CSS-->
    <link rel="stylesheet" href="../styles.css">
    <!--  Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
  .admin_image{
  max-width: 100px;
  max-height: 100px;
  object-fit: contain;
}
.footer{
  position: absolute;
  bottom: 0;
  


}
    </style>
    

</head>
<body>
 <div class="container-fluid p-0">
   <!-- first child-->
  <nav class="navbar navbar-expand-lg bg-danger" >
    <div class="container-fluid ">
      <img src="../images/Picture1.png" alt="" class="logo">
      <nav class="navbar navbar-expand-lg ">
        <ul class="navbar-nav">
          <li class = "nav-item">
            <a href="" class="nav-link">Welcome Guest</a>
          </li>
        </ul>

      </nav>
    </div>
  </nav>
   <!-- second child-->
   <div class="bg-light">
    <h3 class="text-center p-2 ">Manage Details</h3>
   </div>
    <!-- third child-->
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5">
          <a href="#"><img src="../images/Yellow and White Minimalist Big Sale Banner (718 x 384 px).gif" alt="" class="admin_image"></a>
          <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center p-5 ">
          <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-danger my-1">Insert products</a></button><button><a href="./view_products.php" class="nav-link text-light bg-danger my-1">View products</a></button><button><a href="index.php?insert_category" class="nav-link text-light bg-danger my-1">Insert Categories</a></button><button><a href="index.php?viewcategories" class="nav-link text-light bg-danger my-1">View Categories</a></button><button><a href="index.php?insert_brand" class="nav-link text-light bg-danger my-1">Insert Brands</a></button><button><a href="index.php?viewbrand" class="nav-link text-light bg-danger my-1">View Brands</a></button><button><a href="index.php?user_order" class="nav-link text-light bg-danger my-1">All orders</a></button><button><a href="index.php?website_traffic" class="nav-link text-light bg-danger my-1">List Payments</a></button><button><a href="index.php?view_user" class="nav-link text-light bg-danger my-1">List Users</a></button><button><a href="../index.php" class="nav-link text-light bg-danger my-1">Logout</a></button>
        </div>
      </div>
    </div>

     <!--4th child--> 
   <div class="container my-3">
    <?php
    if(isset($_GET['insert_category'])){
      include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
      include('insert_brands.php');
    }

    if(isset($_GET['viewbrand'])){
      include('viewbrand.php');
    }

    if(isset($_GET['viewcategories'])){
      include('viewcategories.php');
    }

    if(isset($_GET['view_user'])){
      include('view_user.php');
    }

    

    if(isset($_GET['user_order'])){
      include('user_order.php');
    }

    if(isset($_GET['website_traffic'])){
      include('website_traffic.php');
    }


    


  



    
    ?>
   </div>


    <!--last chiled --> 


    </div> 
 </div>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>