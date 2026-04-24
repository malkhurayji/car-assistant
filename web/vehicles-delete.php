<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM vehicles where id='$id';";
$query = mysqli_query($db, $sql);
header("location:vehicles.php");
?>
