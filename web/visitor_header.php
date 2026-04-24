<?php
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
      </div>
    </div>

    <div class="row">
      <a href="login.php?type=mechanics" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-sign-in"></i>mechanic login </a>
      <a href="login.php?type=users" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-sign-in"></i>user login </a>
      <a href="login.php?type=admins" style="margin-top: 0.5em;display:<?= $hide_admin; ?>;"><i class="fa fa-fw fa-sign-in"></i>admin login </a>
      <a href="#"> <img src="images/logo.png" style="height: 3.0em;width: 8.0em;"> </a>
    </div>
  </div>
</form>