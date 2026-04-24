<?php
include("conn.php");
if (isset($_POST['login_btn'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	$_SESSION['type'] = $type;
	$sql = "SELECT * FROM $type WHERE (email like '$email' AND password like '$password') ";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) != 0) {
		while ($row  = mysqli_fetch_array($result)) {
			$_SESSION['id'] = $row['id'];
			if($type == 'admins') {header("location:users.php");}
			if($type == 'users') {header("location:symptoms.php");}
			if($type == 'mechanics') {header("location:all_symptoms.php");}
			else {
			echo '<script>alert("login success,welcome to our website")</script>';
		}
		}
	} else {
		echo '<script>alert("invalid  email or password")</script>';
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login </title>
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
		<div class="container-login100" style="padding: 0px;background-image: url('images/bg.jpeg');">
			<div class="wrap-login100" style="background: -webkit-linear-gradient(top,#003E7C,#27C1F5);">
				<form action="login.php" method="post" class="login100-form validate-form">
					<span class="login100-form-logo" style="border-radius: 0px;height: 100%;width: 175px;">
						<img src="images/logo.png" style="height: 100%;width: 175px;">

					</span>

					<span class="login100-form-title p-b-34 p-t-27" style="text-transform: capitalize;">
						login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="email" name="email" placeholder="email" required>
						<span class="focus-input100" data-placeholder="&#9993;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" minlength="8">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					
					<div class="wrap-input100 validate-input" data-validate="Enter type">
						<select class="input100" name="type">
							<option 
							<?php if(isset($_GET['type'])){if($_GET['type'] != 'admins') {echo "selected";}}?>						value="admins" style="background:#003E7C;<?php if(isset($_GET['type'])){if($_GET['type'] != 'admins') {echo "display:none";}}?>">admin</option>
							<option <?php if(isset($_GET['type'])){if($_GET['type'] == 'mechanics') {echo "selected";}}?> value="mechanics" style="background:#003E7C;<?php if(isset($_GET['type'])){if($_GET['type'] != 'mechanics') {echo "display:none";}}?>">mechanic</option>
							<option <?php if(isset($_GET['type'])){if($_GET['type'] == 'users') {echo "selected";}}?> value="users" style="background:#003E7C;<?php if(isset($_GET['type'])){if($_GET['type'] != 'users') {echo "display:none";}}?>">user</option>
						</select>
					</div>



					<div class="container-login100-form-btn">
						<button name="login_btn" type="submit" class="login100-form-btn" style="text-transform: capitalize;">
							login
						</button>
					</div>

					<div class="container-login100-form-btn">
						<a href="user_signup.php" style="text-decoration: none;color: white;text-transform: capitalize;">user signup </a>
					</div>
					<div class="container-login100-form-btn">
						<a href="mechanic_signup.php" style="text-decoration: none;color: white;text-transform: capitalize;">mechanic signup </a>
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

</body>

</html>