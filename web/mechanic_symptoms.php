<?php
include("conn.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM symptoms  ORDER by id DESC";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>symptoms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .p-5 {
            padding: 2.8rem !important;
        }

    </style>


</head>


<body dir="ltr" class="background" style="background-image: url('images/bg.jpeg');background-size: cover;background-repeat: no-repeat;height:100vh">
    <?php
    include('header.php');
    ?>
    <br />

    <div class="row justify-content-center " style="margin: auto">
        <div class="col-12">
            <table style="background: white;width: 100%;text-align: center;direction: ltr;" class="table">
                <tr>

                    <th>
                        description
                    </th>

                    <th>
                        image
                    </th>

                    <th>
                        date
                    </th>
                    <th>
                        time
                    </th>

                    <th>
                        category
                    </th>
                    <th>
                        vehicle
                    </th>
                    <th>
                        issues
                    </th>
        
                </tr>
                <?php
                foreach ($query as $row) {
                    $category_id = $row['category_id'];
                    $sql_category = "SELECT * FROM categories WHERE id = $category_id";
                    $query_category = mysqli_query($db,$sql_category);
                    foreach($query_category as $row_category)
                    {
                     $category = $row_category['name']; 
                    }
                    $vehicle_id = $row['vehicle_id'];
                    $sql_vehicle = "SELECT * FROM vehicles WHERE id = $vehicle_id";
                    $query_vehicle = mysqli_query($db,$sql_vehicle);
                    foreach($query_vehicle as $row_vehicle)
                    {
                     $vehicle = $row_vehicle['name']; 
                    }
                    $type = $row['type'];
                    if($type == 0) {$type = 'mechanics only';}
                    if($type == 1) {$type = 'mechanics and users';}
                    
                ?>
                    <tr>
                        <td><?= $row['description']; ?></td>
                        <td><img src="images/<?= $row['image']; ?>" width="200" height="100"></td>
                        <td><?= $row['date']; ?> </td>
                        <td><?= $row['time']; ?> </td>
                        <td><?= $category; ?> </td>
                        <td><?= $vehicle; ?> </td>
                        <td>
                        <a href="symptom.php?id=<?=$row['id'];?>">show <i style="color:#004E7C;" class="fa fa-arrow-circle-right"></i></a>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>


</body>

</html>