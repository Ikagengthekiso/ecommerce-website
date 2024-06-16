<?php
include('../includes/connect.php');

// Handle category deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM categories WHERE category_id=?";
    $stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Category deleted successfully'); window.location='';</script>";
    } else {
        echo "<script>alert('Failed to delete category');</script>";
    }
}

// Handle category update
if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $category_title = $_POST['category_title'];
    $update_query = "UPDATE categories SET category_title=? WHERE category_id=?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "si", $category_title, $category_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Category updated successfully'); window.location='';</script>";
    } else {
        echo "<script>alert('Failed to update category');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">View Categories</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Category Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_query = "SELECT * FROM categories";
            $result = mysqli_query($con, $select_query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td>" . $row['category_title'] . "</td>";
                    echo "<td>
                            <button class='btn btn-primary btn-sm' onclick='editCategory({$row['category_id']}, \"{$row['category_title']}\")'>Edit</button>
                            <a href='?delete_id=" . $row['category_id'] . "' onclick='return confirm(\"Are you sure you want to delete this category?\")' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No Categories Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="" method="post">
                    <div class="mb-3">
                        <label for="edit_category_title" class="form-label">Category Title</label>
                        <input type="text" class="form-control" id="edit_category_title" name="category_title" required>
                        <input type="hidden" id="edit_category_id" name="category_id">
                    </div>
                    <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function editCategory(id, title) {
    $('#edit_category_title').val(title);
    $('#edit_category_id').val(id);
    var modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
    modal.show();
}
</script>
</body>
</html>


