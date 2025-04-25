<?php
// fetch all data when edit option is clicked
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    // Prepare a statement to avoid SQL injection
    $get_data_query = "SELECT * FROM `categories` WHERE category_id = ?";
    $stmt = $con->prepare($get_data_query);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $get_data_result = $stmt->get_result();
    
    if ($get_data_result->num_rows > 0) {
        $row_fetch_data = $get_data_result->fetch_assoc();
        $category_id = $row_fetch_data['category_id'];
        $category_title = $row_fetch_data['category_title'];
    } else {
        echo "<script>window.alert('Category not found');</script>";
    }
}

// edit category logic
if (isset($_POST['update_category'])) {
    $category_title = $_POST['category_title'];
    $edit_id = $_POST['category_id'];  // Get the edit_id from hidden input field
    
    // check for empty fields
    if (empty($category_title)) {
        echo "<script>window.alert('Please fill the field');</script>";
    } else {
        // Prepare a statement to avoid SQL injection
        $update_category_query = "UPDATE `categories` SET category_title = ? WHERE category_id = ?";
        $stmt = $con->prepare($update_category_query);
        $stmt->bind_param("si", $category_title, $edit_id);
        $update_category_result = $stmt->execute();
        
        if ($update_category_result) {
            echo "<script>window.alert('Category updated successfully');</script>";
            echo "<script>window.open('./index.php?view_categories', '_self');</script>";
        } else {
            echo "<script>window.alert('Failed to update category');</script>";
        }
    }
}

// delete category logic
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    
    // Prepare a statement to avoid SQL injection
    $delete_category_query = "DELETE FROM `categories` WHERE category_id = ?";
    $stmt = $con->prepare($delete_category_query);
    $stmt->bind_param("i", $delete_id);
    $delete_category_result = $stmt->execute();
    
    if ($delete_category_result) {
        echo "<script>window.alert('Category deleted successfully');</script>";
        echo "<script>window.open('./index.php?view_categories', '_self');</script>";
    } else {
        echo "<script>window.alert('Failed to delete category');</script>";
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Edit Category</h1>
            <?php if (isset($category_id)) : ?>
            <form action="?edit_category=<?php echo $category_id; ?>" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3 mb-3">
                <div class="form-outline">
                    <label for="category_title" class="form-label">Category Title</label>
                    <input type="text" name="category_title" id="category_title" class="form-control" required value="<?php echo $category_title; ?>">
                </div>
                <!-- Hidden input to pass the edit_id -->
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                <div class="form-outline text-center">
                    <input type="submit" value="Update Category" class="btn btn-primary" name="update_category">
                </div>
            </form>
            <div class="text-center">
                <a href="?delete_category=<?php echo $category_id; ?>" class="btn btn-danger">Delete Category</a>
            </div>
            <?php else: ?>
                <p class="text-center">No category selected for editing.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
