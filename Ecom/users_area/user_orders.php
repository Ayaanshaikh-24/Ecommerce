<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders Page</title>
</head>

<body>
    <?php
        // Start session only if not already active
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Ensure session is set
        if (!isset($_SESSION['username'])) {
            echo "<p>User is not logged in. Please log in to view your orders.</p>";
            exit;
        }

        // Database connection
        $con = mysqli_connect('localhost', 'root', '', 'ecommerce_1');

        // Check if the connection is successful
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Access user id from session
        $username = $_SESSION['username'];
        $get_user_query = "SELECT * FROM `user_table` WHERE username='$username'";
        $get_user_result = mysqli_query($con, $get_user_query);

        // Ensure the user exists
        if (!$get_user_result || mysqli_num_rows($get_user_result) == 0) {
            echo "<p>User not found.</p>";
            exit;
        }

        $row_user_data = mysqli_fetch_array($get_user_result);
        $user_id = $row_user_data['user_id'];

        // Debugging: Check if the user ID is being fetched correctly
        echo "<p>Fetched User ID: $user_id</p>";
    ?>

    <div class="container">
        <h3 class="text-center text-success mb-5">
            All my orders
        </h3>

        <table class="table table-bordered table-hover table-striped table-group-divider text-center">
            <thead>
                <tr>
                    <th>Serial NO.</th>
                    <th>Order Number</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Confirm</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch order details
                    $get_order_details_query = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
                    $get_order_details_result = mysqli_query($con, $get_order_details_query);

                    // Debugging: Check if any orders are found
                    if (!$get_order_details_result) {
                        echo "<p>Error fetching orders: " . mysqli_error($con) . "</p>";
                    } elseif (mysqli_num_rows($get_order_details_result) == 0) {
                        echo "<tr><td colspan='8'>No orders found.</td></tr>";
                    } else {
                        $serial_number = 1;
                        while ($row_fetch_order_details = mysqli_fetch_array($get_order_details_result)) {
                            $order_id = $row_fetch_order_details['order_id'];
                            $amount_due = $row_fetch_order_details['amount_due'];
                            $invoice_number = $row_fetch_order_details['invoice_number'];
                            $total_products = $row_fetch_order_details['total_products'];
                            $order_date = $row_fetch_order_details['order_date'];
                            $order_status = $row_fetch_order_details['order_status'];
                            $order_complete = $order_status == 'pending' ? 'Incomplete' : 'Complete';

                            echo $order_status == 'pending' ? "
                            <tr>
                                <td>$serial_number</td>
                                <td>$order_id</td>
                                <td>$amount_due</td>
                                <td>$total_products</td>
                                <td>$invoice_number</td>
                                <td>$order_date</td>
                                <td>$order_complete</td>
                                <td><a href='confirm_payment.php?order_id=$order_id' class='text-decoration-underline'>Confirm</a></td>
                            </tr>" : "
                            <tr>
                                <td>$serial_number</td>
                                <td>$order_id</td>
                                <td>$amount_due</td>
                                <td>$total_products</td>
                                <td>$invoice_number</td>
                                <td>$order_date</td>
                                <td>$order_complete</td>
                                <td>Confirmed</td>
                            </tr>";

                            $serial_number++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
