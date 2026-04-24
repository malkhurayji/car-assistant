<?php
if (isset($_POST['logout_btn'])) {
  include('logout.php');
}

if ($_SESSION['type'] == 'admins') {
  $hide_admin = '';
  $hide_mechanic = 'none';
  $hide_user = 'none';
}

if ($_SESSION['type'] == 'users') {
  $hide_admin = 'none';
  $hide_mechanic = 'none';
  $hide_user = '';
}

if ($_SESSION['type'] == 'mechanics') {
  $hide_admin = 'none';
  $hide_user = 'none';
  $hide_mechanic = '';
}



?>

<head>
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto auto auto;
      background-color: rgb(41, 85, 24);
      padding: 0px;
    }

    .grid-item {
      background-color: rgb(41, 85, 24);
      padding: 1px;
      font-size: 20px;
      text-align: center;
      color: #fff;
    }

    .row {
      margin-left: 0px !important;
      margin-right: 0px !important;
    }

    .navbar {
      width: 100%;
      background-color: #004E7C;
      overflow: auto;
    }

    .navbar a {
      float: right;
      padding: 10px;
      color: white;
      text-decoration: none;
      font-size: 14px;
    }

    .btn-primary {
      background: #004E7C !important;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

</head>
<form action="header.php" method="post">
  <div class="navbar row justify-content-between">

    <div style="width: 250px" class="row">
      <div class="col-12">
        <button name="logout_btn" class="btn btn-primary w-75 p-1">logout</button>
      </div>
    </div>

    <div class="row">
    <!-- <a href="home.php" style="margin-top: 0.5em;"><i class="fa fa-home"></i> home </a> -->
    <a href="categories.php" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-list-ul"></i> categories </a>
      <a href="parts.php" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-list-alt"></i> parts </a>
      <a href="mechanics.php" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-users"></i> mechanics </a>
      <a href="users.php" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-users"></i> users </a>
      <a href="mechanic_symptoms.php" style="margin-top: 0.5em;display:<?= $hide_mechanic; ?>;"><i class="fa fa-fw fa-adn"></i> symptoms </a>
      <a href="mechanic_update.php" style="margin-top: 0.5em;display:<?= $hide_mechanic; ?>;"><i class="fa fa-fw fa-user-circle"></i> profile </a>
      <a href="user_update.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-user-circle"></i> profile </a>
      <a href="near_mechanics.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-users"></i> mechanics </a>
      <a href="recommendations.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-adjust"></i> recommendations </a>
      <a href="all_symptoms.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-adn"></i>  symptoms </a>
      <a href="symptoms.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-adn"></i> my symptoms </a>
      <a href="vehicles.php" style="margin-top: 0.5em;display:<?= $hide_user; ?>;"><i class="fa fa-fw fa-car"></i> vehicles </a>
      <a href="#"> <img src="images/logo.png" style="height: 3.0em;width: 8.0em;"> </a>
    </div>
  </div>
</form>