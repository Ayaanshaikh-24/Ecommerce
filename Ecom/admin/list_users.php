<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users Page</title>
</head>

<body>
    <div class="container">
        <div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>All Users</h2>
            </div>
        </div>
        <div class="table-data">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <?php
                    $get_user_query = "SELECT * FROM `user_table`";
                    $get_user_result = mysqli_query($con, $get_user_query);
                    $row_count = mysqli_num_rows($get_user_result);
                    if($row_count!=0){
                        echo "
                        <tr>
                        <th>User No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        
                    </tr>
                    ";
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    //get User info
                    // $get_user_query = "SELECT * FROM `user_table`";
                    // $get_user_result = mysqli_query($con, $get_user_query);
                    // $row_count = mysqli_num_rows($get_user_result);
                    if ($row_count == 0) {
                        echo "<h2 class='text-center text-light p-2 bg-dark'>No users yet</h2>";
                    } else {
                        $id_number = 1;
                        while ($row_fetch_users = mysqli_fetch_array($get_user_result)) {
                            $user_id = $row_fetch_users['user_id'];
                            $username = $row_fetch_users['username'];
                            $user_email = $row_fetch_users['user_email'];
                            $user_image = $row_fetch_users['user_image'];
                            $user_address = $row_fetch_users['user_address'];
                            $user_mobile = $row_fetch_users['user_mobile'];
                            echo "
                            <tr>
                            <td>$id_number</td>
                            <td>$username</td>
                            <td>$user_email</td>
                            <td>
                                <img src='../users_area/user_images/$user_image' alt='$username photo' class='img-thumbnail' width='100px'/>
                            </td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            
                        </tr>
                            ";

                            $id_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>