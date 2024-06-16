<?php
include('../includes/connect.php');

// Handle brand deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM brands WHERE brand_id=?";
    $stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Brand deleted successfully'); window.location='viewbrand.php';</script>";
    } else {
        echo "<script>alert('Failed to delete brand');</script>";
    }
}

// Handle brand update
if (isset($_POST['update_brand'])) {
    $brand_id = $_POST['brand_id'];
    $brand_title = $_POST['brand_title'];
    $update_query = "UPDATE brands SET brand_title=? WHERE brand_id=?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "si", $brand_title, $brand_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Brand updated successfully');</script>";
    } else {
        echo "<script>alert('Failed to update brand');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">View Brands</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Brand Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_query = "SELECT * FROM brands";
            $result = mysqli_query($con, $select_query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['brand_id'] . "</td>";
                    echo "<td>" . $row['brand_title'] . "</td>";
                    echo "<td>
                            <button class='btn btn-primary btn-sm' onclick='editBrand({$row['brand_id']}, \"{$row['brand_title']}\")'>Edit</button>
                            <a href='?delete_id=" . $row['brand_id'] . "' onclick='return confirm(\"Are you sure you want to delete this brand?\")' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No Brands Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Edit Brand Modal -->
<div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBrandForm" action="" method="post">
                    <div class="mb-3">
                        <label for="edit_brand_title" class="form-label">Brand Title</label>
                        <input type="text" class="form-control" id="edit_brand_title" name="brand_title" required>
                        <input type="hidden" id="edit_brand_id" name="brand_id">
                    </div>
                    <button type="submit" name="update_brand" class="btn btn-primary">Update Brand</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function editBrand(id, title) {
    $('#edit_brand_title').val(title);
    $('#edit_brand_id').val(id);
    var modal = new bootstrap.Modal(document.getElementById('editBrandModal'));
    modal.show();
}
</script>
</body>
</html>
