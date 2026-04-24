<?php
include("conn.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM vehicles WHERE user_id = $id";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>vehicles</title>
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
                        name
                    </th>

                    <th>
                        model
                    </th>

                    <th>
                        update / delete
                    </th>

                <th>
                add symptom
                </th>


                    <th>
                        <a href="add_vehicle.php"><i style="color:#004E7C;" class="fa fa-plus-circle"></i></a>
                    </th>
                </tr>
                <?php
                foreach ($query as $row) {
                    
                ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['model']; ?> </td>
                  
                        <td>
                        <a class="btn btn-primary" href="./update_vehicle.php?id=<?= $row['id']; ?>">update</a>
                        <a class="btn btn-danger" href="./vehicles-delete.php?id=<?= $row['id']; ?>">delete</a>
                        </td>
                        <td>
                        <a class="btn btn-primary" href="./add_symptom.php?vehicle_id=<?= $row['id']; ?>">add symptom</a>
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