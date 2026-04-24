<?php
include("conn.php");
$id = $_SESSION['id'];
if($_SESSION['type']=='mechanics'){$user_id=null;$mechanic_id=$id;}
if($_SESSION['type']=='users'){$user_id= $id;$mechanic_id=null;}
$symptom_id = $_GET['symptom_id'];
if (isset($_POST['save_btn'])) {
    $name = $_POST['name'];
    $part = $_POST['part'];
    $description = $_POST['description'];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $solution = $_POST['solution'];
    $severity_level = $_POST['severity_level'];
if(is_null($user_id))
{
    $sql = "INSERT INTO issues(`name`, `description`, `severity_level`, `solution`, `date`, `time`, `symptom_id`, `mechanic_id`, `part_id`)
     VALUES ('$name','$description','$severity_level','$solution','$date','$time','$symptom_id',$mechanic_id,$part)";
 $result = mysqli_query($db, $sql);
 header("location:mechanic_symptoms.php");

}
else
{
    $sql = "INSERT INTO issues(`name`, `description`, `severity_level`, `solution`, `date`, `time`, `symptom_id`, `user_id`, `part_id`)
     VALUES ('$name','$description','$severity_level','$solution','$date','$time','$symptom_id',$user_id,$part)";
 $result = mysqli_query($db, $sql);
 header("location:symptoms.php");

}

}
$sql_part = "SELECT * FROM parts";
$query_part = mysqli_query($db,$sql_part);
?>


<html>

<head>
    <meta charset="utf-8">
    <title>add issue </title>
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
                    <h4 style="text-align: center;color:#174f96"> Add Issue </h4>
                </div>
            </div>

            <form action="add_issue.php?symptom_id=<?=$symptom_id;?>" method="post" enctype="multipart/form-data">


            <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> name </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="name" type="text"    class="w-100 p-2" required>
                    </div>
                </div>


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
                        <h3 style="background-color: #004E7C;color: #fff;"> severity level </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="severity_level" class="w-100 p-2" required>
                    <option value="0">low</option>  
                    <option value="1">medium</option>  
                    <option value="2">height</option>  
                    </select>
                    </div>
                </div>



                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> solution </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="solution" type="text"    class="w-100 p-2" required>
                    </div>
                </div>




                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> part </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <select name="part" class="w-100 p-2" required>
                            <?php foreach($query_part as $row_part){ ?>
                    <option value="<?= $row_part['id']; ?>"><?= $row_part['name']; ?></option>  
                    <?php }?>
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