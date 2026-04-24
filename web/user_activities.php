<?php
include("conn.php");
$id = $_GET['id'];
$sql = "SELECT * FROM symptoms WHERE user_id = $id ORDER by id DESC";
$query1 = mysqli_query($db, $sql);
$sql = "SELECT * FROM issues WHERE user_id = $id ORDER by id DESC";
$query2 = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>user activities</title>
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
                        acitvity
                    </th>

                    <th>
                        date
                    </th>

                    <th>
                        time
                    </th>
     </tr>
                <?php
                foreach ($query1 as $row) {                    
                ?>
                    <tr>
                        <td>add symptom</td>
                        <td><?= $row['date']; ?> </td>
                        <td><?= $row['time']; ?> </td>
                    </tr>
                <?php
                }
                ?>
                                <?php
                foreach ($query2 as $row) {                    
                ?>
                    <tr>
                        <td>add issue</td>
                        <td><?= $row['date']; ?> </td>
                        <td><?= $row['time']; ?> </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>


</body>

</html>