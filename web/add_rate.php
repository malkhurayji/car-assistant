<?php
include("conn.php");
$id = $_SESSION['id'];
$mechanic_id = $_GET['mechanic_id'];
$sql_rating = "SELECT avg(rate) AS R FROM rates WHERE mechanic_id = $mechanic_id";
$query_rating = mysqli_query($db, $sql_rating);
foreach ($query_rating as $row_rating) {
  $rating = $row_rating['R'];
}

$rating = round($rating);

$sql_ = "SELECT * FROM mechanics where id='$mechanic_id'";
$query_ = mysqli_query($db, $sql_);
foreach ($query_ as $row) {
  $email = $row['email'];
  $phone = $row['phone'];
  $username = $row['name'];
  $address = $row['address'];
  $service = $row['services'];
  $city = $row['city_id'];
}
if (isset($_POST['rate_btn'])) {
  $rate = $_POST['rate'];
  $sql_count = "SELECT * FROM rates WHERE (user_id = $id AND mechanic_id = $mechanic_id)";
  $query_count = mysqli_query($db, $sql_count);
  $count = mysqli_num_rows($query_count);
  if ($count == 0) {
    $sql_rate = "INSERT INTO rates(`user_id`,`mechanic_id`,`rate`) VALUES($id,$mechanic_id,$rate)";
    $query_rate = mysqli_query($db, $sql_rate);
    header("location:symptoms.php");
  } else {
    $sql_rate = "UPDATE rates SET `rate`=$rate WHERE (mechanic_id=$mechanic_id AND user_id = $id)";
    $query_rate = mysqli_query($db, $sql_rate);
    header("location:symptoms.php");
  }
}

$sql_city = "SELECT * FROM cities";
$query_city = mysqli_query($db, $sql_city);
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }


  .row {
    margin-left: 0em;
    margin-right: 0em;
  }


  input:checked~label {
    color: gold;
  }

  input:hover~label {
    color: goldenrod;
    transition: none;
  }

  .input1 {
    position: absolute;
    opacity: 0;
  }

  label {
    cursor: pointer;
    color: grey;
    padding: 0 0.25rem;
    transition: color 0.15s;
    font-size: xx-large;
  }

  .star-rating {
    position: relative;
    display: inline-flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    margin: 0 -0.25rem;
    width: 100%;
    border: 1px solid black;
    justify-content: center;
  }
</style>

<body style="background-image: url('images/bg.jpeg');background-size: cover;background-repeat:no-repeat;height:100vh" class="gray-bg">

  <?php
  include('header.php');
  ?>
  <form action="add_rate.php?mechanic_id=<?= $mechanic_id; ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid justify-content-center w-75 mt-3 p-4" style="border-color: #fff;border-style: solid;border-radius: 35px;background:#fff">
      <div class="row justify-content-center mt-2">
        <div class="col-6" style="text-align: center;">
          <h3 style="color: #004E7C;font-weight: bold;"> Mechanic Profile </h3>
          <?php for ($i = 1; $i <= 5; $i++) {
            if ($rating >= $i) {
          ?>
              <i class="fa fa-star" style="color:orange;"></i>
            <?php
            } else {
            ?>
              <i class="fa fa-star" style="color:black;"></i>

          <?php
            }
          }  ?>
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> email </h3>
        </div>
        <div class="col-6 mt-2" style="text-align: center;">
          <input name="email" class="p-2 w-100" type="email" value="<?php echo $email; ?>" disabled> </input>
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> username </h3>
        </div>
        <div class="col-6 mt-2" style="text-align: center;">
          <input name="username" class="p-2 w-100" type="text" value="<?php echo $username; ?>" disabled> </input>
        </div>
      </div>



      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> address </h3>
        </div>
        <div class="col-6 mt-2" style="text-align: center;">
          <input name="address" class="p-2 w-100" type="text" value="<?php echo $address; ?>" disabled> </input>
        </div>
      </div>


      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> services </h3>
        </div>
        <div class="col-6 mt-2" style="text-align: center;">
          <input name="services" class="p-2 w-100" type="text" value="<?php echo $service; ?>" disabled> </input>
        </div>
      </div>





      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> phone </h3>
        </div>
        <div class="col-6 mt-2" style="text-align: center;">
          <input name="phone" class="p-2 w-100" type="text" value="<?php echo $phone; ?>" minlength="10" disabled> </input>
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> city </h3>
        </div>
        <div class="col-6 mt-3" style="text-align: center;">
          <select class="w-100 p-2" name="city">
            <?php
            foreach ($query_city as $row_city) {
              if ($city == $row_city['id']) {
            ?>
                <option
                  value="<?= $row_city['id']; ?>" style="background:#003E7C;color:#fff"><?= $row_city['name']; ?></option>
            <?php }
            } ?>
          </select>
        </div>
      </div>



      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-4" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> rate </h3>
        </div>
        <div class="col-6 mt-3" style="text-align: center;">
          <div class="star-rating">
            <input class="input1" type="radio" id="sr-0-5" name="rate" value="5" />
            <label for="sr-0-5">★</label>
            <input class="input1" type="radio" id="sr-0-4" name="rate" value="4" />
            <label for="sr-0-4">★</label>
            <input class="input1" type="radio" id="sr-0-3" name="rate" value="3" />
            <label for="sr-0-3">★</label>
            <input class="input1" type="radio" id="sr-0-2" name="rate" value="2" />
            <label for="sr-0-2">★</label>
            <input class="input1" type="radio" id="sr-0-1" name="rate" value="1" />
            <label for="sr-0-1">★</label>
          </div>


        </div>
      </div>




      <div class="row justify-content-center mt-2">
        <div class="col-6" style="text-align: center;">
          <button name="rate_btn" type="submit" class="btn btn-primary w-50"> add rate </button>
        </div>
      </div>
    </div>
  </form>

  </div>

</body>

</html>