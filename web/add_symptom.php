<?php
include("conn.php");
$id = $_SESSION['id'];

if (isset($_POST['save_btn'])) {
    $description = $_POST['description'];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $type = $_POST['type'];
    $vehicle = $_POST['vehicle'];
    $category = $_POST['category'];
    $path = $_FILES['image']['name'];

    if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $path)) {
    $sql = "INSERT INTO `symptoms`( `description`, `image`, `date`, `time`, `type`, `category_id`, `user_id`, `vehicle_id`) 
    VALUES ('$description','$path','$date','$time','$type','$category','$id','$vehicle')";
    $result = mysqli_query($db, $sql);
    header("location:symptoms.php");
    }
else 
{
    $sql = "INSERT INTO `symptoms`( `description`, `date`, `time`, `type`, `category_id`, `user_id`, `vehicle_id`) 
    VALUES ('$description','$date','$time','$type','$category','$id','$vehicle')";
    $result = mysqli_query($db, $sql);
    header("location:symptoms.php");
}


}
$sql_vehicle = "SELECT * FROM vehicles WHERE user_id = $id";
$query_vehicle = mysqli_query($db,$sql_vehicle);
$sql_category = "SELECT * FROM categories";
$query_category = mysqli_query($db,$sql_category);
?>


<html>

<head>
    <meta charset="utf-8">
    <title>add symptom </title>
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
                    <h4 style="text-align: center;color:#174f96"> Add Symptom </h4>
                </div>
            </div>

            <form action="add_symptom.php" method="post" enctype="multipart/form-data">



                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> description </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="description" type="text"    class="w-100 p-2" required>
                    </div>
                </div>


                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> vehicle </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="vehicle" class="w-100 p-2" required>
                            <?php foreach($query_vehicle as $row_vehicle){
                    if(isset($_GET['vehicle_id'])) {            
                      if($_GET['vehicle_id'] == $row_vehicle['id']) {  
                    ?>
                    <option value="<?= $row_vehicle['id']; ?>"><?= $row_vehicle['name']; ?></option>  
                    <?php }}
                else{
                    ?>
                                        <option value="<?= $row_vehicle['id']; ?>"><?= $row_vehicle['name']; ?></option>  
                <?php
                }}?>
                    </select>
                    </div>
                </div>


                <div class="row justify-content-center mt-2">
                <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> image </h3>
                    </div>
                    <div class="col-6 mt-1">
                   
                    <input name="image" style="border: 1px solid;" class="p-2 w-100" type="file" > </input>
                  </div>
                </div>

                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> category </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="category" class="w-100 p-2" required>
                            <?php foreach($query_category as $row_category){ ?>
                    <option value="<?= $row_category['id']; ?>"><?= $row_category['name']; ?></option>  
                    <?php }?>
                    </select>
                    </div>
                </div>


                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> type </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="type" class="w-100 p-2" required>
                    <option value="0">mechanics only</option>  
                    <option value="1">all users</option>  
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