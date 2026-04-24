<?php
include("conn.php");
$id = $_SESSION['id'];
$sql_ = "SELECT * FROM users where id='$id'";
$query_ = mysqli_query($db, $sql_);
foreach ($query_ as $row) {
  $email = $row['email'];
  $phone = $row['phone'];
  $password = $row['password'];
  $username = $row['name'];
  $city = $row['city_id'];
}
if (isset($_POST['save_btn'])) {
  $username_ = $_POST['username'];
  $phone_ = $_POST['phone'];
  $email_ = $_POST['email'];
  $password_ = $_POST['password'];
  $city_ = $_POST['city'];
  $sql = "UPDATE users SET name='$username_',email='$email_',phone='$phone_',password='$password_',city_id=$city_ where id='$id' ";
  if ($query = mysqli_query($db, $sql)) {
    header("Refresh:0");
  } else {
    echo '<script>alert("update failed check your inputs")</script>';
  }
}


$sql_city = "SELECT * FROM cities";
$query_city = mysqli_query($db,$sql_city);
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
</style>

<body style="background-image: url('images/bg.jpeg');background-size: cover;background-repeat:no-repeat;height:100vh" class="gray-bg">

  <?php
  include('header.php');
  ?>
  <form action="user_update.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid justify-content-center w-75 mt-5 p-4" style="border-color: #fff;border-style: solid;border-radius: 35px;background:#fff">
      <div class="row justify-content-center mt-2">
        <div class="col-6" style="text-align: center;">
          <h3 style="color: #004E7C;font-weight: bold;"> Update Profile </h3>
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> email </h3>
        </div>
        <div class="col-6" style="text-align: center;">
          <input name="email" class="p-2 w-100" type="email"  value="<?php echo $email; ?>" required> </input>
        </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> username </h3>
        </div>
        <div class="col-6" style="text-align: center;">
          <input name="username" class="p-2 w-100" type="text"   value="<?php echo $username; ?>" required> </input>
        </div>
      </div>





      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> password </h3>
        </div>
        <div class="col-6" style="text-align: center;">
          <input name="password" class="p-2 w-100" type="password" value="<?php echo $password; ?>" minlength="8"  required> </input>
        </div>
      </div>


      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> phone </h3>
        </div>
        <div class="col-6" style="text-align: center;">
          <input name="phone" class="p-2 w-100" type="text" value="<?php echo $phone; ?>" minlength="10"  required> </input>
        </div>
      </div>


      <div class="row justify-content-center mt-2">
        <div class="col-6 mt-3" style="text-align: center;">
          <h3 style="background-color: #004E7C;color: #fff;"> city </h3>
        </div>
        <div class="col-6 mt-3" style="text-align: center;">
        <select class="w-100 p-2" name="city">
							<?php foreach ($query_city as $row_city) { ?>
								<option <?php if($city == $row_city['id']){echo "selected";} ?> value="<?= $row_city['id']; ?>" style="background:#003E7C;color:#fff"><?= $row_city['name']; ?></option>
							<?php } ?>
						</select>
      </div>
      </div>

      <div class="row justify-content-center mt-2">
        <div class="col-6" style="text-align: center;">
          <button name="save_btn" type="submit" class="btn btn-primary w-50"> save</button>
        </div>
      </div>
    </div>
  </form>

  </div>

</body>

</html>