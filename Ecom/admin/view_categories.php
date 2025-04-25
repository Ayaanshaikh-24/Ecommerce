<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories Page</title>
</head>

<body>
    <div class="container">
        <div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>All Categories</h2>
            </div>
        </div>
        <div class="table-data">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Categories No.</th>
                        <th>Categories Title</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get Category info
                        $get_category_query = "SELECT * FROM `categories`";
                        $get_category_result = mysqli_query($con,$get_category_query);
                        $id_number = 1;
                        while($row_fetch_categories = mysqli_fetch_array($get_category_result)){
                            $category_id = $row_fetch_categories['category_id'];
                            $category_title = $row_fetch_categories['category_title'];
                            echo "
                            <tr>
                            <td>$id_number</td>
                            <td>$category_title</td>
                            </tr>
                            ";

                            $id_number++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>