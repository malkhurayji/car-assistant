<?php
include("conn.php");
$id = $_SESSION['id'];
$r_id = $_GET['id'];
$sql_recommendation = "SELECT * FROM recommendations WHERE id = $r_id";
$query_recommendation = mysqli_query($db, $sql_recommendation);
foreach ($query_recommendation as $row_recommendation) {
    $engine_cycles = $row_recommendation['engine_cycles'];
    $oil_pressure = $row_recommendation['oil_pressure'];
    $engine_temperature = $row_recommendation['engine_temperature'];
    $status = $row_recommendation['status'];
    $result = $row_recommendation['result'];
}

if($status == 0) {
    $result = "processing";
    header("refresh:3");
}

?>


<html>

<head>
    <meta charset="utf-8">
    <title> recommendation </title>
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
                    <h4 style="text-align: center;color:#174f96"> Recommendation </h4>
                </div>
            </div>

            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-6 title pt-2">
                    <h3 style="background-color: #004E7C;color: #fff;"> engine temperature </h3>
                </div>
                <div class="col-6 mt-1">
                    <input name="engine_temperature" value="<?=$engine_temperature; ?>" class="w-100 p-2" disabled>
                </div>
            </div>


            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-6 title pt-2">
                    <h3 style="background-color: #004E7C;color: #fff;"> oil pressure </h3>
                </div>
                <div class="col-6 mt-1">
                    <input name="oil_pressure" value="<?=$oil_pressure; ?>" class="w-100 p-2" disabled>
                </div>
            </div>


            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-6 title pt-2">
                    <h3 style="background-color: #004E7C;color: #fff;"> engine cycles </h3>
                </div>
                <div class="col-6 mt-1">
                    <input name="engine_cycles" value="<?=$engine_cycles; ?>"  class="w-100 p-2" disabled>
                </div>
            </div>

            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-6 title pt-2">
                    <h3 style="background-color: #004E7C;color: #fff;"> result </h3>
                </div>
                <div class="col-6 mt-1">
                    <input name="result" value="<?=$result; ?>"  class="w-100 p-2" disabled>
                </div>
            </div>


        </div>
</body>

</html>