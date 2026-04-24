<?php
include("conn.php");
$id = $_SESSION['id'];
$part_id = $_GET['id'];
$sql_part = "SELECT * FROM parts WHERE id = $part_id";
$query_part = mysqli_query($db,$sql_part);
foreach($query_part as $row_part)
{
    $name_ = $row_part['name'];
    $price_ = $row_part['price'];
    $status_ = $row_part['availability'];    
}

if (isset($_POST['save_btn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sql = "UPDATE  `parts` SET `name`='$name',`price`=$price,`availability`=$status WHERE id = $part_id";
    $result = mysqli_query($db, $sql);
    header("refresh:0");
}
?>


<html>

<head>
    <meta charset="utf-8">
    <title>update part </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .title {
            background: #004E7C;
            text-align: center;
        }

        .ui-datepicker-calendar {
            display: none;
        }

    </style>


</head>

<body style="background-image: url('images/bg.jpeg');background-size: cover;">


    <div class="form-label-group">
        <?php
        include("header.php");
        ?>

        <div dir="ltr" class="container-fluid w-75 mt-5" style="border-color: #fff;border-style: solid;border-width: 4px;border-radius: 35px;background-color: white;">


            <div class="row justify-content-center mt-3" style="margin: auto">
                <div class="col-6">
                    <h4 style="text-align: center;color:#174f96"> Update Part </h4>
                </div>
            </div>

            <form action="update_part.php?id=<?=$part_id;?>" method="post" enctype="multipart/form-data">



                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> name </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="name" value="<?= $name_; ?>" type="text"    class="w-100 p-2" required>
                    </div>
                </div>


                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> price </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="price" value="<?= $price_; ?>" type="number" min="0"    class="w-100 p-2" required>
                    </div>
                </div>


                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> status </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="status" class="w-100 p-2" required>
                    <option <?php if($status_ == 1) { echo "selected";}?> value="1">available</option>  
                    <option <?php if($status_ == 0) { echo "selected";}?> value="0">not available</option>  
                    </select>
                    </div>
                </div>

                <div class="row justify-content-center mt-4 mb-2">
                    <div class="col-6">
                        <button type="submit" name="save_btn" id="save_btn" class="w-75 btn btn-primary ml-5">save</button>
                    </div>
                </div>

            </form>

        </div>
</body>

</html>