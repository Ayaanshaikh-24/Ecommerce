<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
if (isset($_SESSION['admin_username'])) {
    $admin_name = $_SESSION['admin_username'];
    $get_admin_data = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
    $get_admin_result = mysqli_query($con, $get_admin_data);
    $row_fetch_admin_data = mysqli_fetch_array($get_admin_result);
    $admin_name = $row_fetch_admin_data['admin_name'];
    $admin_image = $row_fetch_admin_data['admin_image'];
} else {
    echo "<script>window.open('./admin_login.php','_self');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Heaven Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <style>
        /* Main Layout */
        .admin-dashboard {
            display: flex;
        }

        /* Left Panel */
        .admin-panel {
            width: 250px;
            background-color: #f8f9fa;
            /* Light background */
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            /* Small shadow for separation */
            height: 100vh;
            /* Full height of the screen */
        }

        .admin-image img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        .admin-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: center;
            align-items: center;
        }

        .buttons .btn {
            width: 100%;
            max-width: 200px;
            text-align: center;
        }

        /* Right Content Area */
        .content-area {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Toy Heaven</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentad" aria-controls="navbarSupportedContentad" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContentad">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Welcome <?php echo $admin_name; ?></a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary p-0 px-1">
                            <a href="./admin_logout.php" class="nav-link text-light">Logout</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <!-- Admin Dashboard Layout -->
    <div class="admin-dashboard">
        <!-- Left Panel (Admin Section) -->
        <div class="admin-panel">
            <div class="admin-section">
                <div class="admin-image">
                    <a href="./index.php"><img src="./admin_images/<?php echo $admin_image; ?>" class="img-thumbnail" alt="Admin Photo"></a>
                </div>
                <p><?php echo $admin_name; ?></p>
            </div>

            <!-- Control Buttons -->
            <div class="buttons">
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?insert_product" class="nav-link">Insert Products</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?view_products" class="nav-link">View Products</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?insert_category" class="nav-link">Insert Categories</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?view_categories" class="nav-link">View Categories</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?insert_brand" class="nav-link">Insert Brands</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?view_brands" class="nav-link">View Brands</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?list_orders" class="nav-link">All Orders</a>
                </button>
               
                <button class="btn btn-outline-primary m-2">
                    <a href="index.php?list_users" class="nav-link">List Users</a>
                </button>
            </div>
            <!-- End Control Buttons -->
        </div>
        <!-- End Left Panel -->

        <!-- Right Panel (Content Section) -->
        <div class="content-area">
            <?php
           
            if (isset($_GET['insert_product'])) {
                include('./insert_product.php');
            }
            if (isset($_GET['view_products'])) {
                include('./view_products.php');
            }
            if (isset($_GET['insert_category'])) {
                include('./insert_categories.php');
            }
            if (isset($_GET['view_categories'])) {
                include('./view_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('./insert_brands.php');
            }
            if (isset($_GET['view_brands'])) {
                include('./view_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('./list_orders.php');
            }
           
            if (isset($_GET['list_users'])) {
                include('./list_users.php');
            }
            ?>
        </div>
        <!-- End Right Panel -->
    </div>
    <!-- End Admin Dashboard -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break" id="footer">
    <span>Developed By Ayaan</span><br>
</div>

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>