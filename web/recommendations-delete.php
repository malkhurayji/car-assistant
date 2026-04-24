<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM recommendations where id='$id';";
$query = mysqli_query($db, $sql);
header("location:recommendations.php");
?>
