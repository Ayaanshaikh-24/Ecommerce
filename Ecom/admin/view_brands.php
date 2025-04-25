<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands Page</title>
</head>

<body>
    <div class="container">
        <div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>All Brands</h2>
            </div>
        </div>
        <div class="table-data">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Brands No.</th>
                        <th>Brands Title</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get Brand info
                    $get_brand_query = "SELECT * FROM `brands`";
                    $get_brand_result = mysqli_query($con, $get_brand_query);
                    $id_number = 1;
                    while ($row_fetch_brands = mysqli_fetch_array($get_brand_result)) {
                        $brand_id = $row_fetch_brands['brand_id'];
                        $brand_title = $row_fetch_brands['brand_title'];
                        echo "
                            <tr>
                            <td>$id_number</td>
                            <td>$brand_title</td>
                           
                            
                                <!-- Modal -->
                                <div class='modal fade' id='deleteModal_$brand_id' tabindex='-1' aria-labelledby='deleteModal_$brand_id.Label' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered justify-content-center'>
                                        <div class='modal-content' style='width:80%;'>
                                            <div class='modal-body'>
                                                <div class='d-flex flex-column gap-3 align-items-center text-center'>
                                                    <span>
                                                        <svg width='50' height='50' viewBox='0 0 60 60' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <circle cx='29.5' cy='30.5' r='26' stroke='#EA4335' stroke-width='3' />
                                                            <path d='M41.2715 22.2715C42.248 21.2949 42.248 19.709 41.2715 18.7324C40.2949 17.7559 38.709 17.7559 37.7324 18.7324L29.5059 26.9668L21.2715 18.7402C20.2949 17.7637 18.709 17.7637 17.7324 18.7402C16.7559 19.7168 16.7559 21.3027 17.7324 22.2793L25.9668 30.5059L17.7402 38.7402C16.7637 39.7168 16.7637 41.3027 17.7402 42.2793C18.7168 43.2559 20.3027 43.2559 21.2793 42.2793L29.5059 34.0449L37.7402 42.2715C38.7168 43.248 40.3027 43.248 41.2793 42.2715C42.2559 41.2949 42.2559 39.709 41.2793 38.7324L33.0449 30.5059L41.2715 22.2715Z' fill='#EA4335' />
                                                        </svg>
                                                    </span>
                                                    <h2>Are you sure?</h2>
                                                    <p>
                                                        Do you really want to delete these records? this process cannot be done.
                                                    </p>
                                                    <div class='btns d-flex gap-3'>
                                                        <button type='button' class='btn px-5 btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn px-5 btn-primary' data-bs-dismiss='modal'>
                                                            <a class='text-light' href='index.php?delete_brand=$brand_id'>
                                                                Delete $brand_title
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal  -->
                            </td>
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