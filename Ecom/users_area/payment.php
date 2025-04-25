<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Heaven Payment Page</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    
                                <?php
                                cart_item();
                                ?>
                            
                                <?php
                                total_cart_price();
                                ?>
                           
                            <?php
                            if (!isset($_SESSION['username'])) {
                                echo "<span>
                                    Welcome guest
                                </span>";
                            } else {
                                echo "<span>
                                    Welcome " . $_SESSION['username'] . "</span>";
                            }
                            ?>
                        </a>
                    </li>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Login
                        </a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Logout
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav> 
    <!-- End NavBar -->
        <!-- php code to access user id  -->
        <?php
            $user_ip = getIPAddress();
            $get_user_query = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
            $get_user_result = mysqli_query($con,$get_user_query);
            $fetch_user = mysqli_fetch_array($get_user_result);
            $user_id = $fetch_user['user_id'];

        ?>
        <!-- php code to access user id  -->
    <!-- Start Landing Section -->
    <div class="landing">
        <div class="container">
            <h1 class="text-center mt-2 mb-5">Payment options</h1>
            <div class="row m-0 align-items-center justify-content-center">
              
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <a href="order.php?user_id=<?php echo $user_id;?>" class="fs-1 fw-bold text-decoration-underline">
                        Pay Cash
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Section -->

    <!-- Start Footer -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break" id="footer">
        <span>Contact us on (+91) 8867348791</span><br>
        <span>Or Contact us On toyheaven@gmail.com </span>
    </div>
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>