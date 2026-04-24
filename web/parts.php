<?php
include("conn.php");
$sql = "SELECT * FROM parts ";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Parts</title>
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

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            background-color: rgb(41, 85, 24);
            padding: 0px;
        }

        .grid-item {
            background-color: rgb(41, 85, 24);
            padding: 2px;
            font-size: 20px;
            text-align: center;
            color: #fff;
        }

        .hero-image {
            background-image: url("o.jpg");
            background-color: #cccccc;
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .sub-header {
            background-color: rgb(219, 219, 219);
        }

        .gray-bg {
            background-color: rgb(219, 219, 219);
        }

        .brown-bg {
            background-color: rgba(173, 113, 33, 0.425);
        }

        h5 {
            color: rgb(41, 85, 24);
            font-weight: bold;
        }

        .background {
            background-image: url("../images/3.jpeg");
            background-size: cover;
        }

        hr {

            border-top: 1px solid black;

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
                        price
                    </th>

                    <th>
                        available
                    </th>

                    <th>
                       update / delete
                    </th>
                    <th>
                        <a href="add_part.php"><i style="color:#004E7C;" class="fa fa-plus-circle"></i></a>
                    </th>
                </tr>
                <?php
                foreach ($query as $row) {
                    if($row['availability'] == 0) {$status = "not available";}
                    if($row['availability'] == 1) {$status = "available";}
                ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['price']; ?> S.A.R </td>
                        <td><?= $status; ?></td>
                        <td>
                            <a class="btn btn-primary" href="./update_part.php?id=<?= $row['id']; ?>">update</a>
                            <a class="btn btn-danger" href="./parts-delete.php?id=<?= $row['id']; ?>">delete</a>
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