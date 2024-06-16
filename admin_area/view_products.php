
<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Manage Products</title>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Manage Products</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_products = "SELECT * FROM `products`";
                $result_products = mysqli_query($con, $select_products);
                while ($row = mysqli_fetch_array($result_products)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $description = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $product_price = $row['product_price'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];

                    $category_query = "SELECT category_title FROM categories WHERE category_id='$category_id'";
                    $category_result = mysqli_query($con, $category_query);
                    $category_row = mysqli_fetch_array($category_result);
                    $category_title = $category_row['category_title'];

                    $brand_query = "SELECT brand_title FROM brands WHERE brand_id='$brand_id'";
                    $brand_result = mysqli_query($con, $brand_query);
                    $brand_row = mysqli_fetch_array($brand_result);
                    $brand_title = $brand_row['brand_title'];

                    echo "
                    <tr>
                        <td>$product_id</td>
                        <td>$product_title</td>
                        <td>$description</td>
                        <td>$category_title</td>
                        <td>$brand_title</td>
                        <td>$product_price</td>
                        <td><img src='../images/$product_image1' alt='$product_title' width='50' height='50'></td>
                        <td><img src='../images/$product_image2' alt='$product_title' width='50' height='50'></td>
                        <td><img src='../images/$product_image3' alt='$product_title' width='50' height='50'></td>
                        <td><a href='?edit_product=$product_id' class='btn btn-warning'>Edit</a></td>
                        <td><a href='?delete_product=$product_id' class='btn btn-danger'>Delete</a></td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_GET['edit_product'])) {
            $product_id = $_GET['edit_product'];

            $edit_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
            $edit_result = mysqli_query($con, $edit_query);
            $edit_row = mysqli_fetch_array($edit_result);

            $product_title = $edit_row['product_title'];
            $description = $edit_row['product_description'];
            $product_keywords = $edit_row['product_keywords'];
            $category_id = $edit_row['category_id'];
            $brand_id = $edit_row['brand_id'];
            $product_price = $edit_row['product_price'];
            $product_image1 = $edit_row['product_image1'];
            $product_image2 = $edit_row['product_image2'];
            $product_image3 = $edit_row['product_image3'];
        ?>

        <h2 class="text-center mt-5">Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required value="<?php echo $product_title; ?>">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required value="<?php echo $description; ?>">
            </div>
            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required value="<?php echo $product_keywords; ?>">
            </div>
            <!-- Category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label">Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_array($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        $selected = $category_id == $edit_row['category_id'] ? 'selected' : '';
                        echo "<option value='$category_id' $selected>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Brand -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Brand</label>
                <select name="product_brand" id="product_brand" class="form-select">
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_array($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        $selected = $brand_id == $edit_row['brand_id'] ? 'selected' : '';
                        echo "<option value='$brand_id' $selected>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control">
                <img src="../images/<?php echo $product_image1; ?>" alt="<?php echo $product_title; ?>" width="50" height="50">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control">
                <img src="../images/<?php echo $product_image2; ?>" alt="<?php echo $product_title; ?>" width="50" height="50">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control">
                <img src="../images/<?php echo $product_image3; ?>" alt="<?php echo $product_title; ?>" width="50" height="50">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required value="<?php echo $product_price; ?>">
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="update_product" class="btn btn-success mb-3 px-3" value="Update Product">
            </div>
        </form>

        <?php
        }
        if (isset($_POST['update_product'])) {
            $product_id = $_POST['product_id'];
            $product_title = $_POST['product_title'];
            $description = $_POST['description'];
            $product_keywords = $_POST['product_keywords'];
            $category_id = $_POST['product_category'];
            $brand_id = $_POST['product_brand'];
            $product_price = $_POST['product_price'];

            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];

            $temp_image1 = $_FILES['product_image1']['tmp_name'];
            $temp_image2 = $_FILES['product_image2']['tmp_name'];
            $temp_image3 = $_FILES['product_image3']['tmp_name'];

            if ($product_image1 != "") {
                move_uploaded_file($temp_image1, "../images/$product_image1");
                $update_image1_query = ", product_image1='$product_image1'";
            } else {
                $update_image1_query = "";
            }

            if ($product_image2 != "") {
                move_uploaded_file($temp_image2, "../images/$product_image2");
                $update_image2_query = ", product_image2='$product_image2'";
            } else {
                $update_image2_query = "";
            }

            if ($product_image3 != "") {
                move_uploaded_file($temp_image3, "../images/$product_image3");
                $update_image3_query = ", product_image3='$product_image3'";
            } else {
                $update_image3_query = "";
            }

            $update_product_query = "UPDATE `products` SET product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id='$category_id', brand_id='$brand_id', product_price='$product_price', date=NOW() $update_image1_query $update_image2_query $update_image3_query WHERE product_id='$product_id'";
            $result_update = mysqli_query($con, $update_product_query);

            if ($result_update) {
                echo "<script>alert('Product updated successfully'); window.location.href='';</script>";
            }
        }

        if (isset($_GET['delete_product'])) {
            $product_id = $_GET['delete_product'];

            $delete_query = "DELETE FROM `products` WHERE product_id='$product_id'";
            $result_delete = mysqli_query($con, $delete_query);

            if ($result_delete) {
                echo "<script>alert('Product deleted successfully'); window.location.href='';</script>";
            }
        }
        ?>
    </div>
</body>
</html>
