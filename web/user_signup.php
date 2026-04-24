<?php
include("conn.php");
if (isset($_POST['register_btn'])) {
	$name = $_POST['name'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$_SESSION['type'] = 'users';
	$sql = "INSERT INTO users(name,password,email,phone,city_id) VALUES('$name','$password','$email','$phone',$city)";
	if (mysqli_query($db, $sql)) {
		$id = mysqli_insert_id($db);
		$_SESSION['id'] = $id;
		echo '<script>alert("user created successfully,welcome to our website")</script>';

	} else {
		echo '<script>alert("invalid  create account check your inputs")</script>';
	}
}

$sql_city = "SELECT * FROM cities";
$query_city = mysqli_query($db,$sql_city);

?>





<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg.jpeg');">
			<div class="wrap-login100" style="background: -webkit-linear-gradient(top,#003E7C,#27C1F5);">
				<form enctype="multipart/form-data" action="user_signup.php" method="post" class="login100-form validate-form">
					<span class="login100-form-logo" style="border-radius: 0px;">
						<img src="images/logo.png" style="height: 100%;width: 200%;">

					</span>

					<span class="login100-form-title p-b-34 p-t-27" style="text-transform: capitalize;">
					User Register
					</span>


					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="name" placeholder="username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="email" name="email" placeholder="email" required>
						<span class="focus-input100" data-placeholder="&#9993;"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input minlength="8" class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter phone">
						<input minlength="10" class="input100" type="text" name="phone" placeholder="Phone" required>
						<span class="focus-input100" data-placeholder="&#9990;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter type">
						<select class="input100" name="city">
							<?php foreach ($query_city as $row_city) { ?>
								<option value="<?= $row_city['id']; ?>" style="background:#003E7C;"><?= $row_city['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="container-login100-form-btn" style="margin-top: 2em;">
						<button name="register_btn" type="submit" class="login100-form-btn">
							Register
						</button>
					</div>
					<div class="container-login100-form-btn" style="margin-top: 2em;">
						<a href="login.php" style="text-decoration: none;color: white;"> Login </a>
					</div>
					<div class="container-login100-form-btn">
						<a href="home.php" style="text-decoration: none;color: white;text-transform: capitalize;">home </a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!--===============================================================================================-->

	<script>
		function chooseFile() {
			document.getElementById("image").click();
		}
	</script>
</body>

</html>