<?php
include("conn.php");
$id = $_SESSION['id'];
$symptom_id = $_GET['id'];
$sql = "SELECT * FROM symptoms WHERE id = $symptom_id";
$query = mysqli_query($db, $sql);
$sql_issues = "SELECT * FROM issues WHERE symptom_id = $symptom_id";
$query_issues = mysqli_query($db, $sql_issues);
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>symptom</title>
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

                </tr>
                <?php
                foreach ($query as $row) {
                    $category_id = $row['category_id'];
                    $sql_category = "SELECT * FROM categories WHERE id = $category_id";
                    $query_category = mysqli_query($db, $sql_category);
                    foreach ($query_category as $row_category) {
                        $category = $row_category['name'];
                    }
                    $vehicle_id = $row['vehicle_id'];
                    $sql_vehicle = "SELECT * FROM vehicles WHERE id = $vehicle_id";
                    $query_vehicle = mysqli_query($db, $sql_vehicle);
                    foreach ($query_vehicle as $row_vehicle) {
                        $vehicle = $row_vehicle['name'];
                    }
                    $type = $row['type'];
                    if ($type == 0) {
                        $type = 'mechanics only';
                    }
                    if ($type == 1) {
                        $type = 'mechanics and users';
                    }

                ?>
                    <tr>
                        <td><?= $row['description']; ?></td>
                        <td><img src="images/<?= $row['image']; ?>" width="200" height="100"></td>
                        <td><?= $row['date']; ?> </td>
                        <td><?= $row['time']; ?> </td>
                        <td><?= $category; ?> </td>
                        <td><?= $vehicle; ?> </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>




    <div class="row justify-content-center " style="margin: auto">
        <div class="col-12">
            <table style="background: white;width: 100%;text-align: center;direction: ltr;" class="table">
                <tr>

                    <th>
                        name
                    </th>
                    <th>
                        description
                    </th>

                    <th>
                        severity level
                    </th>
                    <th>
                        solution
                    </th>
                    <th>
                        date
                    </th>
                    <th>
                        time
                    </th>

                    <th>
                        user
                    </th>
                    <th>
                        mechanic
                    </th>
                    <th>
                        part
                    </th>
                    <th>
                        rate
                    </th>


                    <th>
                        <a href="add_issue.php?symptom_id=<?= $symptom_id; ?>"><i style="color:#004E7C;" class="fa fa-plus-circle"></i></a>
                    </th>
                </tr>
                <?php
                foreach ($query_issues as $row) {
                    $part_id = $row['part_id'];
                    $sql_part = "SELECT * FROM parts WHERE id = $part_id";
                    $query_part = mysqli_query($db, $sql_part);
                    foreach ($query_part as $row_part) {
                        $part = $row_part['name'];
                    }
                    $mechanic_id = $row['mechanic_id'];
                    if (!is_null($mechanic_id)) {
                        $sql_mechanic = "SELECT * FROM mechanics WHERE id = $mechanic_id";
                        $query_mechanic = mysqli_query($db, $sql_mechanic);
                        foreach ($query_mechanic as $row_mechanic) {
                            $mechanic = $row_mechanic['name'];
                        }

                        $sql_rating = "SELECT avg(rate) AS R FROM rates WHERE mechanic_id = $mechanic_id";
                        $query_rating = mysqli_query($db, $sql_rating);
                        foreach ($query_rating as $row_rating) {
                            $rating = $row_rating['R'];
                        }

                        $rating = round($rating);
                    } else {
                        $mechanic = "";
                        $rating = 0;
                    }
                    $user_id = $row['user_id'];
                    if (!is_null($user_id)) {
                        $sql_user = "SELECT * FROM users WHERE id = $user_id";
                        $query_user = mysqli_query($db, $sql_user);
                        foreach ($query_user as $row_user) {
                            $user = $row_user['name'];
                        }
                    } else {
                        $user = "";
                    }

                    $level = $row['severity_level'];
                    if ($level == 0) {
                        $severity_level = 'low';
                    }
                    if ($level == 1) {
                        $severity_level = 'medium';
                    }
                    if ($level == 2) {
                        $severity_level = 'high';
                    }

                ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $severity_level; ?></td>
                        <td><?= $row['solution']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['time']; ?></td>
                        <td><?= $user; ?></td>
                        <td><?= $mechanic; 
                        if($mechanic != ''){
                        ?>
                            <?php for ($i = 1; $i <= 5; $i++) {
                                if ($rating >= $i) {
                            ?>
                                    <i class="fa fa-star" style="color:orange;"></i>
                                <?php
                                } else {
                                ?>
                                    <i class="fa fa-star" style="color:black;"></i>

                            <?php
                                }}
                            }  ?>

                        </td>
                        <td><?= $part; ?></td>
                        <td>
                            <?php
                            if($_SESSION['type']=='users'){
                            if (!is_null($mechanic_id)) {
                            ?>
                                <a class="btn btn-primary" href="add_rate.php?mechanic_id=<?= $mechanic_id; ?>">add rate</a>
                            <?php  }} ?>
                        </td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>


</body>

</html>