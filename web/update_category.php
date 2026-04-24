<?php
include("conn.php");
$id = $_SESSION['id'];
$category_id = $_GET['id'];
$sql_cateorgy = "SELECT * FROM categories WHERE id = $category_id";
$query_cateorgy = mysqli_query($db,$sql_cateorgy);
foreach($query_cateorgy as $row_cateorgy)
{
    $name_ = $row_cateorgy['name'];
}

if (isset($_POST['save_btn'])) {
    $name = $_POST['name'];
    $sql = "UPDATE  `categories` SET `name`='$name' WHERE id = $category_id";
    $result = mysqli_query($db, $sql);
    header("refresh:0");
}
?>


<html>

<head>
    <meta charset="utf-8">
    <title>update category </title>
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
                    <h4 style="text-align: center;color:#174f96"> Update Category </h4>
                </div>
            </div>

            <form action="update_category.php?id=<?= $category_id;?>" method="post" enctype="multipart/form-data">



                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-6 title pt-2">
                        <h3 style="background-color: #004E7C;color: #fff;"> name </h3>
                    </div>
                    <div class="col-6 mt-1">
                        <input name="name" value="<?= $name_; ?>" type="text"    class="w-100 p-2" required>
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